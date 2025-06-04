import axios from "axios";

// 목록 조회
export function getTodos() {
    return axios.get('http://localhost:5002/todos')
}

// 상세 조회
export function getTodoById(id) {
    return axios.get('http://localhost:5002/todos/' + id)
}

// 생성
export function createdTodo(data) {
    return axios.post('http://localhost:5002/todos', data)
}

// 수정
export function updateTodo(id, data) {
    return axios.put('http://localhost:5002/todos' + id, data)
}

// 삭제
export function deleteTodo(id) {
    return axios.delete('http://localhost:5002/todos' + id)
}
