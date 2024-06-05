<template>
  <div class="my-8 px-5 flex justify-center">
    <!-- 
            map with pins for the different centers across the country
            Booking form
         -->
    <form @submit.prevent="handleSubmit">
      <fieldset class="flex flex-col">
        <!-- Name -->
        <div class="mb-8 flex flex-col md:flex-row justify-between gap-3">
          <div class="field">
            <label for="first_name">First Name</label>
            <input v-model="firstName" class="input" type="text" name="firstName" id="firstName" />
          </div>
          <div class="field">
            <label for="middle_name">Middle Name</label>
            <input
              v-model="middleName"
              class="input"
              type="text"
              name="middleName"
              id="middleName"
            />
          </div>
          <div class="field">
            <label for="last-name">Last Name</label>
            <input v-model="lastName" type="text" name="lastName" id="lastName" />
          </div>
        </div>

        <!-- Contact -->
        <div class="mb-8 flex gap-8 justify-between">
          <div class="field">
            <label for="phone-number">Phone Number</label>
            <input
              v-model="phoneNumber"
              type="text"
              name="phoneNumber"
              id="phoneNumber"
              placeholder="Phone Number"
            />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input v-model="email" type="email" name="email" id="email" placeholder="Email" />
          </div>
        </div>
        <!-- Gender and county -->
        <div class="mb-8 flex gap-8 justify-between">
          <div class="field">
            <label for="gender">Gender</label>
            <select v-model="gender" name="gender" id="gender">
              <option value>Select your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="field">
            <label for="county">County of residence</label>
            <input v-model="county" type="text" name="county" id="county" />
          </div>
        </div>
        <!-- Date and Specialty -->
        <div class="mb-8 flex gap-10 justify-between">
          <div class="field">
            <label for="date">Preferred date of appointment</label>
            <input v-model="date" type="date" name="date" id="date" />
          </div>
          <div class="field">
            <label for="facility">Facility</label>
            <select v-model="facility" name="facility" id="facility">
              <option value>Select a facility</option>
              <option value="texas">Texas Cancer Center</option>
              <option value="aga-khan">Aga Khan University Hospital-Nairobi</option>
              <option value="knh">Kenyatta National Hospital</option>
              <option value="kurh">Kenyatta University Referal Hospital</option>
              <option value="mombasa">Mombasa Hospital</option>
            </select>
          </div>
        </div>
        <button
          type="submit"
          class="w-max bg-orange-400 py-2 px-5 rounded-3xl text-white font-bold text-xl hover:bg-blue-300 hover:text-black hover:underline self-center place-self-center"
        >
          Submit
        </button>
      </fieldset>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      firstName: '',
      middleName: '',
      lastName: '',
      email: '',
      phoneNumber: '',
      county: '',
      date: '',
      facility: ''
    }
  },
  methods: {
    async handleSubmit() {
      // Validation
      const requiredFields = ['firstName', 'email', 'date', 'facility']
      let hasMissingFields = false
      let errorMessage = ''

      for (const field of requiredFields) {
        if (!this[field]) {
          hasMissingFields = true
          errorMessage += `- ${field} is required.\n`
        }
      }

      if (hasMissingFields) {
        alert(errorMessage)
        return
      }

      // Integrate with Laravel backend
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/booking', {
          first_name: this.firstName,
          middle_name: this.middleName,
          last_name: this.lastName,
          email: this.email,
          phone_number: this.phoneNumber,
          county: this.county,
          date: this.date,
          facility: this.facility
        })
        console.log('Booking successful:', response.data)

        // Clear form or handle success message (e.g., display success message, redirect to confirmation page)
        this.clearForm() // Call a clearForm method (see below)
        alert('Booking submitted successfully!')
      } catch (error) {
        console.error('Booking error:', error)

        // Handle error message
        if (error.response && error.response.status === 422) {
          // Access specific validation errors from Laravel response (adjust based on your API structure)
          const errors = error.response.data.errors // Assuming Laravel sends errors in an "errors" object

          // Build a user-friendly error message
          let errorMessage = ''
          for (const field in errors) {
            errorMessage += `- ${field}: ${errors[field].join(', ')} \n`
          }

          console.error('Booking error (422):', errorMessage)
          console.log(errorMessage)
          alert(errorMessage) // Display error message to user
        } else {
          console.error('Booking error:', error)
          alert('An unexpected error occurred. Please try again later.') // Generic error message
        }
      } finally {
        // Reset form fields
        this.clearForm()
      }
    },
    clearForm() {
      this.firstName = ''
      this.middleName = ''
      this.lastName = ''
      this.email = ''
      this.phoneNumber = ''
      this.county = ''
      this.date = ''
      this.facility = ''
    }
  }
}
</script>

<style>
input {
  border: 0.5px solid grey;
  border-radius: 5px;
  margin: 0;
  padding: 2px 5px;
}
.field {
  display: flex;
  flex-direction: column;
  gap: 5;
}
</style>
