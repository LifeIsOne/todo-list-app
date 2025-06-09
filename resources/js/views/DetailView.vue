<template>
  <div class="container py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-4 border-bottom">
      <h2>Detail Page</h2>
    </div>

    <div class="card shadow-sm my-2">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <div class="badge" :class="todo.completed ? 'bg-success' : 'bg-warning'">
            {{ todo.completed ? '완료' : '진행중' }}
          </div>
        </div>

        <p class="card-text fs-5 mb-4">{{ todo.text }}</p>

        <div class="d-flex justify-content-between  text-muted">
          <small>
            <i class="bi bi-calendar me-1"></i>
            생성일: {{ (todo.createdAt) }}
          </small>
          <!-- TODO: 완료일 추가 -->
<!--          <small>-->
<!--            <i class="bi bi-check-circle me-1"></i>-->
<!--            완료일: {{ todo.completed ? todo.createdAt : '미완료' }}-->
<!--          </small>-->
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
      <button class="btn btn-outline-success" @click="goEditPage">
          <i class="bi bi-pencil-square"></i> 수정하기
      </button>
      <button class="btn btn-outline-danger" @click="removeTodo">
          <i class="bi bi-trash"></i> 삭제하기
      </button>
    </div>
  </div>
</template>

<script setup>
import {useRouter} from "vue-router";
import {ref} from "vue";
import {getTodoById, deleteTodo} from "@/api/todos.js";

const router = useRouter()
const todo = ref({})

const props = defineProps({
  id: Number,
})
const fetchTodo = async () => {
  try {
    const {data} = await getTodoById(props.id)
    // board.value = { ...data }
    setTodo(data)
  } catch (err) {
    console.error('상세 페이지 불러오기 실패!', err)
  }
}
const setTodo = ({text, completed, createdAt}) => {
  todo.value.text = text
  todo.value.completed = completed
  todo.value.createdAt = createdAt
}
fetchTodo()

const removeTodo = async () => {
  try {
    await deleteTodo(props.id)
    router.push({name: 'Home'})
  } catch (err) {
    console.error(err)
  }
}

const goEditPage = () => {
  router.push({name: 'Edit', params: {id: props.id}})
}

</script>

<style lang="scss" scoped>

</style>
