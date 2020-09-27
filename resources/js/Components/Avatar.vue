<template>
    <div class="grid grid-cols-1 relative">
        <img
            class="select-none grid-col"
            :class="'w-'+size"
            src="/images/model.svg"
            alt="avatar"
        />
        <img v-if="hair.url!=null"
             class="select-none top-0 left-0 absolute z-20"
             :class="'w-'+size"
             :src="hair.url"
             alt="avatar"/>
        <img v-if="face.url!=null"
             class="select-none top-0 left-0 absolute z-10"
             :class="'w-'+size"
             :src="face.url"
             alt="avatar"/>
        <img v-if="body.url!=null"
             class="select-none top-0 left-0 absolute z-20"
             :class="'w-'+size"
             :src="body.url"
             alt="avatar"/>
        <img v-if="legs.url!=null"
             class="select-none top-0 left-0 absolute z-20"
             :class="'w-'+size"
             :src="legs.url"
             alt="avatar"/>
        <img v-if="accessory.url!=null"
             class="select-none top-0 left-0 absolute z-20"
             :class="'w-'+size"
             :src="accessory.url"
             alt="avatar"/>
    </div>
</template>

<script>
export default {
    name: "Avatar",
    props: {
        hairId: Number,
        faceId: Number,
        bodyId: Number,
        legsId: Number,
        accessoryId: Number,
        size: {
            type: String,
            default: '32'
        }
    },
    data() {
        return {
        }

    },
    computed: {
        hairID() {
            return this.hairId != null ? this.hairId : this.$page.user.hair_id;
        },
        hair() {
            let hair = this.hairs.find(x => x.id === this.hairID);
            if (hair == null) return {name: 'No Hair'};
            return hair;
        },
        hairs() {
            return this.$page.items.filter(x => x.type === 'hair');
        },
        faceID() {
            return this.faceId != null ? this.faceId : this.$page.user.face_id;
        },
        face() {
            let face = this.faces.find(x => x.id === this.faceID);
            if (face == null) return {name: 'No Face'};
            return face;
        },
        faces() {
            return this.$page.items.filter(x => x.type === 'face');
        },
        bodyID() {
            return this.bodyId != null ? this.bodyId : this.$page.user.body_id;
        },
        body() {
            let body = this.bodies.find(x => x.id === this.bodyID);
            if (body == null) return {name: 'No Body'};
            return body;
        },
        bodies() {
            return this.$page.items.filter(x => x.type === 'body');
        },
        legsID() {
            return this.legsId != null ? this.legsId : this.$page.user.legs_id;
        },
        legs() {
            let legs = this.legsOptions.find(x => x.id === this.legsID);
            if (legs == null) return {name: 'No Legs'};
            return legs;
        },
        legsOptions() {
            return this.$page.items.filter(x => x.type === 'legs');
        },
        accessoryID() {
            return this.accessoryId != null ? this.accessoryId : this.$page.user.accessory_id;
        },
        accessory() {
            let accessory = this.accessories.find(x => x.id === this.accessoryID);
            if (accessory == null) return {name: 'No Accessory'};
            return accessory;
        },
        accessories() {
            return this.$page.items.filter(x => x.type === 'accessory');
        },
    }
}
</script>

<style scoped>

</style>
