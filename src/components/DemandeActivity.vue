<template>
  <div class="demande-activity">
    <h1>Détails de la Demande</h1>
    <p><strong>Description:</strong> {{ request.description }}</p>
    <p><strong>Date de soumission:</strong> {{ request.submission_date }}</p>
    <!-- Ajoutez d'autres détails pertinents ici -->
    <router-link to="/parentrequests">Retour aux demandes</router-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DemandeActivity',
  data() {
    return {
      request: {}
    };
  },
  created() {
    this.fetchRequestDetails();
  },
  methods: {
    fetchRequestDetails() {
      const requestId = this.$route.params.id;
      axios.get(`http://localhost:8000/api/parent/requests/${requestId}`, {
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('auth_token')}`
        }
      })
      .then(response => {
        this.request = response.data;
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des détails de la demande:', error);
      });
    }
  }
};
</script>

<style scoped>
.demande-activity {
  max-width: 600px;
  margin: 40px auto;
  padding: 25px;
  background-color: #f8f9fa;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
