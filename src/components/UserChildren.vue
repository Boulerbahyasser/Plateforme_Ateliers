<template>
  <div class="user-children-container">
    <h1>Mes Enfants</h1>
    <div v-if="loading" class="loader">Chargement des enfants...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des enfants. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="child in children" :key="child.id" class="child-card">
        <div class="child-photo">
          <img :src="child.photo || '@/assets/default-child.png'" alt="Photo de l'enfant">
        </div>
        <div class="child-details">
          <h3>{{ child.nom }} {{ child.prenom }}</h3>
          <p><strong>Date de naissance :</strong> {{ child.date_naissance }}</p>
          <p><strong>Niveau :</strong> {{ child.niveau }}</p>
        </div>
        <div class="action-buttons">
          <button @click="goToChildPlanning(child.id)">Planification</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axios';

export default {
  name: 'UserChildren',
  data() {
    return {
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

        const response = await axios.get('http://localhost:8000/api/show/parent/enfant/');
        this.children = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des enfants:', error);
        this.loading = false;
        this.error = true;


      }
    },

    goToChildPlanning(childId) {
      this.$router.push({ name: 'childplanning', params: { id: childId } });
    }
  }
};
</script>

<style scoped>
.user-children-container {
  padding: 20px;
  text-align: center;
  background: #f5f7fa;
  color: #333;
}

h1 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #34495e;
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.loader {
  font-size: 1.5rem;
  color: #3498db;
}

.error-message {
  color: red;
  font-size: 1.2rem;
}

.child-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  padding: 20px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.child-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.child-photo img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
}

.child-details {
  text-align: left;
  flex: 1;
  padding-left: 20px;
}

.child-details h3 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #2c3e50;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.child-details p {
  font-size: 1.2rem;
  color: #7f8c8d;
  margin: 5px 0;
}

.action-buttons {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.3s, box-shadow 0.3s;
  background-color: #3498db;
  color: white;
}

button:hover {
  background-color: #2980b9;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

button:active {
  background-color: #1e5d8b;
}
</style>