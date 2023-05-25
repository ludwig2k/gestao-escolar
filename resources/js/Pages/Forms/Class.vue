<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<form @submit.prevent="storeClass" class="space-y-4">
  <div>
    <label for="teacherId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Professores</label>
    <select v-model="form.teacherId" id="teacherId" class="form-select">
      <option value="" disabled>Select a teacher</option>
      <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id">
        {{ teacher.nome }}
      </option>
    </select>
  </div>
  <div>
    <label for="studentId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alunos</label>
    <select v-model="form.studentId" id="studentId" class="form-select">
      <option value="" disabled>Select a student</option>
      <option v-for="student in students" :key="student.id" :value="student.id">
        {{ student.nome }}
      </option>
    </select>
  </div>
  <div>
    <label for="materia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matérias</label>
    <select v-model="form.materia" id="materia" class="form-select">
      <option value="matematica">Matemática</option>
      <option value="portugues">Português</option>
      <option value="fisica">Física</option>
      <option value="quimica">Química</option>
      <option value="historia">História</option>
      <option value="geografia">Geografia</option>
    </select>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
</form>


    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Sidebar from '../Layout/Sidebar.vue';
import {Head, Link, useForm} from "@inertiajs/vue3"

export default {
  components: {
    Sidebar
  },

  props: {
    teachers: {
      type: Array,
      required: true,
    },
    students: {
      type: Array,
      required: true,
    },
  },

  setup() {
    const form = useForm({
      teacherId: '',
      studentId: '',
      materia: '',
    });

    function storeClass(){
        form.post("/class/create");
    }

    return {
      form,
      storeClass
    };
  },

  
}
</script>
