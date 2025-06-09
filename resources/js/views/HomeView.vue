<template>
  <div class="container">
    <!--  할 일 추가 폼  -->
    <form class="d-flex justify-content-center mt-5 gap-3" @submit.prevent="addTodo">
      <input v-model="todoForm.text" class="form-control rounded-3" id="text" placeholder="할 일 입력하기-">
      <button class="btn btn-outline-success col-2 rounded-3">
        <i class="bi bi-plus-circle-fill "></i> Add
      </button>
    </form>

    <div class="d-flex justify-content-center align-items-center m-2">
      <div class="btn-group my-4">
        <button class="btn btn-outline-primary">전체</button>
        <button class="btn btn-outline-success">완료</button>
        <button class="btn btn-outline-secondary">미완료</button>
      </div>
    </div>


    <div class="row g-3">
      <div class="col-12" v-for="todo in todos" :key="todo.id">
        <div class="card h-100 shadow-sm border-0"
             :class="{'bg-light': todo.completed}"
             style="cursor: pointer; transition: all 0.2s;"
             @click="goDetailPage(todo.id)"
             @mouseenter="$event.target.style.transform = 'translateY(-2px)'"
             @mouseleave="$event.target.style.transform = 'translateY(0)'">
          <div class="card-body">
            <div class="d-flex align-items-center">

              <!-- 완료 상태 아이콘 (toggle) -->
              <div class="me-3"
                   style="cursor: pointer;"
                   @click.stop="toggleCompleted(todo.id, todo.completed)"
                   title="완료 상태 변경">
                <i v-if="todo.completed"
                   class="bi bi-check-square-fill text-success fs-4 hover-scale"></i>
                <i v-else
                   class="bi bi-square text-secondary fs-4 hover-scale"></i>
              </div>

              <!-- 할 일 내용 -->
              <div class="flex-grow-1">
                <h5 class="card-title mb-1"
                    :class="{'text-decoration-line-through text-muted': todo.completed}">
                  {{ todo.text }}
                </h5>
                <small class="text-muted">
                  <i class="bi bi-clock me-1"></i>
                  {{ todo.createdAt }}
                </small>
              </div>

              <!-- ID 뱃지 -->
              <div class="ms-3">
                <span class="badge bg-primary">#{{ todo.id }}</span>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  페이징 시작  -->
    <nav class="mt-5 bg-dart" aria-label="Page navigation example">
      <ul class="pagination justify-content-center text-light">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li v-for="page in currentPage" :key="page" class="page-item">
          <a class="page-link" href="#" @click.prevent="params.value._page = page">{{ page }}</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <!--  페이징 끝  -->
  </div>
</template>

<script setup>
import {useRouter} from "vue-router";
import {computed, ref} from "vue";
import {getTodos} from "@/api/todos.js";
import {createTodo} from "@/api/todos.js";
import axios from "axios";
import {patchCompleted} from "../api/todos.js";

const todos = ref([]);
const router = useRouter()
const todoForm = ref({text: null})

const params = ref({
  _sort: 'createdAt',
  _order: 'desc',
  _page: 1,
  _limit: 7
})
const totalCount = ref(0)
const currentPage = computed(() => Math.ceil(totalCount.value / params.value._limit))

// 목록 불러오기
const fetchTodos = async () => {
  try {
    const {data, headers} = await getTodos(params.value)
    todos.value = data
    totalCount.value = headers['x-total-count']
  } catch (err) {
    console.error('목록 불러오기 실패 : ', err)
  }
}
fetchTodos()

// 디테일 페이지
const goDetailPage = (id) => {
  router.push({
    name: 'Detail',
    params: {id}
  })
}

// 추가하기
const addTodo = async () => {
  try {
    await createTodo({
      ...todoForm.value,
      completed: false,
      createdAt: new Date().toLocaleString()
    })
    await fetchTodos()
  } catch (err) {
    console.error(err)
  }
}


// 완료 여부 토글
const toggleCompleted = async (id, completed) => {
  try {
    await patchCompleted(id,!completed)
    await fetchTodos()
  } catch (err) {
    console.error(err)
  }
}

</script>

<style lang="scss" scoped>

</style>
