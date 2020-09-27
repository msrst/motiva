<template>
    <app-layout>
        <template slot="header">
            Community
        </template>
        <template>
            <div class="flex justify-between p-4">
                <activity-panel class="w-2/3 mt-2"></activity-panel>
                <chat-mock-up class="w-1/3 bg-white"></chat-mock-up>
            </div>
        </template>
    </app-layout>
</template>


<script>
import AppLayout from "./../Layouts/AppLayout";
import ChatMockUp from "../Components/ChatMockUp";
import ActivityPanel from "../Components/ActivityPanel";

export default {
    components: {
        AppLayout,
        ChatMockUp,
        ActivityPanel
    },
};
</script>
