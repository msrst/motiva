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

          <div>
            <form @submit.prevent="submit" class="m-3">
              <label class="px-4 py-1 bg-gray-200" for="name">Name:</label>
              <input class="px-4 py-1" v-model="form.name" id="name" />
              <label class="px-4 py-1" for="days">Days remaining:</label>
              <input class="px-4 py-1" v-model="form.days" type="number" id="days" min="0" max="365" step="1" value="3" size="6">
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
    teacher_tasks: Array,
    students_count: Object,
  },
  methods: {
    submit() {
      this.$inertia.post('/tasks', this.form)
    }
  }
};
</script>
