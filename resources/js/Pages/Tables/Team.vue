<template>
  <div class="grid grid-cols-4 mt-16">
    <div class="col-span-1">
      <sidebar></sidebar>
    </div>
    <div class="col-span-2 pt-15">
      
<div>
    <h1>{{ team.materia }}</h1>
    <div class="class-container">
      <div v-for="(student, index) in team.students" :key="student.id" :class="getClassStyles(student, index)">
        <div class="student-name">{{ student.nome }}</div>
      </div>
    </div>
  </div>
</div>



    </div>

</template>

<script>
import Sidebar from '../Layout/Sidebar.vue';

export default {
    components: {
    Sidebar
  },
  props: ['team'],
  computed: {
    loggedInStudentId() {
      // Replace this with the logic to get the ID of the logged-in student
      return 1;
    },
  },
  methods: {
    getClassStyles(student, index) {
      const classStyles = {
        'class-cell': true,
        'blue-border': student.id === this.team.teacher.id,
        'red-border': student.pcd,
        'green-border': student.id === this.loggedInStudentId,
      };

      if (index === 0) {
        classStyles['first-position'] = true;
      }

      return classStyles;
    },
  },
    
};
</script>
<style scoped>
.class-container {
  display: flex;
  justify-content: center;
}

.class-cell {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  border: 1px solid black;
  margin: 5px;
}

.blue-border {
  border-color: blue;
}

.red-border {
  border-color: red;
}

.green-border {
  border-color: green;
}

.first-position {
  order: -1;
}

.student-name {
  margin-top: 10px;
}
</style>