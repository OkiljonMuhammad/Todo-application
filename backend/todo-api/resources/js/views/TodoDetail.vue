<template>
    <div>
      <h2>Todo Detail</h2>
      <div v-if="todo">
        <p>{{ todo.item }}</p>
        <p>Completed: {{ todo.completed ? 'Yes' : 'No' }}</p>
        <button @click="toggleCompletion">Toggle Completion</button>
        <button @click="deleteTodo">Delete Todo</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from '../axiosInstance';
  
  export default {
    data() {
      return {
        todo: null,
      };
    },
    async created() {
      const todoId = this.$route.params.id;
      const response = await axios.get(`/todos/${todoId}`);
      this.todo = response.data;
    },
    methods: {
      async toggleCompletion() {
        const updatedTodo = { ...this.todo, completed: !this.todo.completed };
        await axios.put(`/todos/${this.todo.id}`, updatedTodo);
        this.todo = updatedTodo;
      },
      async deleteTodo() {
        await axios.delete(`/todos/${this.todo.id}`);
        this.$router.push({ name: 'todos.index' });
      },
    },
  };
  </script>
  