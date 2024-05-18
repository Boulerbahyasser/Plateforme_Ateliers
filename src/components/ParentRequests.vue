<template>
  <div class="parent-requests">
    <h1>Mes Demandes</h1>
    <div v-if="loading">Chargement des demandes...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des demandes. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="request in demande" :key="request.id" class="request-item">
        <p>{{ request.date }}</p>
        <button @click="viewRequest(request.id)">Voir Détails</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

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
        const response = await axios.get('http://localhost:8000/api/show/demandes');
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
  max-width: 600px;
  margin: 40px auto;
  padding: 25px;
  background-color: #f8f9fa;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.request-item {
  margin-bottom: 15px;
  padding: 15px;
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #3498db;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #2980b9;
}

button:active {
  background-color: #2575b5;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
