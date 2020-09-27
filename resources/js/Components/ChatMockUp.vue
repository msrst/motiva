<template>
    <div class="rounded-lg py-2 px-3">
        <div class="h-128 overflow-y-scroll">
            <ul>
                <li v-for="item in fakeData" :key="item.id" class="my-3 mx-2"
                    :class="[item.right ? 'bg-green rounded-l-lg': 'bg-blue-100 rounded-r-lg']"
                >
                    <div class="py-2 px-3">
                        <div
                            :class="[item.right ? 'pl-2 text-sm font-medium text-blue-100' : 'pl-2 text-sm font-medium text-green']"
                        >{{ item.name }}
                        </div>
                        <div class="pl-3"
                        >{{ item.msg }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="font-small text-sm text-gray-800">Tom Riddle and 7 other users are writing ...</div>
        <div class="mt-2 mb-3 border-t border-gray-800"></div>
        <div class="relative">
            <input type="text"
                   v-model="newMessage"
                   class="w-full px-2 py-1 rounded-md border border-gray-200"
                   @keyup.enter="addMessage()"/>
        </div>
    </div>
</template>

<script>

export default {
    name: "ChatMockUp",
    components: {},
    data() {
        return {
            fakeData: [
                {id: 2, name: 'Mattias', msg: 'Doing my homework!'},
                {id: 3, name: 'Emely', msg: 'Studying for the math exam! Tomorrow is the big day!'},
                {id: 4, name: 'Alex', msg: 'Man this is so easy! 😀'},
                {id: 5, name: 'Sam', msg: 'Already done!'},
                {id: 1, name: 'Enric', msg: 'Do we have a math exam tomorrow? 🙈'},
            ],
            newId: 6,
            newMessage: '',
        }
    },
    methods: {
        addMessage() {
            this.fakeData.push({id: this.newId, name: this.$page.user.name, msg: this.newMessage, right: true})
            this.newId = this.newId + 1
            this.newMessage = ''
        },
    }
}
</script>

<style scoped>

</style>
