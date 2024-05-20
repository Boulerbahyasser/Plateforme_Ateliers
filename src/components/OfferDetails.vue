<template>
  <UtilisateurParent />
  <div class="offer-details-container">
    <div class="offer-card" v-if="offer">
      <div class="offer-image">
        <img src="@/assets/child.png" alt="Offer Image">
      </div>
      <div class="offer-info">
        <div class="text-content">
          <h1>{{ offer.titre }}</h1>
          <p class="offer-description">{{ offer.description }}</p>
          <div class="date-info">
            <p><strong>Début:</strong> {{ offer.date_debut }}</p>
            <p><strong>Fin:</strong> {{ offer.date_fin }}</p>
          </div>
          <div class="remise-container">
            <p class="remise-label">La remise est :</p>
            <span v-if="offer.remise > 0" class="offer-price">{{ offer.remise }}%</span>
            <span v-else class="no-remise">Pas de remise pour cette offre</span>
          </div>
        </div>
        <div class="button-container">
          <button @click="GoToActivities">Choisir les Activités</button>
        </div>
      </div>
    </div>
    <div v-else-if="loading" class="loading-message">Chargement des détails de l'offre...</div>
    <div v-else class="error-message">Erreur lors de la récupération des détails de l'offre. Veuillez réessayer plus tard.</div>
  </div>
</template>
<script>
import axios from 'axios';
import UtilisateurParent from "@/components/UtilisateurParent.vue";

export default {
  components: {
    UtilisateurParent,
  },
  data() {
    return {
      offer: null,
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchOfferDetails();
  },
  methods: {
    async fetchOfferDetails() {
      const offerid = this.$route.params.id; // Récupérer l'ID de l'offre depuis les paramètres de route
      try {
        const response = await axios.get(`http://localhost:8000/api/show/offer/${offerid}`);
        this.offer = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des détails de l\'offre:', error);
        this.loading = false;
        this.error = true;
      }
    },
    GoToActivities() {
      this.$router.push({ name: 'activitylist', params: { offerId: this.offer.id } , query:{ offerTitre :this.offer.titre} });
    }
  }
};
</script>
<style scoped>
.offer-details-container {
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
  margin-bottom: 0.5rem;
}

.offer-card {
  width: 1000px;
  display: flex;
  background: #fff;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  border-radius: 10px;
  overflow: hidden;
  transition: transform 0.3s ease;
  align-items: flex-start;
  margin-bottom: 20px;
}

.offer-card:hover {
  transform: translateY(-5px);
}

.offer-image img {
  width: 100%;
  height: 455px;
  object-fit: cover ;

}

.offer-info {
  display: flex;
  flex-direction: column;
  padding: 20px;
  width: 100%;
}

.text-content {
  width: 100%;
  margin-bottom: 20px;
}

.offer-description, .date-info {
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 10px;
  text-align: left;
}

.date-info {
  font-style: italic;
  color: #333;
}

.date-info p {
  font-style: italic;
  color: #333;
}

.remise-container {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.remise-label {
  margin: 0;
  font-size: 1.2rem;
  color: #100505;
}

.offer-price {
  font-size: 2rem;
  color: #e74c3c;
  font-weight: bold;
}

.no-remise {
  font-size: 1.2rem;
  color: #333;
  font-style: italic;
}

.button-container {
  align-self: flex-end;
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
  gap: 10px;
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
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

button:active {
  background-color: #012a56;
}

.loading-message {
  text-align: center;
  font-size: 1.5rem;
  color: #333;
  margin-top: 20px;
}

.error-message {
  color: red;
  text-align: center;
  font-size: 1.5rem;
  margin-top: 20px;
}
</style>
