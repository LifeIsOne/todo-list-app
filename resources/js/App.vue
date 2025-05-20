<template>
    <Layout>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h2>할 일 목록</h2>
            <a href="/todo/create" class="btn btn-primary mb-3">할 일 추가</a>
        </div>

        <!--  필터 벜튼  -->
        <div class="btn-group my-3">
            <button class="btn btn-outline-primary">전체</button>
            <button class="btn btn-outline-success">완료</button>
            <button class="btn btn-outline-secondary">미완료</button>
        </div>

        <table class="table" style="table-layout: fixed">
            <thead>
                <tr>
                    <th style="width:15%">완료 여부</th>
                    <th style="width:5%" >ID</th>
                    <th style="width:55%">할 일</th>
                    <th style="width:25%">생성시간</th>
                </tr>
            </thead>

    <!--        List Item 반복문 -->
            <ListItem />

        </table>
        <div id="app"></div>
    </Layout>
</template>

<script setup>
import ListItem from "./components/ListItem.vue";
import Layout from "./layouts/Layout.vue";

</script>

<style lang="scss" scoped>

</style>
