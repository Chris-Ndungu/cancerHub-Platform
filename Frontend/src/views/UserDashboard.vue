<template>
  <div>
    <section>
      <div>
        <img
          src="../
                "
          alt=""
        />
        <h1>Profile Picture</h1>
      </div>
    </section>
  </div>
  <div v-if="userData">
    <h1>{{ userData.token }}</h1>
    <p>{{ userData.message }}</p>
  </div>
  <div v-else-if="error">Loading profile data...</div>
  <div v-else>Error fetching profile data: {{ error.message }}</div>
</template>

<script>
import axios from 'axios' // Assuming you have Axios installed

export default {
  data() {
    return {
      userData: null,
      loading: false,
      error: null
    }
  },
  created() {
    this.fetchUserData()
  },
  methods: {
    async fetchUserData() {
      try {
        this.loading = true
        const response = await axios.get('http://127.0.0.1:8000/api/user', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('accessToken')}` // Assuming access token in localStorage
          }
        })
        this.userData = response.data
      } catch (error) {
        console.error('Error fetching user data:', error)
        this.error = error
      } finally {
        this.loading = false
      }
    }
  }
}
</script>
