<template>
    <div class="flex flex-wrap justify-around">
        <div v-for="(item, index) in activeUsers" :key="item.id"
            class="flex flex-col justify-between text-center p-8 w-64 h-64 bg-white rounded-full mx-2 overflow-hidden"
        >
            <div class="w-full flex justify-center">
                <avatar
                    :hair-id="item.hair_id"
                    :face-id="item.face_id"
                    :body-id="item.body_id"
                    :legs-id="item.legs_id"
                    :accessory-id="item.accessory_id"
                    size="8"
                    ></avatar>
            </div>
            <div>
                <font-awesome-icon icon="arrow-up" class="text-green"></font-awesome-icon>
            </div>
            <div class="border-t border-gray-100">
                <span>{{ activeUsersCustom[index].name + ' is '}}</span>
                <span class="font-bold">{{activeUsersCustom[index].activity}}</span>
                <span> for the past </span>
                <span>{{activeUsersCustom[index].time}}</span>
            </div>
        </div>
        <div v-for="(item, index) in justFinishedUsers" :key="'finished' + item.id"
             class="flex flex-col justify-between text-center p-8 w-64 h-64 bg-white rounded-full mx-2"
        >
            <div class="w-full flex justify-center">
                <avatar
                :hair-id="item.hair_id"
                :face-id="item.face_id"
                :body-id="item.body_id"
                :legs-id="item.legs_id"
                :accessory-id="item.accessory_id"
                size="8"
            ></avatar>
            </div>
                <div>
                <font-awesome-icon icon="clipboard-check" class="text-green"></font-awesome-icon>
                <span>{{ justFinishedUsers[index].name + ' has just finished '}}</span>
                <span class="font-bold">{{item.activity}}</span>
                <span> for the past </span>
                <span>{{ justFinishedUsers[index].time }}</span>
                <span> and will now </span>
                <span>{{ justFinishedUsers[index].newActivity }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import Avatar from "./Avatar";
export default {
    name: "ActivityPanel",
    components: {Avatar},
    data() {
        return {
            activeUsers: this.$page.users.slice(0, 3),
            activeUsersCustom: [
                {id: 1, name: 'Mattias', activity: 'studying for the math exam', time: '9 hours'},
                {id: 2, name: 'Alex', activity: 'programming an AI system in Assembler', time: '24 years'},
                {id: 3, name: 'Sam', activity: 'planning the week', time: '13 minutes'},
            ],
            justFinishedUsers: this.$page.users.slice(3, 6),
            justFinishedUsersCustom: [
                {id: 1, name: 'Enric', activity: 'playing videogames', newActivity: 'study for the math exam', time: '13 hours'},
                {id: 2, name: 'Ron', activity: 'pursuing Hermione', newActivity: 'care more about his little sister', time: '3 years'},
                {id: 3, name: 'Emely', activity: 'studying for the BIG math exam', newActivity: 'drink some mate', time: '2 hours and 23 minutes'},
            ]
        }
    }
}
</script>

<style scoped>

</style>
