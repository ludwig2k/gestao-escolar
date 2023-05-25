<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="data-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    CPF
                </th>
                <th scope="col" class="px-6 py-3">
                    PCD
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de Nascimento
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="student in students" :key="student.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <td class="px-6 py-4">
            {{ student.nome }}
        </td>
        <td class="px-6 py-4">
            {{ student.email }}
        </td>
        <td class="px-6 py-4">
            {{ student.cpf }}
        </td>
        <td class="px-6 py-4">
            {{ student.pcd }}
        </td>
        <td class="px-6 py-4">
            {{ student.data_nascimento }}
        </td>
    </tr>         
        </tbody>
    </table>
</div>



    </div>
  </div>
</template>

<script>
import Sidebar from '../Layout/Sidebar.vue';
import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
    Sidebar
  },
         props: ['students'],
    mounted() {
        this.initializeDataTable();
    },
    methods: {
        initializeDataTable() {
            // Use this.students to populate the DataTable
        },
    },
};
</script>
