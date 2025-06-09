<template>
    <div class="login-container">
        <form @submit.prevent="handleLogin">
            <h2 class="logo">TADA</h2>
            <div class="form-group">
                <label for="username">아이디</label>
                <input
                    type="text"
                    id="username"
                    v-model="username"
                    required
                >
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input
                    type="password"
                    id="password"
                    v-model="password"
                    required
                >
            </div>
            <button>로그인</button>
        </form>
    </div>
</template>

<script setup>
import {ref} from 'vue'
import {useRouter} from 'vue-router'


const router = useRouter()
const username = ref('')
const password = ref('')

const handleLogin = async () => {
    try {
        const response = await fetch('http://localhost:3000/users')
        const users = await response.json()

        const user = users.find(u =>
            u.username === username.value &&
            u.password === password.value
        )

        if (user) {
            localStorage.setItem('user', JSON.stringify(user))
            router.push('/')
        } else {
            alert('로그인 실패')
        }
    } catch (error) {
        console.error('로그인 에러:', error)
    }
}
</script>

<style scoped>
.login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
