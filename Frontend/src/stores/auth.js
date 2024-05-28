import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    accessToken: null // Store the access token here
  }),
  actions: {
    setAccessToken(token) {
      this.accessToken = token
    },
    async fetchUserData() {
      try {
        this.loading = true // Assuming you have a loading state in your component
        const response = await axios.get('http://127.0.0.1:8000/api/user', {
          headers: {
            Authorization: `Bearer ${this.accessToken}` // Use token from store
          }
        })
        console.log(response)
        this.userData = response.data
      } catch (error) {
        console.error('Error fetching user data:', error)
        this.error = error // Assuming you have an error state in your component
      } finally {
        this.loading = false // Assuming you have a loading state in your component
      }
    }
  }
})
