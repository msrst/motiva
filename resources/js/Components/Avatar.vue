<template>
  <div class="w-full p-3">
    <div class="bg-white rounded-md px-10 py-8">
      <div class="px-6 py-3 bg-gray-700">
        <h1 class="text-center text-white font-semibold text-lg">
          Avatar Customization
        </h1>
      </div>
      <div class="flex justify-around">
        <div class="max-w-sm shadow-lg rounded-lg overflow-hidden bg-white-300">
          <ul class="flex flex-col justify-evenly p-4 h-full">
            <li
              class="border-gray-400 flex flex-row mb-2"
              @click="currentSelection = 1"
            >
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Hair</div>
                </div>
              </div>
            </li>
            <li
              class="border-gray-400 flex flex-row mb-2"
              @click="currentSelection = 2"
            >
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Face</div>
                </div>
              </div>
            </li>
            <li
              class="border-gray-400 flex flex-row mb-2"
              @click="currentSelection = 3"
            >
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Torso</div>
                </div>
              </div>
            </li>
            <li
              class="border-gray-400 flex flex-row mb-2"
              @click="currentSelection = 4"
            >
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Legs</div>
                </div>
              </div>
            </li>
            <li
              class="border-gray-400 flex flex-row mb-2"
              @click="currentSelection = 5"
            >
              <div
                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Accessories</div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="max-w-sm overflow-hidden my-4 bg-white-300">
          <img
            class="w-32 h-320 mx-auto object-cover object-center"
            src="https://cdn.discordapp.com/attachments/759407593822093332/759592594556059658/Model.svg"
            alt="avatar"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentSelection: 0,
    };
  },
  methods: {},
};
</script>
