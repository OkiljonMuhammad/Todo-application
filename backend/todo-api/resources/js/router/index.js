import { createRouter, createWebHistory } from 'vue-router';
import Register from '../views/Register.vue';
import Login from '../views/Login.vue';
import Todos from '../views/Todos.vue';
import TodoDetail from '../views/TodoDetail.vue';
import UserProfile from '../views/UserProfile.vue';

const routes = [
  { path: '/register', component: Register, name: 'register' },
  { path: '/login', component: Login, name: 'login' },
  { path: '/todos', component: Todos, name: 'todos.index' },
  { path: '/todos/:id', component: TodoDetail, name: 'todos.show' },
  { path: '/user', component: UserProfile, name: 'auth.user' }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
