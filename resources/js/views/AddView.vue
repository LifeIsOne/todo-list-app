<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-4 border-bottom">
            <h2>추가 페이지</h2>
        </div>

        <!-- Form -->
        <form @submit.prevent="saveTodo">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <!--                    <div class="badge" :class="todo.completed ? 'bg-success' : 'bg-warning'">-->
                        <!--                        {{ todo.completed ? '완료' : '진행중' }}-->
                        <!--                    </div>-->
                    </div>

                    <div class="card-text fs-5 mb-4">
                        <input v-model="todoForm.text" class="form-text" type="text" id="text">
                    </div>
                    <!---->

                </div>
            </div>
            <div class="pt-3 d-flex justify-content-end gap-2">
                <button class="btn btn-success">
                    <i class="bi bi-clipboard2-plus-fill"></i>
                    추가
                </button>
                <button class="btn btn-outline-danger">
                    <i class="bi bi-arrow-return-left"></i>
                    취소
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {createTodo} from "@/api/todos.js";
import {ref} from "vue";
import {useRouter} from "vue-router";

const todoForm = ref({text: null})
const router = useRouter()

const saveTodo = async () => {
    try {
        await createTodo({
            ...todoForm.value,
            createdAt: Date.now()
        })
        router.push({ name: 'Home'})
    } catch (err) {
        console.error(err)
    }
}
</script>

<style lang="scss" scoped>

</style>
