<template>
    <div>
      <h1>Todo List</h1>
      <form @submit.prevent="addTodo">
        <input v-model="newTodo" placeholder="Add a new task" required />
        <button type="submit">Add</button>
      </form>
  
      <ul>
        <li v-for="todo in todos" :key="todo.id">
          <input
            type="checkbox"
            v-model="todo.completed"
            @change="updateTodoCompletion(todo.id, todo.completed)"
          />
          <span :class="{ completed: todo.completed }">{{ todo.text }}</span>
          <button @click="removeTodo(todo.id)">Remove</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from '../axios';
  
  export default {
    data() {
      return {
        newTodo: '',
        todos: [],
      };
    },
    methods: {
      async fetchTodos() {
        try {
          const response = await axios.get('/todos');
          this.todos = response.data;
        } catch (error) {
          console.error('Error fetching todos:', error);
        }
      },
      async addTodo() {
        if (this.newTodo.trim() !== '') {
          try {
            await axios.post('/todos', { text: this.newTodo });
            this.newTodo = '';
            this.fetchTodos(); 
          } catch (error) {
            console.error('Error adding todo:', error);
          }
        }
      },
      async removeTodo(id) {
        try {
          await axios.delete(`/todos/${id}`);
          this.fetchTodos(); 
        } catch (error) {
          console.error('Error removing todo:', error);
        }
      },
      async updateTodoCompletion(id, completed) {
        try {
          await axios.put(`/todos/${id}`, { completed });
          this.fetchTodos(); // Refresh the list
        } catch (error) {
          console.error('Error updating todo:', error);
        }
      },
    },
    created() {
      this.fetchTodos(); 
    },
  };
  </script>
  
  <style scoped>
  .completed {
    text-decoration: line-through;
  }
  </style>
  