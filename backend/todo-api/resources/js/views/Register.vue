<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="register">
      <input v-model="form.name" placeholder="Name" required />
      <input v-model="form.email" type="email" placeholder="Email" required />
      <input v-model="form.password" type="password" placeholder="Password" required />
      <input v-model="form.password_confirmation" type="password" placeholder="Confirm Password" required />
      <button type="submit">Register</button>
    </form>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script>
import axios from '../axiosInstance';

export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      error: '',
    };
  },
  methods: {
    async register() {
      try {
        await axios.post('/register', this.form);
        this.$router.push({ name: 'login' });
      } catch (error) {
        this.error = 'Registration failed. Please check your details and try again.';
      }
    }
  }
};
</script>
