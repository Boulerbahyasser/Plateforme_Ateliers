<template>
  <div class="parent-requests">
    <h1>Mes Demandes</h1>
    <div v-if="loading">Chargement des demandes...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des demandes. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="request in demande" :key="request.id" class="request-item">
        <div class="request-details">
          <h2>{{ request.offer_name }}</h2>
          <p><strong>Date de création :</strong> {{ new Date(request.date).toLocaleDateString() }}</p>
        </div>
        <div class="action-buttons">
          <button @click="viewRequest(request.id)">Voir Détails</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axios';

export default {
  name: 'ParentRequests',
  data() {
    return {
      demande: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchRequests();
  },
  methods: {
    async fetchRequests() {
      try {
        const response = await axios.get('http://localhost:8000/api/show/demandes/parent/');
        this.demande = response.data;
        this.loading = false;

      } catch (error) {
        console.error('Erreur lors de la récupération des demandes:', error);
        this.loading = false;
        this.error = true;
      }
    },
    viewRequest(requestId) {
      this.$router.push({ name: 'demandeactivity', params: { id: requestId } });
    }
  }
};
</script>

<style scoped>
.parent-requests {
  max-width: 800px;
  margin: 40px auto;
  padding: 25px;
  background-color: #f0f4f8;
  border-radius: 10px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  text-align: center;
}

h1 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #34495e;
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.request-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.request-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.request-details {
  text-align: left;
}

.request-details h2 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #2c3e50;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.request-details p {
  font-size: 1.2rem;
  color: #7f8c8d;
  margin: 5px 0;
}

.action-buttons {
  display: flex;
  align-items: center;
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

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
