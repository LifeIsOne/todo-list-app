<template>
    <tr v-bind:class="todo.completed ? 'table-success' : '' ">
        <td>
            <form @submit.prevent="completeToggle(todo.id)">
                <button class="btn btn-sm">
                    {{ todo.completed ? '✅' : '☑️'}}
                </button>
            </form>
        </td>

        <td>{{ todo.id }}</td>

        <td>
            <router-link :to="`/todo/${todo.id}/detail`" class="text-decoration-none text-dark d-block">
                {{ todo.text }}
            </router-link>
        </td>

        <td>{{ todo.created_at }}</td>

    </tr>

</template>

<script setup>
const props = defineProps({todo: Object,});

const emit = defineEmits(['deleteTodo']);

async function completeToggle(id) {
    // PATCH 요청 처리
    try {
        const res = await fetch(`/todo/${id}/complete`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if ( res.ok ) {
            emit('update:todo', {
                ...props.todo,
                completed: !props.todo.completed,
            });
        }

    }catch (err) {
        console.error(err)
    }
}

</script>

<style lang="scss" scoped>

</style>
