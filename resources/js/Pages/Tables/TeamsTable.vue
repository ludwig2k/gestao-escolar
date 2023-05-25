


<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="data-table" ref="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3">
        Turma
      </th>
      <th scope="col" class="px-6 py-3">
        Matéria
      </th>
      <th scope="col" class="px-6 py-3">
        Quantidade de Alunos
      </th>
      <th scope="col" class="px-6 py-3">
        Visualizar
      </th>
      <th scope="col" class="px-6 py-3">
        Editar
      </th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="team in teams" :key="team.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
      <td class="px-6 py-4">
        Turma {{ team.id }}
      </td>
      <td class="px-6 py-4">
        {{ team.materia }}
      </td>
      <td class="px-6 py-4">
        {{ team.students.length }}
      </td>
      <td class="px-6 py-4">
        <button @click="viewTeam(team.id)" class="text-blue-600 dark:text-blue-500 hover:underline">Visualizar</button>
      </td>
      <td class="px-6 py-4">
        <button @click="openModal(team.id)" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>


      </td>
    </tr>
  </tbody>
</table>
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center" v-show="showModal">
  <div class="relative w-full max-w-md">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="px-6 py-6 lg:px-8">
        <button type="button" @click="closeModal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Student to Team {{ selectedTeamId }}</h3>
        <!-- Modal content -->
        <form class="space-y-6" @submit.prevent="addStudentToTeam(selectedTeamId)">
          <div>
            <label for="studentId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alunos</label>
            <select v-model="form.studentId" id="studentId" class="form-select">
              <option value="" disabled>Select a student</option>
              <option v-for="student in students" :key="student.id" :value="student.id">{{ student.nome }}</option>
            </select>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



</div>



    </div>
  </div>
</template>

<script>
import Sidebar from '../Layout/Sidebar.vue';
import $ from 'jquery';
import 'datatables.net';

export default {
  components: {
    Sidebar
  },
  props: ['teams', 'students'],
  data() {
    return {
      showModal: false,
      selectedTeamId: null,
      form: {
        studentId: null // Initialize the studentId property
      }
    };
  },
  mounted() {
    this.initializeDataTable();
  },
  methods: {
    initializeDataTable() {
      const tableElement = this.$refs.dataTable;
      $(tableElement).DataTable();
    },
    viewTeam(teamId) {
      this.$inertia.visit(`/team/${teamId}`);
    },
    openModal(teamId) {
    this.selectedTeamId = teamId;
    this.showModal = true;
  },
  closeModal() {
      this.selectedTeamId = null;
      this.showModal = false;
    },
    
    addStudentToTeam(teamId) {
  const { studentId } = this.form;

  // Make an AJAX request to add the student to the team
  this.$inertia.post(route('team.students.add', { teamId }), {
    studentId: studentId,
  });
},
  },
  
};
</script>


