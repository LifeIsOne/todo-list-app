<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-4 border-bottom">
            <h2>Add Todo Page</h2>
        </div>

        <!-- Form -->
        <form @submit.prevent="addTodo">
            <div class="card shadow-sm">
                <div class="card-body">
                    <textarea v-model="todoForm.text" class="form-control" id="text" rows="3"
                              placeholder="해야할 일을 입력합시다 :p"></textarea>
                </div>
            </div>
            <div class="pt-3 d-flex justify-content-end gap-2">
                <button class="btn btn-success">
                    <i class="bi bi-clipboard2-plus-fill"></i>
                    추가하기
                </button>
                <button class="btn btn-outline-danger" @click="goHomePage">
                    <i class="bi bi-arrow-return-left"></i>
                    취소하기
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {createTodo} from "@/api/todos.js";
import {ref} from "vue";
import {useRouter} from "vue-router";
import backdrop from "bootstrap/js/src/util/backdrop.js";

const todoForm = ref({text: null})
const router = useRouter()

const addTodo = async () => {
    try {
        await createTodo({
            ...todoForm.value,
            createdAt: new Date().toLocaleString()
        })
        router.push({name: 'Home'})
    } catch (err) {
        console.error(err)
    }
}
const goHomePage = () => {
    router.push({name:'Home'})
}
</script>

<style lang="scss" scoped></style>

<style>
.form-control::placeholder {
    color: #ccc;
}
</style>
