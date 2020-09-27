<template>
  <app-layout>
      <template slot="header">
          Dashboard
      </template>
      <template>
          <!-- component -->
<li class="flex flex-row">
<div class="max-w-sm shadow-lg rounded-lg overflow-hidden my-4 bg-gray-300 ml-32">
        <img class="w-32 h-320 mx-auto object-cover object-center" src="https://media.discordapp.net/attachments/759407593822093332/759520636740960276/untitled_4.png" alt="avatar">
        <div class="px-6 py-3 bg-gray-700">
            <h1 class="text-center text-white font-semibold text-lg">{{$page.user.name}}</h1>
        </div>

        <!-- component -->
   <ul class="flex flex-col p-4">
        <li class="border-gray-400 flex flex-row mb-2">

          <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-direction-right items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 pl-1 mr-32">
              <div class="font-medium">Daily Points</div>
            </div>
            <div class="text-gray-600 text-s">{{$page.user.dailypoints}}/10</div>
          </div>
            <div class="mx-auto pt-3">
                <font-awesome-icon icon="sad-tear" v-if="$page.user.dailypoints<10" size="3x" class="p-2 text-yellow bg-gray-400 rounded-md" ></font-awesome-icon>
                <font-awesome-icon icon="check-circle" v-else size="3x" class="text-green"></font-awesome-icon>
            </div>
        </li>
             <li class="border-gray-400 flex flex-row mb-2">
          <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 pl-1 mr-16">
              <div class="font-medium">Weekly Points</div>
            </div>
            <div class="text-gray-600 text-s">{{$page.user.weeklypoints}}</div>
          </div>
        </li>
             <li class="border-gray-400 flex flex-row mb-2">
          <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 pl-1 mr-16">
              <div class="font-medium">Total Points</div>
            </div>
            <div class="text-gray-600 text-s">{{$page.user.totalpoints}}</div>
          </div>
        </li>
    </ul>
    </div>

    <div class="max-w-sm shadow-lg rounded-lg overflow-hidden my-4 bg-gray-300 ml-32">
        <div class="px-6 py-3 bg-gray-700">
            <h1 class="text-center text-white font-semibold text-lg">{{$page.user.name}}</h1>
        </div>

        <!-- component -->

    </div>
    </li>
      </template>
  </app-layout>
</template>


<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
};
</script>
