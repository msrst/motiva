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
            <li class="border-gray-400 flex flex-row items-center mb-2">
              <font-awesome-icon
                v-if="hairID !== 0"
                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                icon="arrow-left"
                size="2x"
                @click="hairID = hairID - 1"
              >
              </font-awesome-icon>
              <div
                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
              >
                <div class="flex-1 pl-1 mr-16">
                  <div class="font-medium">Hair</div>
                </div>
              </div>
              <font-awesome-icon
                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                icon="arrow-right"
                size="2x"
                @click="hairID = hairID + 1"
              >
              </font-awesome-icon>
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
        <div class="max-w-sm overflow-hidden my-4 bg-white-300 relative">
          <img
            class=""
            src="https://cdn.discordapp.com/attachments/759407593822093332/759592594556059658/Model.svg"
            alt="avatar"
          />
          <img class="h-48" src="/images/Pigtail.svg" alt="avatar" />
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
      hairID: 0,
      hairIDs: [],
    };
  },
  mounted() {
    this.hairID = this.$page.user.hairID;
    this.hairIDs = this.$page.hairIDs;
  },
  methods: {},
};
</script>
