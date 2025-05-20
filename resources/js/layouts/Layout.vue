<template>
    <div class="d-flex flex-column min-vh-100">
        <!--  App Bar  -->
        <AppBar/>

        <!-- Content -->
        <main class="container mt-4 flex-grow-1">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-light p-5 text-center">
            <h4>Created by Miraclecoding</h4>
            <h5>☎ 010-9603-2291</h5>
            <a href="https://elated-value-48d.notion.site/Laravel-PHP-Framework-1f5d91c8ac0e805b93e9ca5af38f15bd?pvs=4" class="btn btn-outline-primary">기술 블로그</a>
        </footer>
    </div>
</template>

<script setup>
import AppBar from "../components/AppBar.vue";

</script>

<style lang="scss" scoped>

</style>
