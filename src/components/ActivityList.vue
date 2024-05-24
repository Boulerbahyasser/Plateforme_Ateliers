<template>
  <div class="activity-list-container">
    <h1>Activités Disponibles</h1>
    <div v-if="loading" class="loader">Chargement des activités...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des activités. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="activity in activities" :key="activity.id" class="activity-item">
<img :src="`http://localhost:8000/storage/${activity.image_pub || '@/assets/child.png'}`" alt="Image de l'activité" class="activity-image">
        <div class="activity-details">
          <h3>{{ activity.titre }}</h3>
          <p>{{ activity.description }}</p>
          <p><strong>objectifs :</strong> {{ activity.objectifs }}</p>
          <p><strong>Domaine :</strong> {{ activity.domaine }}</p>
          <p><strong>Tarif :</strong> {{ activity.tarif }} €</p>
          <button @click="toggleDetails(activity.id)" class="show-more-btn">Show More</button>
          <div v-if="activity.showDetails" class="additional-details">
            <p><strong>Âge Minimum :</strong> {{ activity.age_min }}</p>
            <p><strong>Âge Maximum :</strong> {{ activity.age_max }}</p>
            <p><strong>Nombre de Séances :</strong> {{ activity.nbr_seance }}</p>
            <p><strong>Volume Horaire :</strong> {{ activity.volume_horaire }} heures</p>
            <p><strong>Option de Paiement :</strong> {{ activity.option_paiement }}</p>
            <p><strong>Vidéo :</strong> <a :href="activity.lien_youtube" target="_blank">Voir la vidéo</a></p>
          </div>
        </div>
        <div class="action-buttons">
          <button @click="goToActivityDetails(activity)" class="choose-btn">Choisir les enfants</button>
        </div>
      </div>
    </div>
    <button @click="makeRequest" class="request-btn">Envoyer la demande</button>
  </div>
</template>
<script>
import axios from '@/axios';

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
      const offerTitre = this.$route.query.offerTitre ;
      try {
        alert(offerTitre) ;
        const response = await axios.get(`http://localhost:8000/api/show/offer/activities/all/${offerId}`);
        this.activities = response.data.map(activity => ({ ...activity, showDetails: false }));
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des activités:', error);
        this.loading = false;
        this.error = true;
      }
    },
    toggleDetails(activityId) {
      const activity = this.activities.find(act => act.id === activityId);
      if (activity) {
        activity.showDetails = !activity.showDetails;
      }
    },
    goToActivityDetails(activity) {
      this.$router.push({
        name: 'choosechildren',
        query: {
          activityId: activity.id,
          activityTitre: activity.titre,
          offerId: this.$route.params.offerId,
          offerTitre :  this.$route.query.offerTitre
        }
      });
    },
    makeRequest() {
      this.$router.push('/submitrequest')
    }
  }
};
</script>
<style scoped>
.activity-list-container {
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

.activity-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
  padding: 20px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.activity-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.activity-image {
  width: 150px;
  height: 150px;
  margin-bottom: 20px;
  border-radius: 10px;
  object-fit: cover;
}

.activity-details {
  text-align: left;
  width: 100%;
  padding: 10px;
}

.activity-details h3 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #2c3e50;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.activity-details p {
  font-size: 1.2rem;
  color: #7f8c8d;
  margin: 5px 0;
}

.additional-details {
  margin-top: 10px;
  background: #ecf0f1;
  padding: 10px;
  border-radius: 10px;
}

.action-buttons {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin: 5px;
  font-size: 1rem;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.show-more-btn {
  background-color: #3498db;
  color: white;
}

.show-more-btn:hover {
  background-color: #2980b9;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.choose-btn {
  background-color: #e74c3c;
  color: white;
}

.choose-btn:hover {
  background-color: #c0392b;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.request-btn {
  background-color: #2ecc71;
  color: white;
}

.request-btn:hover {
  background-color: #27ae60;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
</style>
