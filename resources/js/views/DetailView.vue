<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-5 border-bottom">
            <h2>할 일 상세보기</h2>

            <div class="d-flex gap-2 mb-3">
                <button class="btn btn-warning" @click="goEditPage">수정하기</button>
                <div @click="">
                    <button class="btn btn-danger">삭제하기</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="card">
            <p>{{ text }}</p>
        </div>
    </div>
</template>

<script setup>
import {useRouter} from "vue-router";

const props = defineProps({
    id: Number,
    text: String
})

const router = useRouter()

const goEditPage = () => {
    router.push({name: 'Edit', params: {id: props.id}})
}

</script>

<style lang="scss" scoped>

</style>
