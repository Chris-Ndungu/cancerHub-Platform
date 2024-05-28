<template>
  <div class="mx-auto w-max my-12 shadow-md px-5 py-10 flex flex-col gap-5 items-center">
    <form @submit.prevent="handleSubmit" class="flex flex-col gap-5 items-center">
      <h1 class="font-bold text-2xl mb-5 text-center">Create an account</h1>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" v-model="name" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email" class="s self-start">Email:</label>
        <input type="email" v-model="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" v-model="password" id="password" name="password" required />
      </div>
      <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="number" v-model="phone_number" id="phone_number" required />
      </div>
      <div class="form-group">
        <label for="county">County:</label>
        <input type="text" v-model="county" id="county" required />
      </div>
      <button
        type="submit"
        class="w-max bg-orange-400 text-white font-bold py-2 px-5 rounded-3xl mt-5 hover:bg-blue-300 hover:text-black hover:underline"
      >
        Register
      </button>
    </form>
    <h2>
      Already have an account?
      <span>
        <router-link to="/login" class="text-blue-400 text-sm hover:underline">
          Log In
        </router-link>
      </span>
    </h2>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      phone_number: '',
      county: ''
    }
  },
  methods: {
    async handleSubmit() {
      // Validation (optional)
      if (!this.name || !this.email || !this.password) {
        alert('Please fill in all fields.')
        return
      }

      // Integrate with Laravel backend (if applicable)
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/register', {
          name: this.name,
          email: this.email,
          password: this.password, // Assuming Laravel handles password hashing
          phone_number: this.phone_number,
          county: this.county
        })
        console.log('Registration successful:', response.data)
        // Clear form or handle success message
      } catch (error) {
        console.error('Registration error:', error)
        // Handle error message
        if (error.response && error.response.status === 422) {
          // Access specific validation errors from Laravel response (adjust based on your API structure)
          const errors = error.response.data.errors // Assuming Laravel sends errors in an "errors" object

          // Build a user-friendly error message
          let errorMessage = ''
          for (const field in errors) {
            errorMessage += `- ${field}: ${errors[field].join(', ')} \n`
          }

          console.error('Registration error (422):', errorMessage)
          alert(errorMessage) // Display error message to user
        } else {
          console.error('Registration error:', error)
          alert('An unexpected error occurred. Please try again later.') // Generic error message
        }
        console.log()
      } finally {
        // Reset form fields (optional)
        this.name = ''
        this.email = ''
        this.password = ''
        this.phone_number = ''
        this.county = ''
      }
    }
  }
}
</script>

<style scoped>
.form-group {
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  width: 100%;
  gap: 10px;
  font-size: 18px;
}
</style>
