<template>
  <div class="child-planning">
    <h1>Planification de l'enfant</h1>
    <div v-if="loading" class="loader">Chargement de la planification...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération de la planification. Veuillez réessayer plus tard.</div>
    <div v-else class="calendar">
      <div class="week">
        <div v-for="day in planning" :key="day.jour" class="day">
          <h2>{{ day.jour }}</h2>
          <div class="activity">
            <p><strong>{{ day.titre }}</strong></p>
            <p>{{ day.heure_debut }} - {{ day.heure_fin }}</p>
            <p>Animé par: {{ day.name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name: 'ChildPlanning',
  data() {
    return {
      planning: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchPlanning();
  },
  methods: {
    async fetchPlanning() {
      const enfantId = this.$route.params.id;
      try {
        const response = await axios.get(`http://localhost:8000/api/show/enfant/planning/${enfantId}`);
        alert(enfantId) ;
        this.planning = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération de la planification:', error);
        this.loading = false;
        this.error = true;
      }
    }
  }
};
</script>
<style scoped>
.child-planning {
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

.calendar {
  display: flex;
  flex-direction: column;
}

.week {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap; /* Pour permettre aux jours de s'afficher sur plusieurs lignes si nécessaire */
  margin-top: 20px;
}

.day {
  background: #fff;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  flex: 1;
  margin: 10px; /* Ajout d'une marge pour un espacement plus uniforme */
  min-width: 200px; /* Largeur minimale pour éviter que les jours soient trop petits */
}

.day h2 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #2c3e50;
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.activity {
  background: #eaf1f8;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
  transition: background-color 0.3s;
}

.activity p {
  margin: 5px 0;
}

.activity strong {
  color: #3498db;
}

.activity:hover {
  background-color: #d0e4f7;
}
</style>
