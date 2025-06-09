<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-4 border-bottom">
            <h2>수정 페이지</h2>
        </div>

        <form @submit.prevent="editTodo">
            <div class="card shadow-sm my-2">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="badge" :class="todoForm.completed ? 'bg-success' : 'bg-warning'">
                            {{ todoForm.completed ? '완료' : '미완료' }}
                        </div>
                    </div>

                    <textarea v-model="todoForm.text" class="form-control" id="text" rows="3"></textarea>
                    <div class="d-flex justify-content-between  text-muted">
                        <small>
                            <i class="bi bi-calendar me-1"></i>
                            생성일 : {{ todoForm.createdAt }}
                        </small>
                        <!--                        &lt;!&ndash; TODO: 완료일 추가 &ndash;&gt;-->
                        <!--                        <small>-->
                        <!--                            <i class="bi bi-check-circle me-1"></i>-->
                        <!--                            완료일: todo.completed ? todo.createdAt : '미완료'-->
                        <!--                        </small>-->
                    </div>
                </div>
            </div>
            <div class="pt-3 d-flex justify-content-end gap-2">
                <button class="btn btn-success">
                    <i class="bi bi-clipboard2-plus-fill"></i>
                    수정
                </button>
                <button class="btn btn-outline-danger" @click="detailPage">
                    <i class="bi bi-arrow-return-left"></i>
                    취소
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>

import {getTodoById, updateTodo} from "../api/todos.js";
import {ref} from "vue";
import {useRoute, useRouter} from "vue-router";

const router = useRouter()
const route = useRoute()
const id = route.params.id

const todoForm = ref({
    text: null,
})

const fetchTodo = async () => {
    try {
        const {data} = await getTodoById(id)
        setTodoForm(data)
    } catch (e) {
        console.error(e)
    }
}
const setTodoForm = ({completed, text, createdAt}) => {
    todoForm.value.completed = completed
    todoForm.value.text = text
    todoForm.value.createdAt = createdAt
}
fetchTodo()

const editTodo = async () => {
    try {
        await updateTodo(id, {...todoForm.value})
        router.push({name: 'Detail', params: {id}})
    } catch (e) {
        console.error(e)
    }
}

const detailPage = () => {
    router.push('/todos/' + id)
}
</script>

<style lang="scss" scoped>

</style>
