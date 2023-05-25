<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<form @submit.prevent="storeClass">
  <div>
  <label for="select">Professores</label>
   <select v-model="form.teacherId">
      <option value="" disabled>Select a teacher</option>
      <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id">
        {{ teacher.nome }}
      </option>
    </select>
  </div>
  <div>
  <label for="select">Alunos</label>
   <select v-model="form.studentId">
      <option value="" disabled>Select a teacher</option>
      <option v-for="student in students" :key="student.id" :value="student.id">
        {{ student.nome }}
      </option>
    </select>
  </div>
   <div>
    
<label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materias</label>
<select v-model="form.materia" id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  <option value="matematica">Matemática</option>
  <option value="portugues">Português</option>
  <option value="fisica">Física</option>
  <option value="quimica">Química</option>
  <option value="historia">História</option>
  <option value="geografia">Geografia</option>
</select>
 <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
</div>
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
