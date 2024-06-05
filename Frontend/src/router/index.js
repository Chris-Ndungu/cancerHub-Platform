import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import UserRegister from '@/views/UserRegister.vue'
import UserLogin from '@/views/UserLogin.vue'
import Booking from '@/views/BookScreening.vue'
import Dashboard from '@/views/UserDashboard.vue'
import Contact from '@/views/ContactUs.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: UserLogin
    },
    {
      path: '/register',
      name: 'userRegister',
      component: UserRegister
    },
    {
      path: '/booking',
      name: 'booking',
      component: Booking
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contact
    }
  ]
})

export default router
