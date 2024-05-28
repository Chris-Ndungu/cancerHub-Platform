import { defineStore } from 'pinia'
import axios from 'axios'

export const useUserStore = defineStore('user', {
  state: () => ({
    userData: null, // Store user data here
    loading: false, // Track loading state for fetching data
    error: null // Store any errors during data fetching
  }),
  actions: {
    async fetchUserData() {
      try {
        this.loading = true
        const response = await axios.get('/api/user')
        this.userData = response.data
        console.log(this.userData)
      } catch (error) {
        console.error('Error fetching user data:', error)
        this.error = error // Store the error for handling
      } finally {
        this.loading = false
      }
    }
  }
})
