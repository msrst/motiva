<template>
  <app-layout>
      <template slot="header">
          Tasks
      </template>
      <template>
          <table class="table-auto min-w-50">
            <thead>
              <tr class="text-left">
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Status</th>
              </tr>
            </thead>
            <tbody class="bg-gray-100">
              <tr class="hover:bg-white" v-for="task in teacher_tasks">
                <td class="border px-4 py-2">{{ task.name }}</td>
                <td class="border px-4 py-2">{{ task.students_done }} / {{ students_count }} </td>
              </tr>
            </tbody>
          </table>
      </template>
  </app-layout>
</template>



<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    teacher_tasks: Array,
    students_count: Object,
  },
};
</script>
