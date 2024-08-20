<template>
    <div>
      <h1>Register</h1>
      <form @submit.prevent="register">
        <input v-model="name" placeholder="Name" required />
        <input v-model="email" type="email" placeholder="Email" required />
        <input v-model="password" type="password" placeholder="Password" required />
        <input v-model="password_confirmation" type="password" placeholder="Confirm Password" required />
        <button type="submit">Register</button>
      </form>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </div>
  </template>
  
  <script>
  import axios from '../axios'; 
  
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        errorMessage: '',
      };
    },
    methods: {
      async register() {
        try {
          await axios.post('/register', { 
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.password_confirmation,
          });
          this.$router.push('/login'); 
        } catch (error) {
          this.errorMessage = error.response.data.message || 'Registration failed.';
        }
      },
    },
  };
  </script>
  