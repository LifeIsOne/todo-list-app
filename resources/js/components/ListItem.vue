<template>
    <td>
        <form>
            <button class="btn btn-sm">
                {{ completed ? '✅' : '☑️' }}
            </button>
        </form>
    </td>

    <td>{{ id }}</td>

    <td>
        <div @click="goDetailPage(id)">{{ text }}</div>
    </td>

    <td>{{ createdAt }}</td>
</template>

<script setup>

import {useRouter} from "vue-router";

const router = useRouter()

defineProps({
    completed: Boolean,
    id: Number,
    text: String,
    createdAt: String,
})

const goDetailPage = (id) => {
    router.push({
        name: 'Detail',
        params: {
            id,
        },
    })
}


</script>

<style lang="scss" scoped>

</style>
