<template>
  <div class="activity-list-container">
    <h1>Activités Disponibles</h1>
    <div v-if="loading">Chargement des activités...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des activités. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="activity in activities" :key="activity.id" class="activity-item">
        <img :src="activity.imageUrl" alt="Image de l'activité" class="activity-image">
        <div class="activity-details">
          <h3>{{ activity.titre }}</h3>
          <p>{{ activity.description }}</p>
          <p><strong>Objectifs :</strong> {{ activity.objectifs }}</p>
          <p><strong>Domaine :</strong> {{ activity.domaine }}</p>
        </div>
        <div class="action-buttons">
          <button @click="goToActivityDetails(activity)">Choisir les enfants</button>
        </div>
      </div>
    </div>
    <button @click="makeRequest">Faire une demande</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ActivityList',
  data() {
    return {
      activities: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchActivities();
  },
  methods: {
    async fetchActivities() {
      const offerId = this.$route.params.offerId;
      try {
        const response = await axios.get(`http://localhost:8000/api/show/offer/activities/${offerId}`);
        this.activities = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des activités:', error);
        this.loading = false;
        this.error = true;
      }
    },
    goToActivityDetails(activity) {
      this.$router.push({
        name: 'choosechildren',
        query: {
          activityId: activity.id,
          activityName: activity.titre
        }
      });
    },
    makeRequest() {
      console.log('Faire une demande');
    }
  }
};
</script>

<style scoped>
/* Votre CSS ici */
.activity-list-container {
  padding: 20px;
  text-align: center;
  background-image: linear-gradient(to top right, #02143b, #625dea);
  color: #ffffff;
}

h1 {
  font-family: 'Bangers', cursive;
  color: #e1d9da;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.activity-item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  border: 3px solid #020100;
  padding: 20px;
  border-radius: 15px;
  background-color: #ffffff;
  color: #333;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}

.activity-item:hover {
  transform: scale(1.027);
}

.activity-image {
  width: 150px;
  height: 150px;
  margin-right: 20px;
  border-radius: 10px;
}

.activity-details h3 {
  margin: 0;
  font-family: 'Bangers', cursive;
  color: #d0772f;
  font-size: 1.8rem;
}

.activity-details p {
  font-size: 1.2rem;
  color: #555;
}

.action-buttons {
  margin-left: auto;
  display: flex;
  align-items: center;
}

button {
  padding: 10px 20px;
  background-color: #3498db;
  color: white;
  border-radius: 8px;
  font-size: 1.1rem;
  margin-left: 10px;
}

button:hover {
  background-color: #01389e;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
