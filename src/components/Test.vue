<template>
  <div class="select-schedule-container">
    <h1>Sélectionnez deux horaires pour l'enfant: {{ childName }}</h1>
    <div v-if="loading">Chargement des horaires...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des horaires. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="(schedule,index) in schedules" :key="schedule.id" class="schedule-card">
        <label :for="`schedule-${schedule.id}`" class="schedule-label">
          <input type="checkbox" :id="`schedule-${schedule.id}`" v-model="selectedSchedules[index]" :value="schedule.id" />
           <div class="schedule-details">
            <span class="schedule-day">{{ schedule.jour }}</span>
            <span class="schedule-time">{{ schedule.heure_debut }} - {{ schedule.heure_fin }}</span>
            <div class="schedule-info">
              <span><strong>Eff. Min:</strong> {{ schedule.eff_min }}</span>
              <span><strong>Eff. Max:</strong> {{ schedule.eff_max }}</span>
              <span><strong>Places Restantes:</strong> {{ schedule.nbr_place_restant }}</span>
            </div>
           </div>
        </label>
      </div>
    </div>
    <button @click="submitSchedules" class="submit-btn">Terminer</button>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: 'SelectSchedule',
  data() {
    return {
      activityId: this.$route.params.activityId,
      activityTitre: this.$route.query.activityTitre,
      offerId: this.$route.query.offerId,
      offerTitre: this.$route.query.offerTitre,
      childName: this.$route.query.childName,
      childId: this.$route.query.childId,
      schedules: [],
      selectedSchedules: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchSchedules();
  },
  methods: {
    async fetchSchedules() {
      try {
        const response = await axios.get(`http://localhost:8000/api/show/offer/activity/horaires/${this.activityId}`);
        this.schedules = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des horaires:', error);
        this.loading = false;
        this.error = true;
      }
    },
    submitSchedules() {
      if (this.selectedSchedules.length !== 2) {
        alert('Veuillez sélectionner exactement deux horaires.');
        return;
      }

      const selectedActivity = {
        offerId: this.offerId,
        offerTitre: this.offerTitre,
        activityId: this.activityId,
        activityTitre: this.activityTitre,
        childId: this.childId,
        childName: this.childName,
        schedule1: this.selectedSchedules[0].jour,
        schedule2: this.selectedSchedules[1].jour
      };

      // Stocker l'activité sélectionnée dans le localStorage
      let activities = JSON.parse(localStorage.getItem('selectedActivities')) || [];
      activities.push(selectedActivity);
      localStorage.setItem('selectedActivities', JSON.stringify(activities));

      this.$router.push({
        name: 'choosechildren',
        query: {
          activityId: this.activityId,
          activityTitre: this.activityTitre,
          offerId: this.offerId,
          offerTitre: this.offerTitre,
        }
      });
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

.select-schedule-container {
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
  text-align: center;
}

.schedule-card {
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

.schedule-card:hover {
  transform: translateY(-5px);
}

.schedule-label {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.schedule-details {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.schedule-day {
  font-size: 1.2rem;
  color: #007BFF;
  margin-bottom: 10px;
}

.schedule-time {
  font-size: 1.1rem;
  color: #333;
  margin-bottom: 10px;
}

.schedule-info {
  display: flex;
  justify-content: space-between;
  font-size: 1rem;
  color: #555;
}

input[type="checkbox"] {
  transform: scale(1.5);
  margin-right: 20px;
}

.submit-btn {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-weight: 500;
  margin-top: 20px;
}

.submit-btn:hover {
  background-color: #0056b3;
  box-shadow: 5px 5px 10px rgba(0,0,0,0.25);
}

.submit-btn:active {
  background-color: #012a56;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>

