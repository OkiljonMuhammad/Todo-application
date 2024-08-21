<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <input type="email" v-model="form.email" placeholder="Email" />
      <input type="password" v-model="form.password" placeholder="Password" />
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import axios from '../axiosInstance';

export default {
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/login', this.form);
        localStorage.setItem('auth_token', response.data.token);
        this.$router.push({ name: 'todos.index' });
      } catch (error) {
      }
    },
  },
};
</script>
