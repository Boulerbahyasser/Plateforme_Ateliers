<template>
  <div class="offers-list">
    <h3>Toutes les Offres</h3>
    <div class="search-bar">
      <input type="text" v-model="searchQuery" placeholder="Rechercher des offres..." @input="searchOffers" />
    </div>
    <div v-if="loading" class="loader">Chargement des offres...</div>
    <div v-else>
      <div v-if="error" class="error-message">
        <p>Une erreur s'est produite lors du chargement des offres : {{ error }}</p>
        <button @click="fetchOffers">Réessayer</button>
      </div>
      <div v-else class="offers-grid">
        <div class="offer" v-for="offer in filteredOffers" :key="offer.id">
          <img src="@/assets/child.png" alt="Offer Image" class="offer-image">
          <div class="offer-details">
            <h4>{{ offer.titre }}</h4>
            <p>{{ offer.description.slice(0, 100) }}...</p>
            <router-link :to="{ name: 'offerdetails', params: { id: offer.id }}" class="details-btn">
              Voir Détails
            </router-link>
          </div>
        </div>
      </div>
      <div class="pagination">
        <button @click="prevPage" :disabled="currentPage === 1">Précédent</button>
        <span>Page {{ currentPage }} sur {{ totalPages }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages">Suivant</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axios';

export default {
  name: 'OffersList',
  data() {
    return {
      offers: [],
      loading: true,
      error: null,
      searchQuery: '',
      currentPage: 1,
      itemsPerPage: 8, // Changed to display 8 offers per page
    }
  },
  computed: {
    filteredOffers() {
      const searchLower = this.searchQuery.toLowerCase();
      return this.offers.filter(offer =>
        offer.titre.toLowerCase().includes(searchLower) ||
        offer.description.toLowerCase().includes(searchLower)
      ).slice(this.startIndex, this.endIndex);
    },
    startIndex() {
      return (this.currentPage - 1) * this.itemsPerPage;
    },
    endIndex() {
      return this.currentPage * this.itemsPerPage;
    },
    totalPages() {
      return Math.ceil(this.offers.length / this.itemsPerPage);
    }
  },
  created() {
    this.fetchOffers();
  },
  methods: {
    fetchOffers() {
      this.loading = true;
      this.error = null;
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
    },
    searchOffers() {
      this.currentPage = 1;
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    }
  }
}
</script>

<style scoped>
.offers-list {
  background: #ffffff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

h3 {
  color: #333;
  font-family: 'Baloo Bhaijaan 2', cursive;
  font-size: 2rem;
  padding-bottom: 10px;
  border-bottom: 3px solid #eee;
  margin-bottom: 30px;
  text-align: center;
}

.search-bar {
  text-align: center;
  margin-bottom: 20px;
}

.search-bar input {
  width: 80%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 1rem;
}

.loader {
  text-align: center;
  font-size: 1.2rem;
  margin: 20px 0;
}

.offers-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}

.offer {
  background: #f9f9f9;
  padding: 15px;
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
  margin-bottom: 10px;
  object-fit: cover;
}

.offer-details {
  text-align: center;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  justify-content: space-between;
}

.offer-details h4 {
  font-size: 1.2rem;
  margin-bottom: 10px;
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #333;
}

.offer-details p {
  font-size: 1rem;
  color: #666;
  margin-bottom: 10px;
  font-family: 'Baloo Bhaijaan 2', cursive;
  flex-grow: 1;
}

.details-btn {
  padding: 10px 15px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  transition: background-color 0.3s;
  margin-top: 10px;
}

.details-btn:hover {
  background-color: #0056b3;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}

.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.pagination button {
  padding: 10px 20px;
  margin: 0 5px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.pagination button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

.pagination button:hover:not(:disabled) {
  background-color: #0056b3;
}
</style>
