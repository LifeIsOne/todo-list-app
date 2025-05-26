import { createRouter, createWebHistory } from "vue-router";
import App from "../App.vue";
import AboutView from "../views/AboutView.vue";
import EditView from "../views/EditView.vue";

// routes 정보 설정
const routes = [
    {
        path: '/',
        component: App,
    },
    {
        path: '/about',
        component: AboutView,
    },
    {
        path: '/edit',
        component: EditView,
    },
]
// 라우터 객체 생성
const router = createRouter({
    history: createWebHistory(),
    routes, // 키 = 값 단축 표현
    }
)

export default router
