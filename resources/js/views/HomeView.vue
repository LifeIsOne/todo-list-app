<template>
  <div class="container">
    <div class="d-flex justify-content-center my-5">
      <!--  필터 버튼  -->
      <div class="btn-group mt-5">
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
              <!-- 완료 상태 아이콘 (클릭 가능) -->
              <div class="me-3"
                   style="cursor: pointer;"
                   @click.stop="toggleCompleted(todo.id)"
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

  </div>
</template>

<script setup>
import {useRouter} from "vue-router";
import {ref} from "vue";
import ListItem from "@/components/ListItem.vue";
import {getTodos} from "@/api/todos.js";

const todos = ref([]);
const router = useRouter()

// Axios 통신 모듈로 json-server와 통신
const fetchTodos = async () => {
  try {
    const {data} = await getTodos()
    todos.value = data
  } catch (err) {
    console.error('목록 불러오기 실패 : ', err)
  }
}
fetchTodos()

const goDetailPage = (id) => {
  router.push({
    name: 'Detail',
    params: {id}
  })
}

// 완료 여부 토글
const toggleCompleted = async(id) => {
  todos.valueOf(id).completed = !todos.valueOf(id).completed
}

</script>

<style lang="scss" scoped>

</style>
