<template>
  <div class="offers-list">
    <h3>Toutes les Offres</h3>
    <div v-if="loading">Chargement des offres...</div>
    <div v-else>
      <div v-if="error" class="error-message">
        <p>Une erreur s'est produite lors du chargement des offres : {{ error }}</p>
        <button @click="fetchOffers">Réessayer</button>
      </div>
      <div v-else class="offers-grid">
        <div class="offer" v-for="offer in offers" :key="offer.id">
          <img :src="offer.imageUrl" alt="Offer Image" class="offer-image">
          <div class="offer-details">
            <div>
              <h4>{{ offer.titre }}</h4>
              <p>{{ offer.description }}</p>
            </div>
            <router-link :to="{ name: 'offerdetails', params: { id: offer.id }}" class="details-btn">
              Voir Détails
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from 'axios';

export default {
  name: 'OffersList',
  data() {
    return {
      offers: [],
      loading: true,
      error: null  // Ajout de la propriété error
    }
  },
  created() {
    this.fetchOffers();
  },
  methods: {
    fetchOffers() {
      this.loading = true;
      this.error = null;  // Réinitialiser l'erreur
      axios.get('http://localhost:8000/api/show/offers')
        .then(response => {
          this.offers = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('There was an error fetching the offers:', error);
          this.error = 'Impossible de charger les offres. Veuillez réessayer plus tard.';
          this.loading = false;
        });
    }
  }
}
</script>

<style scoped>
.offers-list {
  background: #f0f8ff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
}

h3 {
  color: #010f1e;
  font-family: 'Baloo Bhaijaan 2', cursive;
  font-size: 2rem;
  padding-bottom: 10px;
  border-bottom: 5px dotted #011934;
  margin-bottom: 30px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
  text-transform: uppercase;
  text-align: center;
  background-image: linear-gradient(to right, #026968, #00060c 50%, #061533);
  -webkit-background-clip: text;
  color: transparent;
}

.offers-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 20px;
}

.offer {
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.offer:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.offer-image {
  width: 100%;
  height: auto;
  border-radius: 10px;
  margin-bottom: 15px;
  object-fit: cover;
}

.offer-details {
  text-align: center;
}

.offer-details h4 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  font-family: 'Baloo Bhaijaan 2', cursive;
}

.offer-details p {
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 20px;
  font-family: 'Baloo Bhaijaan 2', cursive;
}

.details-btn {
  padding: 10px 15px;
  background-color: #026968;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  transition: background-color 0.3s;
}

.details-btn:hover {
  background-color: #024949;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>

