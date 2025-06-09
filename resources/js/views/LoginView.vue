<template>
    <div class="container">
        <div class="d-flex justify-content-center mt-5 ">
            <form @submit.prevent="handleLogin">
                <h2 class="logo">TADA</h2>
                <div class="input-container">
                    <input type="text" id="username" v-model="username" placeholder=" " required>
                    <label for="email">Enter Username</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" v-model="password" placeholder=" " required>
                    <label for="password">Enter Password</label>
                </div>
                <button class="btn btn-outline-success fs-5 fw-bold login-btn">Login</button>
            </form>
        </div>
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
        const response = await fetch('http://localhost:5002/users')
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
.input-container {
    position: relative;
    width: 450px;
    margin: 10px 0;
}

.input-container input {
    width: 100%;
    padding: 24px 16px 8px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px;
    position: relative;
}

.input-container label {
    position: absolute;
    top: 50%;
    transform: translateY(-70%);
    left: 10px;
    font-size: 18px;
    color: #999;
    pointer-events: none;
    transition: .1s ease;
}

/* 입력시 label 좌측상단 이동 */
.input-container input:focus + label,
.input-container input:not(:placeholder-shown) + label {
    top: 15px;
    left: 10px;
    font-size: 10px;
    color: #333;
}

.login-btn{
    width: 450px;
    padding: 16px 0;
    font-size: 14px;
}
</style>
