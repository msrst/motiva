<template>
  <app-layout>
      <template slot="header">
          Tasks
      </template>
      <template>
          <table class="table-auto min-w-50">
            <thead>
              <tr class="text-left">
                <th class="px-4 py-2">Student</th>
              </tr>
            </thead>
            <tbody class="bg-gray-100">
              <tr class="hover:bg-white" v-for="student in students" style="cursor: pointer;" @click="toggle(task_id, student.id, student.done)">
                <td class="border px-4 py-2">{{ student.name }}</td>
                <td class="border px-4 py-2" v-if="student.done">DONE</td>
                <td class="border px-4 py-2" v-if="!student.done">UNFINISHED</td>
              </tr>
            </tbody>
          </table>

          <div>
            <form @submit.prevent="toggle" class="m-3">
              <button class="px-4 py-1" type="submit">New task</button>
            </form>
          </div>
      </template>
  </app-layout>
</template>



<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
  data() {
    return {
      form: {
        name: null,
        days: null
      },
    }
  },
  components: {
    AppLayout,
  },
  props: {
    task_id: Number,
    task_name: String,
    students: Array,
  },
  methods: {
    toggle(task_id, user_id, done) {
      this.$inertia.post('/taskDetail', {"task_id": task_id, "user_id": user_id, "done": done})
    }
  }
};
</script>
