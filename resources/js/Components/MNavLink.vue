<template>
    <inertia-link :href="href" :class="classes" :method="method">
        <font-awesome-icon :icon="icon" size="3x"></font-awesome-icon>
    </inertia-link>
</template>

<script>
export default {
    name: "MNavLink",
    props: {
        href: String,
        active: Boolean,
        icon: [String, Array],
        method: {
            type: String,
            default: 'get'
        },
    },
    data() {
        return {
            classes: this.active ?
                'flex items-center px-2 text-green'
                :
                'flex items-center px-2 text-gray-800 hover:bg-green hover:text-white'
        }
    }
}
</script>

<style scoped>

</style>
