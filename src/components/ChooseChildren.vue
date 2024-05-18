<template>
  <div class="choose-children-container">
    <h1>Choisissez les enfants pour l'activité: {{ activityName }}</h1>
    <div v-if="loading">Chargement des enfants...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des enfants. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="child in children" :key="child.id" class="child-card" @click="selectChild()">
        <label :for="`child-${child.id}`" class="child-label">
          <span class="child-name">{{ child.name }}</span>
          <span class="child-level">Niveau: {{ child.level }}</span>
        </label>
      </div>
    </div>
    <button @click="submitChildren">Terminer</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ChooseChildren',
  data() {
    return {
      activityId: this.$route.query.activityId || 'Activiter',
      activityName: this.$route.query.activityName || 'Activiter',
      children: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchChildren();
  },
  methods: {
    async fetchChildren() {
      try {
        const response = await axios.get(`http://localhost:8000/api/parent/children`);
        this.children = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des enfants:', error);
        this.loading = false;
        this.error = true;
      }
    },
    selectChild() {
      this.$router.push({ path: '/selectschedule',  query: { activityid :this.activityId , chilrendname :this.children.name} });
    },
    submitChildren() {
      console.log('Enfants sélectionnés:', this.children);
      this.$router.push(`/activitylist/${this.activityId}` );
    }
  }
};
</script>

<style scoped>
/* Votre CSS ici */
.choose-children-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 40px;
  background-color: #f0f0f0;
}

h1 {
  font-size: 2.5rem;
  font-weight: bold;
  color: #0056b3;
  margin-bottom: 20px;
}

.child-card {
  width: 800px;
  display: flex;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  transition: transform 0.3s ease;
  align-items: center;
  cursor: pointer;
}

.child-card:hover {
  transform: translateY(-5px);
}

.child-label {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.child-name {
  font-weight: bold;
  color: #333;
}

.child-level {
  font-style: italic;
  color: #666;
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-weight: 500;
}

button:hover {
  background-color: #0056b3;
  box-shadow: 5px 5px 10px rgba(0,0,0,0.25);
}

button:active {
  background-color: #012a56;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
