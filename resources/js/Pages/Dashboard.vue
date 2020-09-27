<template>
  <app-layout>
    <template slot="header"> Dashboard </template>
    <template>
      <!-- component -->
      <div class="flex flex-row flex-wrap justify-around mt-16">
        <div
          class="w-full sm:w-1/2 shadow-lg rounded-lg overflow-hidden bg-gray-200"
        >
        <div class="flex justify-center p-4">
            <avatar></avatar>
        </div>
          <div class="px-6 py-3 bg-gray-700">
            <h1 class="text-center text-white font-semibold text-lg">
              {{ $page.user.name }}
            </h1>
          </div>

          <!-- component -->
          <ul class="p-4">
            <li class="border-gray-200 mb-2">
              <div
                class="flex justify-between align-center select-none cursor-pointer bg-gray-200 rounded-md p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                  <h3 class="mt-4 font-medium">Daily tasks</h3>
                  <div class="w-2/3 bg-white h-1/2 mt-4">
                      <div
                          class="h-full bg-green text-sm leading-none py-1 px-1 text-center text-white"
                          :class="progressClasses"
                      >
                          {{ dailyPoints }} / 10
                      </div>
                  </div>
                  <div class="pt-1">
                      <font-awesome-icon
                          icon="sad-tear"
                          v-if="dailyPoints < 10"
                          size="3x"
                          class="p-2 text-yellow"
                      ></font-awesome-icon>
                      <font-awesome-icon
                          icon="check-circle"
                          v-else
                          size="3x"
                          class="text-green"
                      ></font-awesome-icon>
                  </div>
              </div>

            </li>
            <li class="border-gray-400 flex flex-row mb-2">
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Weekly Points</div>
                </div>
                <div class="text-gray-600 text-s">
                  {{ weeklyPoints }}
                </div>
              </div>
            </li>
            <li class="border-gray-400 flex flex-row mb-2">
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Total Points</div>
                </div>
                <div class="text-gray-600 text-s">
                  {{ totalPoints }}
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="mt-4 sm:mt-0">
          <div
            class="w-full shadow-lg rounded-lg bg-gray-300 overflow-y-scroll h-128"
          >
            <table class="text-left">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="p-3">
                            Position
                        </th>
                        <th class="p-3"></th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Points</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in $page.users" class="bg-gray-200">
                    <td class="p-8">#{{index}}</td>
                    <td>
                        <avatar
                            size="5"
                            :hair-id="user.hair_id"
                            :face-id="user.face_id"
                            :body-id="user.body_id"
                            :legs-id="user.legs_id"
                            :accessory-id="user.accessory_id"
                        ></avatar>
                    </td>

                    <td class="p-8">{{ user.name }}</td>
                    <td class="p-8">{{ user.points }}</td>
                </tr>
                </tbody>
            </table>

            <!-- component -->
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";
import Avatar from "../Components/Avatar";

export default {
  components: {
    AppLayout,
    Welcome,
      Avatar
  },

  computed: {
      dailyPoints() {
          return parseInt(this.$page.user.points || 0)
      },
      weeklyPoints() {
          return parseInt(this.dailyPoints * (Math.floor(Math.random() * 10) + 1));
      },
      totalPoints() {
          return parseInt(this.weeklyPoints * (Math.floor(Math.random() * 10) + 1));
      },
    progressClasses() {
      const progress = this.dailyPoints / 10;
      if (progress === 0) return "w-1/10";
      if (progress === 0.1) return "w-1/10";
      if (progress === 0.2) return "w-1/5";
      if (progress === 0.3) return "w-3/10";
      if (progress === 0.4) return "w-2/5";
      if (progress === 0.5) return "w-1/2";
      if (progress === 0.6) return "w-3/5";
      if (progress === 0.7) return "w-7/10";
      if (progress === 0.8) return "w-4/5";
      if (progress === 0.9) return "w-9/10";
      return "w-full";
    }
  }
};
</script>
