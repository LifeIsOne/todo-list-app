<template>
  <header>
    <nav class="navbar navbar-dark bg-dark text-white px-5">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="/">TADA</a>

        <ul class="navbar-nav  ms-3 me-auto d-flex flex-row gap-3">
          <li class="nav-item">
            <RouterLink class="nav-link" active-class="active" to="/">Home</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" active-class="active" to="/login">로그인</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" active-class="active" to="/todos/add">추가하기</RouterLink>
          </li>
        </ul>
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

<style>
@font-face {
  font-family: 'PartialSansKR-Regular';
  src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/noonfonts_2307-1@1.1/PartialSansKR-Regular.woff2') format('woff2');
  font-weight: normal;
  font-style: normal;
}

.logo {
  font-family: 'PartialSansKR-Regular';
  font-size: 32px;
  color: #edf2f7;
}
</style>
