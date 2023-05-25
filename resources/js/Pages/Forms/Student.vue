<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<form @submit.prevent="form.post(route('student'))">
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
        <label for="data_nascimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de nascimento*</label>
        <input v-model="form.data_nascimento" type="date" name="data_nascimento" id="data_nascimento"  @change="calculateAge" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div> 
        <div>
            <label for="idade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idade*</label>
            <input v-model="form.idade" type="number" name="idade" id="idade"  placeholder="00"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div>
            <label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP*</label>
            <input v-model="form.cep" type="text" name="cep" v-mask="'########'" id="cep"  @input="fetchCityAndState" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00000000"  required>
        </div>
        <div>
            <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade*</label>
            <input v-model="form.cidade" type="text" name="cidade" id="cidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div>
            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado*</label>
            <input v-model="form.estado" type="text" name="estado" id="estado"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
        </div>
        <div>
            <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço*</label>
            <input v-model="form.endereco" type="text" name="endereco" id="endereco" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rua exemplo 123" required>
        </div>
        <div>           
        <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo*</label>
        <select v-model="form.sexo" id="sexo" name="sexo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option selected>Escolha um</option>
            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
        </select>
        </div>
        
    <div>
            <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF*</label>
            <input v-model="form.cpf" type="text" name="cpf" v-mask="'###.###.###.##'" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="000.000.000.00"  required>
        </div>
    <div>           
        <label for="pcd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Possui deficiência</label>
        <select v-model="form.pcd" id="pcd" name="pcd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="">Nenhuma</option>
            <option value="auditiva">Deficiência Auditiva</option>
            <option value="fisica">Deficiência Física</option>
            <option value="mental_intelectual">Deficiência Mental/Intelectual</option>
            <option value="multipla">Deficiência Múltipla</option>
        </select>
        </div>
        <div>
        <label for="responsavel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsável*</label>
        <input v-model="form.responsavel" type="text" name="responsavel" id="responsavel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nome completo do responsável" required>
    </div> 
    <div>
        <label for="contato_responsavel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contato do responsável*</label>
        <input v-model="form.contato_responsavel" type="text" name="contato_responsavel" v-mask="'(##) #####-####'" id="contato_responsavel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(00) 00000-0000" required>
    </div> 
    <div>
        <label for="nota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nota</label>
        <input  v-model="form.nota" type="text" name="nota" id="nota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div> 
    <div>
        <label for="frequencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequencia</label>
        <input v-model="form.frequencia" type="text" name="frequencia" id="frequencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div> 
    </div>
   <div class="mb-6"> 
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="foto" name="foto" type="file">
   </div>
    <button v-if="permissions.posts_manage" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
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
    permissions: Object,
  },

  setup(){
    const form = useForm({
      nome: '',
      email: '',
      senha: '',
      idade: '',
      data_nascimento: '',
      sexo: '',
      pcd: '',
      cpf: '',
      responsavel: '',
      contato_responsavel: '',
      cep: '',
      cidade: '',
      estado: '',
      endereco: '',
      nota: '',
      frequencia: '',
    })

    return {form}
  },
  data() {
    return {
      cep: '',
      city: '',
      state: '',
      birthDate: '',
      age: null,
    };
  },
  methods: {
    async fetchCityAndState() {
  try {
    const response = await axios.get(`https://viacep.com.br/ws/${this.cep}/json/`);
    this.city = response.data.localidade;
    this.state = response.data.uf;
  } catch (error) {
    console.error(error);
  }
},

    calculateAge() {
      const today = new Date();
      const birthDate = new Date(this.birthDate);
      const diffInMilliseconds = today - birthDate;
      const ageDate = new Date(diffInMilliseconds);
      this.age = Math.abs(ageDate.getUTCFullYear() - 1970);
    },
  },
}
</script>
