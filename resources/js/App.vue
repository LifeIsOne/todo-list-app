<template>
    <Layout>
        <!--  필터 버튼  -->
        <div class="btn-group my-3">
            <button class="btn btn-outline-primary">전체</button>
            <button class="btn btn-outline-success">완료</button>
            <button class="btn btn-outline-secondary">미완료</button>
        </div>

        <table class="table" style="table-layout: fixed">
            <thead>
            <tr>
                <th style="width:15%">완료 여부</th>
                <th style="width:5%">ID</th>
                <th style="width:55%">할 일</th>
                <th style="width:25%">생성시간</th>
            </tr>
            </thead>

            <tbody>
            <ListItem
                v-for="todo in filter"
                :key="todo.id"
                :todo="todo"
            />
            </tbody>

        </table>
        <div id="app"></div>
    </Layout>
</template>

<script setup>
import ListItem from "./components/ListItem.vue";
import Layout from "@/layouts/Layout.vue";
import {computed, onMounted, ref} from "vue";

const todos = ref([]);
const activeFilter = ref('all');

// 할 일 목록
const filteredTodos = computed(() => {
    if (activeFilter.value === 'completed') {
        return todos.value.filter(todo => todo.completed);
    }else if (activeFilter.value === 'incomplete') {
        return todos.value.filter(todo => !todo.completed);
    }
    return todos.value;
})

onMounted(async () => {
    const todoRes = await fetch('/api/todos');
    const todoData = await todoRes.json();
    todos.value = todoData.todos;
    console.log(todoRes);
    console.log('🙋‍♂️🙋‍♂️mounted🙋‍♂️🙋‍♂️🙋‍♂️');
})

</script>

<style lang="scss" scoped>

</style>
