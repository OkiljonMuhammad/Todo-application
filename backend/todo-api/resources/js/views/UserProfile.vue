<template>
    <div>
      <h2>User Profile</h2>
      <div v-if="user">
        <p>Name: {{ user.name }}</p>
        <p>Email: {{ user.email }}</p>
        <button @click="logout">Logout</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from '../axiosInstance';
  
  export default {
    data() {
      return {
        user: null,
      };
    },
    async created() {
      const response = await axios.get('/user');
      this.user = response.data;
    },
    methods: {
      async logout() {
        await axios.post('/logout');
        localStorage.removeItem('auth_token');
        this.$router.push({ name: 'login' });
      },
    },
  };
  </script>
  