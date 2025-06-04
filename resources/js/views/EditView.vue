<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-5 border-bottom">
            <h2>수정 페이지</h2>
            <div class="d-flex gap-2">
                <button class="btn btn-danger" @click="deleteTodo">
                    수정완료
                </button>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="badge" :class="todo.completed ? 'bg-success' : 'bg-warning'">
                        {{ todo.completed ? '완료' : '진행중' }}
                    </div>
                </div>

                <p class="card-text fs-5 mb-4">{{ todo.text }}</p>

                <div class="d-flex justify-content-between text-muted">
                    <small>
                        <i class="bi bi-calendar me-1"></i>
                        생성일: {{ (todo.createdAt) }}
                    </small>
                    <small>
                        <!-- TODO: 완료일 추가 -->
                        <i class="bi bi-check-circle me-1"></i>
                        완료일: {{ todo.completed ?  todo.createdAt  : '미완료' }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>
