<template>
    <div class="container py-4">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">할 일 상세보기</h2>
                    <div class="d-flex gap-2">
                        <button class="btn btn-warning" @click="goEditPage">수정하기</button>
                        <button class="btn btn-danger">삭제하기</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <p class="fs-4 mt-2">{{ todo.completed ? '✅' : '☑️' }} {{ todo.text }}</p>
                </div>
                <div class="d-flex justify-content-end">
                    <p class="text-muted mt-2">생성일 : {{ todo.createdAt }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {useRouter} from "vue-router";
import {ref, onMounted} from "vue";
import axios from "axios";

const props = defineProps({
    id: [Number, String],
})

const router = useRouter()

const todo = ref({})

const fetchTodo = async () => {
    try {
        console.log('현재 ID:', props.id)
        const {data} = await axios.get(`http://localhost:5002/todos?id=${props.id}`)
        todo.value = data[0] || {}
    } catch (err) {
        console.error('목록 불러오기 실패 : ', err)
    }
}

fetchTodo()

const goEditPage = () => {
    router.push({name: 'Edit', params: {id: props.id}})
}

</script>

<style lang="scss" scoped>

</style>
