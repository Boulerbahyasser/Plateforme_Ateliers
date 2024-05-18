<template>
  <div class="offer-container" v-if="offers.length">
    <button @click="prevOffer" class="nav-btn left-btn">⬅️</button>
    <div class="text-section">
      <h1>{{ currentOffer.titre }}</h1>
      <p>{{ currentOffer.description }}</p>
      <router-link :to="{ name: 'offerdetails', params: { id: currentOffer.id }}" class="signup-btn">
        Inscrivez-vous à l'offre
      </router-link>
    </div>
    <div class="image-section">
      <img :src="currentOffer.imageUrl" alt="Offer Image" class="offer-image">
    </div>
    <button @click="nextOffer" class="nav-btn right-btn">➡️</button>
  </div>
  <div v-else class="loading-message">Chargement des offres...</div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      offers: [],
      currentIndex: 0
    };
  },
  computed: {
    currentOffer() {
      return this.offers[this.currentIndex];
    }
  },
  created() {
    this.fetchOffers();
  },
  methods: {
    fetchOffers() {
      axios.get('http://localhost:8000/api/show/offers')
        .then(response => {
          this.offers = response.data;
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des offres populaires:', error);
        });
    },
    nextOffer() {
      this.currentIndex = (this.currentIndex + 1) % this.offers.length;
    },
    prevOffer() {
      this.currentIndex = (this.currentIndex + this.offers.length - 1) % this.offers.length;
    }
  }
}
</script>


<style scoped>
.offer-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: linear-gradient(135deg, #081865 0%, #7c87bd 100%);
  height: 40vh;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out;
  position: relative;
}

.offer-container:hover {
  transform: scale(1.05);
}

.text-section {
  flex: 1;
  max-width: 40%;
  color: #eff1f3;
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 15px;
}

p {
  font-size: 1.2rem;
  margin-bottom: 20px;
}

.signup-btn {
  padding: 12px 25px;
  background-color: #efb902;
  border-radius: 10px;
  font-size: 1.1rem;
  font-weight: bold;
}

.signup-btn:hover {
  background-color: #cc9113;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.image-section {
  flex: 1;
  max-width: 30%;
  margin-right: 30px;
}

.offer-image {
  max-width: 100%;
  border-radius: 10px;
}

.nav-btn {
  border: none;
  background: transparent;
  color: #fff;
  font-size: 1.5rem;
  cursor: pointer;
  padding: 10px;
  transition: color 0.3s ease;
  position: absolute;
}

.left-btn {
  left: 20px;
}

.right-btn {
  right: 20px;
}

.nav-btn:hover {
  color: #efb902;
}

.loading-message {
  text-align: center;
  font-size: 1.5rem;
  color: #333;
}
</style>





