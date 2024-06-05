<script setup>
import { useRouter } from 'vue-router'

import GalleriaComponent from '@/components/GalleriaComponent.vue'
import NewsletterComponent from '@/components/NewsletterComponent.vue'

const router = useRouter()

// redirect to booking component/page
const goToBooking = () => {
  router.push({ name: 'booking' })
}
</script>

<template>
  <body class="lg:p-10">
    <!-- Hero section -->
    <section class="flex lg:flex-row flex-col flex-grow justify-between mb-8 items-center">
      <div class="flex flex-col justify-center items-center order-2 lg:order-1 p-8">
        <h1 class="text-3xl text-center font-bold p-3">
          Your one stop platform for cancer awareness and management
        </h1>
        <h2 class="p-3 text-2xl">Create awareness. Access to the latest events.</h2>
        <h3 class="text-center text-xl p-3 leading-loose">
          Early cancer detection greately increases the chances of treatment. Book for screening
          today at the nearest health facility and know your status.
        </h3>
        <button
          @click="goToBooking"
          class="w-max bg-orange-400 text-white font-bold text-xl py-3 px-5 rounded-3xl mt-8 hover:bg-blue-300 hover:text-black hover:underline"
        >
          Book Screening
        </button>
      </div>
      <div class="order-1 lg:order-2 w-full">
        <img src="@/assets/img/hero-month.png" alt="" width="100%" />
      </div>
    </section>

    <!-- Main section -->
    <section class="my-8 flex flex-col gap-10">
      <!-- Support -->
      <div class="flex flex-col items-center gap-3 font-bold text-xl">
        <h1 class="text-2xl">Need someone to talk to?</h1>
        <h2>Talk to our counsellors or medical practitioners today.</h2>
        <h3>
          Support Line:
          <span
            ><a href="tel:+1100123456" class="te underline hover:text-orange-500"
              >1100 123 456</a
            ></span
          >
        </h3>
        <h4>9am-5pm, Monday to Friday</h4>
        <p class="font-bold">
          Email:
          <span
            ><a href="mailto:" class="te underline hover:text-orange-500"
              >supportline@center.com</a
            ></span
          >
        </p>
      </div>
      <!-- Awareness -->
      <div class="mx-5">
        <h1 class="font-bold text-3xl text-left w-max">Today's Spotlight...</h1>

        <!-- cards -->
        <div class="my-8">
          <div
            class="flex flex-col md:flex-row md:content-center md:items-center gap-8 md:gap-10 mb-8 p-5 shadow-md"
          >
            <div class="">
              <img src="../assets/img/Breast-Cancer.png" alt="" width="100%" />
            </div>

            <div class="flex flex-col gap-3">
              <h1 class="text-blue-400 text-xl font-bold">Breast Cancer</h1>
              <p>
                Breast cancer is one of the most common cancers that affects women and people
                assigned female at birth.
              </p>
              <h2 class="flex gap-2 font-bold">
                Fact:
                <span
                  >Breast cancer is the second most common cancer in women after skin cancer.</span
                >
              </h2>
              <h2 class="flex flex-col gap-2 font-bold">
                Symptoms:
                <span class="px-5">
                  <ul class="list list-disc">
                    <li>A change in the size, shape or contour of your breast.</li>
                    <li>A mass or lump, which may feel as small as a pea.</li>
                    <li>
                      A lump or thickening in or near your breast or in your underarm that persists
                      through your menstrual cycle.
                    </li>
                    <p>...</p>
                  </ul>
                </span>
              </h2>
              <button
                class="w-max bg-orange-400 text-white font-bold text-xl py-3 px-5 rounded-3xl mt-8 hover:bg-blue-300 hover:text-black hover:underline self-center"
              >
                Learn More...
              </button>
            </div>
          </div>
          <h2 class="font-bold text-3xl">I would like information on...</h2>
          <section class="flex justify-between mt-5 gap-5">
            <div class="w-full flex flex-col gap-3">
              <img src="../assets/img/types-cancer.jpg" alt="" class="w-full" />
              <h3>Types of Cancer</h3>
              <button
                class="w-max bg-orange-400 py-2 px-5 rounded-3xl hover:bg-blue-300 hover:text-black hover:underline self-center"
              >
                View
              </button>
            </div>

            <div class="w-full flex flex-col gap-3">
              <img src="../assets/img/treatment.jpg" alt="" class="w-full" />
              <h3>Cancer Treatments</h3>
              <button
                class="w-max bg-orange-400 py-2 px-5 rounded-3xl hover:bg-blue-300 hover:text-black hover:underline self-center"
              >
                View
              </button>
            </div>
            <div class="w-full flex flex-col gap-3">
              <img src="../assets/img/treatments.jpg" alt="" class="w-full" />
              <h3>Medication and Recovery</h3>
              <button
                class="w-max bg-orange-400 py-2 px-5 rounded-3xl hover:bg-blue-300 hover:text-black hover:underline self-center"
              >
                View
              </button>
            </div>
          </section>
        </div>
      </div>
      <!-- Events -->
      <div class="flex flex-col gap-8 justify-center md:my-5">
        <h1 class="font-bold text-3xl">Our Latest News and Events</h1>

        <div class="flex gap-14 items-center justify-center">
          <GalleriaComponent />
          <GalleriaComponent />
        </div>
      </div>
      <!-- Services -->
      <div class="flex flex-col items-center">
        <h1 class="font-bold text-3xl">Services we offer:</h1>
        <ul class="text-xl text-center leading-loose text-blue-800">
          <li>Consultation Services</li>
          <li>Patients Management</li>
          <li>Screening Booking</li>
          <li>Cancer Awareness</li>
          <li>Events Booking</li>
        </ul>
      </div>
      <!-- Newsletter -->
      <NewsletterComponent />
    </section>
  </body>
</template>
