import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import DetailView from "../views/DetailView.vue"
import AddView from "../views/AddView.vue";
import EditView from "../views/EditView.vue";

// routes 정보 설정
const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomeView,
    },
    {
        path: '/todos/:id',
        name: 'Detail',
        component: DetailView,
        props: true,
        // props: (route) => ({ id: parseInt(route.params.id) }),
    },
    {
        path: '/todos/add',
        name: 'Add',
        component: AddView,
    },
    {
        path: '/todos/:id/edit',
        name: 'Edit',
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
