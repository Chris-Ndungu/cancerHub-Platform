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
      <div v-if="error" class="alert alert-danger text-red-500 text-sm">{{ error }}</div>
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

<script setup>
import axios from 'axios' // integration with Laravel backend
import { ref } from 'vue'
import { useRouter } from 'vue-router'

// defining the data variables
const email = ref('')
const password = ref('')
const error = ref(null)

const router = useRouter()

const handleLogin = async () => {
  if (!email.value || !password.value) {
    error.value = 'please fill in all fields.'
    return
  }
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email.value,
      password: password.value
    })

    if (response.data.status == 200) {
      // Access accessToken after successful response
      const accessToken = response.data.token

      // store the access token
      localStorage.setItem('accessToken', accessToken)
      console.log('Access Token Stored:', accessToken)

      // open the user dashboard after successful login
      router.push({ name: 'dashboard' })
    } else {
      error.value = response.data.message || 'Login failed.'
      console.error('Login failed:', response.data.error)
    }
  } catch (err) {
    error.value = err.response.data.message || 'Login failed.'
    console.error('Login error:', err.response.data)
  } finally {
    // Reset form fields (optional)
    email.value = ''
    password.value = ''
  }
}
</script>

<style scoped>
.form-group > label {
  font-size: 14px;
}
</style>
