import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'

import PrimeVue from 'primevue/config'
import 'primevue/resources/themes/aura-light-green/theme.css'

import Galleria from 'primevue/galleria'

const app = createApp(App)

app.use(router)
app.use(PrimeVue)
app.use(createPinia())

app.component('GalleriaComponent', Galleria)

app.mount('#app')
