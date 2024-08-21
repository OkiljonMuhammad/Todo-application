<template>
  <div>
    <h2>Your Todos</h2>
    <ul>
      <li v-for="todo in todos" :key="todo.id">
        <router-link :to="`/todos/${todo.id}`">{{ todo.item }}</router-link>
      </li>
    </ul>
    <form @submit.prevent="createTodo">
      <input type="text" v-model="newTodo" placeholder="New Todo" />
      <button type="submit">Add Todo</button>
    </form>
  </div>
</template>

<script>
import axios from '../axiosInstance';

export default {
  data() {
    return {
      todos: [],
      newTodo: '',
    };
  },
  async created() {
    await this.fetchTodos();
  },
  methods: {
    async fetchTodos() {
      const response = await axios.get('/todos');
      this.todos = response.data;
    },
    async createTodo() {
      await axios.post('/todos', { item: this.newTodo });
      this.newTodo = '';
      await this.fetchTodos();
    },
  },
};
</script>
