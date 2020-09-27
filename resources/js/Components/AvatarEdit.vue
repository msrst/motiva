<template>
    <div class="w-full p-3">
        <div class="bg-white rounded-md px-10 py-8">
            <div class="px-6 py-3 bg-gray-700 mb-4">
                <h1 class="text-center text-white font-semibold text-lg">
                    Avatar Customization
                </h1>
            </div>
            <div class="flex justify-around">
                <div class="w-1/2 max-w-sm shadow-lg rounded-lg overflow-hidden bg-white-300">
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
                    <avatar
                        :hair-id="selectedHair.id"
                        :face-id="selectedFace.id"
                        :body-id="selectedBody.id"
                        :legs-id="selectedLegs.id"
                        :accessory-id="selectedAccessory.id"
                    ></avatar>
            </div>
        </div>
    </div>
</template>

<script>
import Avatar from "./Avatar"
export default {
    props: ['items'],
    components: {Avatar},
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
        this.hairID = this.hairs.findIndex(x => x.id === this.$page.user.hair_id);
        this.faceID = this.faces.findIndex(x => x.id === this.$page.user.face_id);
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
