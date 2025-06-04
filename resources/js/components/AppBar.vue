<template>
    <header>
        <nav class="navbar navbar-dark bg-dark text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Todo App</a>

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <RouterLink class="nav-link" active-class="active" to="/">Home</RouterLink>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-primary" type="button" @click="goAddPage">추가하기</button>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import {useRouter} from "vue-router";

const router = useRouter()
const goAddPage = () => {
    router.push({name: 'Add'})
}

</script>

<style lang="scss" scoped>

</style>
