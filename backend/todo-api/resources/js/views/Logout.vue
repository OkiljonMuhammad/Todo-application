<template>
    <div>
      <h1>Logout</h1>
      <button @click="logout">Logout</button>
    </div>
  </template>
  
  <script>
  import axios from '../js/axios';
  
  export default {
    methods: {
      async logout() {
        try {
          await axios.post('/logout');
          this.$router.push('/login'); 
        } catch (error) {
          console.error('Logout failed:', error);
        }
      },
    },
  };
  </script>
  