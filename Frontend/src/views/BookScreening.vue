<template>
  <div class="my-8 px-24 flex justify-center">
    <!-- 
            map with pins for the different centers across the country
            Booking form
         -->
    <form action="" method="post">
      <fieldset class="">
        <!-- Name -->
        <div class="mb-8 flex gap-8">
          <div class="field">
            <label for="first-name">First Name</label>
            <input class="input" type="text" name="first-name" />
          </div>
          <div class="field">
            <label for="middle-name">Middle Name</label>
            <input class="input" type="text" name="middle-name" />
          </div>
          <div class="field">
            <label for="last-name">Last Name</label>
            <input type="text" name="last-name" id="" />
          </div>
        </div>

        <!-- Contact -->
        <div class="mb-8 flex gap-8">
          <div class="field">
            <label for="phone-number">Phone Number</label>
            <input type="number" name="phone-number" id="" placeholder="Phone Number" />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="" placeholder="Email" />
          </div>
        </div>
        <!-- Gender and county -->
        <div class="mb-8 flex gap-8">
          <div class="field">
            <label for="gender">Gender</label>
            <select name="gender" id="gender-picker">
              <option value>Choose your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="field">
            <label for="county">County of residence</label>
            <input type="text" name="county" id="county" />
          </div>
        </div>
        <!-- Date and Specialty -->
        <div class="mb-8 flex w-full justify-between">
          <div class="field">
            <label for="date">Preferred date of appointment</label>
            <input type="date" name="date" id="" />
          </div>
          <div class="field">
            <label for="specialty">Specialty</label>
            <select name="specialty" id="">
              <option value>Choose a specialty</option>
              <option value="">Texas Cancer Center</option>
              <option value="">Aga Khan University Hospital-Nairobi</option>
              <option value="">Kenyatta National Hospital</option>
              <option value="">Kenyatta University Referal Hospital</option>
              <option value="">Mombasa Hospital</option>
            </select>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</template>

<script></script>

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
