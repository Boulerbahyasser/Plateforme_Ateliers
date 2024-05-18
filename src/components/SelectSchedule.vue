<template>
  <div class="select-schedule-container">
    <h1>Sélectionnez deux horaires pour l'enfant: {{ childName }}</h1>
    <div v-for="schedule in schedules" :key="schedule.id" class="schedule-card">
      <label :for="`schedule-${schedule.id}`" class="schedule-label">
        <input type="checkbox" :id="`schedule-${schedule.id}`" v-model="selectedSchedules" :value="schedule.id" />
        <span class="schedule-time">{{ schedule.time }}</span>
      </label>
    </div>
    <button @click="submitSchedules">Terminer</button>
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: 'SelectSchedule',
  data() {
    return {
      childName: this.$route.query.chilrendname || 'Enfant',
      activityId :this.$route.query.activityid || 'activity',
      schedules: [
      ],
      selectedSchedules: []
    };
  },
  methods: {
    submitSchedules() {
      if (this.selectedSchedules.length !== 2) {
        alert('Veuillez sélectionner exactement deux horaires.');
        return;
      }
       try {
        const response = axios.get(`http://localhost:8000/api/show/offer/activity/horaires/${this.activityId}`);
        this.children = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des enfants:', error);
        this.loading = false;
        this.error = true;
      }
      this.$router.push('/choosechildren');
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
}

.schedule-card:hover {
  transform: translateY(-5px);
}

.schedule-label {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.schedule-time {
  font-weight: bold;
  color: #333;
}

input[type="checkbox"] {
  transform: scale(1.5);
  margin-right: 20px;
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
</style>
