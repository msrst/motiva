<template>
  <app-layout>
      <template slot="header">
          Dashboard
      </template>
      <template>
          Content
      </template>
  </app-layout>
</template>



<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
};
</script>
