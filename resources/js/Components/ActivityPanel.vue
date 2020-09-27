<template>
    <div class="flex flex-wrap justify-around">
        <div v-for="item in activeUsers" :key="item.id"
            class="flex flex-col justify-between text-center p-8 w-64 h-64 bg-white rounded-full mx-2 overflow-hidden"
        >
            <div class="w-full"><img class="h-16 mx-auto object-cover object-center" src="https://media.discordapp.net/attachments/759407593822093332/759520636740960276/untitled_4.png" alt="avatar"></div>
            <div>
                <font-awesome-icon icon="arrow-up" class="text-green"></font-awesome-icon>
            </div>
            <div class="border-t border-gray-100">
                <span>{{ item.name + ' is '}}</span>
                <span class="font-bold">{{item.activity}}</span>
                <span> for the past </span>
                <span>{{item.time}}</span>
            </div>
        </div>
        <div v-for="item in justFinishedUsers" :key="'finished' + item.id"
             class="flex flex-col justify-between text-center p-8 w-64 h-64 bg-white rounded-full mx-2"
        >
            <div class="w-full"><img class="h-16 mx-auto object-cover object-center" src="https://media.discordapp.net/attachments/759407593822093332/759520636740960276/untitled_4.png" alt="avatar"></div>
            <div>
                <font-awesome-icon icon="clipboard-check" class="text-green"></font-awesome-icon>
                <span>{{ item.name + ' has just finished '}}</span>
                <span class="font-bold">{{item.activity}}</span>
                <span> for the past </span>
                <span>{{ item.time }}</span>
                <span> and will now </span>
                <span>{{ item.newActivity }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ActivityPanel",
    data() {
        return {
            activeUsers: [
                {id: 1, name: 'Mattias', activity: 'studying for the math exam', time: '9 hours'},
                {id: 2, name: 'Alex', activity: 'programming an AI system in Assembler', time: '24 years'},
                {id: 3, name: 'Sam', activity: 'planning the week', time: '13 minutes'},
            ],
            justFinishedUsers: [
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
