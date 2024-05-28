<template>
  <div class="mx-auto my-12 px-8 py-5 w-max border shadow-md">
    <form @submit.prevent="handleLogin" class="flex flex-col items-center gap-3">
      <h1 class="text-2xl font-bold mb-8">Log In</h1>
      <h2>
        New user?
        <span>
          <router-link to="/register" class="text-blue-400 text-sm hover:underline">
            Create an account
          </router-link>
        </span>
      </h2>
      <div class="form-group">
        <label for="email">Email</label>
        <br />
        <input type="email" v-model="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <br />
        <input type="password" v-model="password" id="password" name="password" required />
      </div>
      <div class="form-group self-start">
        <div class="flex gap-3 items-center justify-center content-center">
          <label for="remember-me">Remember me</label>
          <input type="checkbox" name="remember-me" id="remember-me" />
        </div>
      </div>
      <button
        type="submit"
        class="w-full mx-3 bg-orange-400 text-white font-bold py-2 px-5 rounded-3xl mt-5 hover:bg-blue-300 hover:text-black hover:underline"
      >
        LOG IN
      </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios' // integration with Laravel backend

export default {
  data() {
    return {
      email: '',
      password: '',
      error: null
    }
  },
  methods: {
    async handleLogin() {
      // Basic validation (optional)
      if (!this.email || !this.password) {
        this.error = 'Please fill in all fields.'
        return
      }

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/login', {
          email: this.email,
          password: this.password
        })
        if (response.data.success) {
          const accessToken = response.data.token // Access accessToken after successful response
          localStorage.setItem('accessToken', accessToken) // Set access token in localStorage
          console.log('Access Token stored:', accessToken)
        } else {
          // Handle login failure
          console.error('Login failed:', response.data.error)
        }

        this.$router.push('/dashboard')
      } catch (error) {
        console.error('Login error:', error.response.data)
        this.error = error.response.data.message || 'Login failed.' // Assuming Laravel API returns error messages
      } finally {
        // Reset form fields (optional)
        this.email = ''
        this.password = ''
      }
    }
  }
}
</script>

<style scoped>
.form-group > label {
  font-size: 14px;
}
</style>
