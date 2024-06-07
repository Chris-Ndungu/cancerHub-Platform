<template>
  <div v-if="userData" class="">
    <section class="p-5 flex justify-between items-start">
      <div class="flex flex-col gap-1">
        <img src="../assets/img/avatar.png" alt="" width="100px" />
        <!-- User name -->
        <h1 class="font-bold pt-2">{{ userData.name }}</h1>
        <!-- County -->
        <h3>{{ userData.county }}, Kenya</h3>
      </div>
      <button>Edit Profile</button>
    </section>

    <section class="p-5 flex flex-col gap-8">
      <div>
        <h1 class="font-bold text-3xl">Your Schedules...</h1>
        <img src="../assets/img/schedule.png" alt="" width="100%" />
      </div>
      <div>
        <h2 class="font-bold text-3xl">Latest Events</h2>
        <div class="flex justify-center">
          <GalleriaComponent />
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import GalleriaComponent from '@/components/GalleriaComponent.vue'

const userData = ref(null)
const loading = ref(false)
const error = ref(null)

const fetchUserData = async () => {
  try {
    loading.value = true
    const response = await axios.get('http://127.0.0.1:8000/api/user', {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('accessToken')}`
      }
    })
    userData.value = response.data
  } catch (err) {
    // log error to the console
    console.log('Error fetching data:', err)
    // pass error to the user
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(fetchUserData)
</script>
