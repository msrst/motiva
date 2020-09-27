<template>
    <div class="w-full p-3">
        <div class="bg-white rounded-md px-10 py-8">
            <div class="px-6 py-3 bg-gray-700 mb-4">
                <h1 class="text-center text-white font-semibold text-lg">
                    Avatar Customization
                </h1>
            </div>
            <div class="flex justify-around">
                <div class="max-w-sm shadow-lg rounded-lg overflow-hidden bg-white-300">
                    <ul class="flex flex-col justify-evenly p-4 h-full">
                        <li class="border-gray-400 flex flex-row items-center mb-2">
                            <font-awesome-icon
                                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-left"
                                size="2x"
                                @click="itemDown('hairID', hairs)"
                            >
                            </font-awesome-icon>
                            <div
                                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
                            >
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">{{ selectedHair.name }}</div>
                                </div>
                            </div>
                            <font-awesome-icon
                                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-right"
                                size="2x"
                                @click="itemUp('hairID', hairs)"
                            >
                            </font-awesome-icon>
                        </li>
                        <li class="border-gray-400 flex flex-row items-center mb-2">
                            <font-awesome-icon
                                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-left"
                                size="2x"
                                @click="itemDown('faceID', faces)"
                            >
                            </font-awesome-icon>
                            <div
                                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
                            >
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">{{ selectedFace.name }}</div>
                                </div>
                            </div>
                            <font-awesome-icon
                                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-right"
                                size="2x"
                                @click="itemUp('faceID', faces)"
                            >
                            </font-awesome-icon>
                        </li>
                        <li class="border-gray-400 flex flex-row items-center mb-2">
                            <font-awesome-icon
                                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-left"
                                size="2x"
                                @click="itemDown('bodyID', bodies)"
                            >
                            </font-awesome-icon>
                            <div
                                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
                            >
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">{{ selectedBody.name }}</div>
                                </div>
                            </div>
                            <font-awesome-icon
                                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-right"
                                size="2x"
                                @click="itemUp('bodyID', bodies)"
                            >
                            </font-awesome-icon>
                        </li>
                        <li class="border-gray-400 flex flex-row items-center mb-2">
                            <font-awesome-icon
                                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-left"
                                size="2x"
                                @click="itemDown('legsID', legs)"
                            >
                            </font-awesome-icon>
                            <div
                                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
                            >
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">{{ selectedLegs.name }}</div>
                                </div>
                            </div>
                            <font-awesome-icon
                                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-right"
                                size="2x"
                                @click="itemDown('legsID', legs)"
                            >
                            </font-awesome-icon>
                        </li>
                        <li class="border-gray-400 flex flex-row items-center mb-2">
                            <font-awesome-icon
                                class="cursor-pointer mr-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-left"
                                size="2x"
                                @click="itemDown('accessoryID', accessories)"
                            >
                            </font-awesome-icon>
                            <div
                                class="select-none bg-gray-200 rounded-md flex flex-1 items-center p-4"
                            >
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">{{ selectedAccessory.name }}</div>
                                </div>
                            </div>
                            <font-awesome-icon
                                class="cursor-pointer ml-2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
                                icon="arrow-right"
                                size="2x"
                                @click="itemUp('accessoryID', accessories)"
                            >
                            </font-awesome-icon>
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 relative">
                    <img
                        class="select-none w-32 grid-col"
                        src="https://cdn.discordapp.com/attachments/759407593822093332/759592594556059658/Model.svg"
                        alt="avatar"
                    />
                    <img v-if="selectedHair.url!=null"
                        class="select-none w-32 top-0 left-0 absolute z-20"
                         :style="'margin-left:'+selectedHair.ml+'px;margin-top:'+selectedHair.mt+'px;'"
                         :src="selectedHair.url"
                         alt="avatar"/>
                    <img v-if="selectedFace.url!=null"
                         class="select-none w-32 top-0 left-0 absolute z-10"
                         :style="'margin-left:'+selectedFace.ml+'px;margin-top:'+selectedFace.mt+'px;'"
                         :src="selectedFace.url"
                         alt="avatar"/>
                    <img v-if="selectedBody.url!=null"
                         class="select-none w-32 top-0 left-0 absolute z-20"
                         :style="'margin-left:'+selectedBody.ml+'px;margin-top:'+selectedBody.mt+'px;'"
                         :src="selectedBody.url"
                         alt="avatar"/>
                    <img v-if="selectedLegs.url!=null"
                         class="select-none w-32 top-0 left-0 absolute z-20"
                         :style="'margin-left:'+selectedLegs.ml+'px;margin-top:'+selectedLegs.mt+'px;'"
                         :src="selectedLegs.url"
                         alt="avatar"/>
                    <img v-if="selectedAccessory.url!=null"
                         class="select-none w-32 top-0 left-0 absolute z-20"
                         :style="'margin-left:'+selectedAccessory.ml+'px;margin-top:'+selectedAccessory.mt+'px;'"
                         :src="selectedAccessory.url"
                         alt="avatar"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['items'],
    data() {
        return {
            currentSelection: 0,
            hairID: 0,
            faceID: 0,
            bodyID: 0,
            legsID: 0,
            accessoryID: 0,
        };
    },
    mounted() {
        console.log(this.$page.user.hair_id);
        this.hairID = this.hairs.findIndex(x => x.id === this.$page.user.hair_id);
        console.log(this.hairID);
        console.log(this.$page.user.face_id);
        this.faceID = this.faces.findIndex(x => x.id === this.$page.user.face_id);
        console.log(this.faceID);
        this.bodyID = this.bodies.findIndex(x => x.id === this.$page.user.body_id);
        this.legsID = this.legs.findIndex(x => x.id === this.$page.user.legs_id);
        this.accessoryID = this.accessories.findIndex(x => x.id === this.$page.user.accessory_id);
    },
    computed: {
        hairs() {
            return this.$page.items.filter(x => x.type === 'hair');
        },
        selectedHair() {
            let hair = this.hairs[this.hairID];
            if (hair == null) return {name: 'No Hair'};
            return hair;
        },
        faces() {
            return this.$page.items.filter(x => x.type === 'face');
        },
        selectedFace() {
            let face = this.faces[this.faceID];
            if (face == null) return {name: 'No Face'};
            return face;
        },
        bodies() {
            return this.$page.items.filter(x => x.type === 'body');
        },
        selectedBody() {
            let body = this.bodies[this.bodyID];
            if (body == null) return {name: 'No Body'};
            return body;
        },
        legs() {
            return this.$page.items.filter(x => x.type === 'legs');
        },
        selectedLegs() {
            let legs = this.legs[this.legsID];
            if (legs == null) return {name: 'No Legs'};
            return legs;
        },
        accessories() {
            return this.$page.items.filter(x => x.type === 'accessory');
        },
        selectedAccessory() {
            let accessory = this.accessories[this.accessoryID];
            if (accessory == null) return {name: 'No Accessory'};
            return accessory;
        },
    },
    methods: {
        itemDown(variable, data) {
            if (this[variable] - 1 < 0) this[variable] = data.length - 1;
            else this[variable] -= 1;
            this.save();
        },
        itemUp(variable, data) {
            if (this[variable] + 1 >= data.length) this[variable] = 0;
            else this[variable] += 1;
            this.save();
        },
        save() {
            axios.put('/users/' + this.$page.user.id, {
                hair_id: this.selectedHair.id,
                face_id: this.selectedFace.id,
                body_id: this.selectedBody.id,
                legs_id: this.selectedLegs.id,
                accessory_id: this.selectedAccessory.id
            }).then(response => {
            })
        },
    },
};
</script>
