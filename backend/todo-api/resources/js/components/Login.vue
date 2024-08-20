<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="login">
        <input v-model="email" type="email" placeholder="Email" required />
        <input v-model="password" type="password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </div>
  </template>
  
  <script>
  import axios from '../axios';
  
  export default {
    data() {
      return {
        email: '',
        password: '',
        errorMessage: '',
      };
    },
    methods: {
      async login() {
        try {
          await axios.post('/login', {
            email: this.email,
            password: this.password,
          });
          this.$router.push('/todos'); 
        } catch (error) {
          this.errorMessage = error.response.data.message || 'Login failed.';
        }
      },
    },
  };
  </script>
  