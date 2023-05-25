<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<form @submit.prevent="storeTeacher">
    <div class="mb-6"> 
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Completo*</label>
        <input v-model="form.nome" type="text" name="nome" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="João Silva" required>    
   </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email*</label>
            <input v-model="form.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="exemplo@email.com" required>
        </div>
        <div>
            <label for="senha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha*</label>
            <input v-model="form.senha" type="password" name="senha" id="senha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
        </div>
         
       
    <div>
    
<label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materias</label>
<select v-model="form.materias" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  <option value="matematica">Matemática</option>
  <option value="portugues">Português</option>
  <option value="fisica">Física</option>
  <option value="quimica">Química</option>
  <option value="historia">História</option>
  <option value="geografia">Geografia</option>
</select>

</div>

    
    </div>
   <div class="mb-6"> 
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Curriculo*</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="curriculo" name="curriculo" type="file" @input="form.curriculo = $event.target.files[0]" required>
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

  setup() {
    const form = useForm({
      nome: '',
      email: '',
      senha: '',
      curriculo: '',
      materias: [],
    });

    function storeTeacher(){
        form.post("/teacher/create");
    }

    return {
      form,
      storeTeacher
    };
  },

  
}
</script>
