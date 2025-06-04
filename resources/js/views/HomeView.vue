<template>
    <div class="container">
        <div class="d-flex justify-content-center my-5">
            <!--  필터 버튼  -->
            <div class="btn-group mt-5">
                <button class="btn btn-outline-primary">전체</button>
                <button class="btn btn-outline-success">완료</button>
                <button class="btn btn-outline-secondary">미완료</button>
            </div>
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
            <tr v-for="todo in todos" :key="todo.id">
                <ListItem
                    :completed="todo.completed"
                    :id="todo.id"
                    :text="todo.text"
                    :created-at="todo.createdAt"
                    @click="goDetailPage(todo.id)"
                />
            </tr>
            </tbody>

        </table>

    </div>
</template>

<script setup>
import {useRouter} from "vue-router";
import {ref} from "vue";
import ListItem from "@/components/ListItem.vue";
import {getTodos} from "@/api/todos.js";

const todos = ref([]);
const router = useRouter()

// Axios 통신 모듈로 json-server와 통신
const fetchTodos = async () => {
    try {
        const {data} = await getTodos()
        todos.value = data
    } catch (err) {
        console.error('목록 불러오기 실패 : ', err)
    }
}
fetchTodos()

const goDetailPage = (id) => {
    router.push({
        name: 'Detail',
        params: {id}
    })
}


</script>

<style lang="scss" scoped>

</style>
