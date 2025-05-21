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
            <tr v-for = "todo in todos"
                :key = "todo.id"
                :class="todo.completed ? 'table-success' : '' "
            >
                <td>
                    <form @submit.prevent="completeToggle(todo.id)">
                        <button class="btn btn-sm">
                            {{ todo.completed ? '✅' : '☑️' }}
                        </button>
                    </form>
                </td>

                <td>{{ todo.id }}</td>

                <td>
                    <router-link :to="`/todo/${todo.id}/detail`" class="text-decoration-none text-dark d-block">
                        {{ todo.text }}
                    </router-link>
                </td>

                <td>{{ todo.created_at }}</td>

            </tr>
            </tbody>

        </table>
        <div id="app"></div>
    </Layout>
</template>

<script setup>
import Layout from "@/layouts/Layout.vue";
import {onMounted, ref} from "vue";
import axios from "axios";

const todos = ref([]);

const loadTodos = () => {
    axios.get('/api/todos')
        .then(response => {
            todos.value = response.data;
        })
}

onMounted(() => {
    loadTodos();
})

</script>

<style lang="scss" scoped>

</style>
