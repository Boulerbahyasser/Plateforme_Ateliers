<template>
  <div class="offers-list">
    <h3>Toutes les Offres</h3>
    <div v-if="loading">
      Chargement des offres...
    </div>
    <div v-else class="offer" v-for="offer in offers" :key="offer.id">
      <img :src="offer.imageUrl" alt="Offer Image" class="offer-image">
      <div class="offer-details">
        <div>
          <h4>{{ offer.title }}</h4>
          <p>{{ offer.description }}</p>
        </div>
        <router-link :to="{ name: 'offerdetails', params: { id: offer.id }}" class="details-btn">
          Voir Détails
        </router-link>
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
      loading: true  // Ajout de la propriété loading
    }
  },
  created() {
    this.fetchOffers();
  },
  methods: {
    fetchOffers() {
      this.loading = true;  // Début du chargement
      axios.get('http://localhost:3000/offers')
        .then(response => {
          this.offers = response.data;
          this.loading = false;  // Fin du chargement
        })
        .catch(error => {
          console.error('There was an error fetching the offers:', error);
          this.loading = false;  // Gérer le chargement même en cas d'erreur
        });
    }
  }
}
</script>



<style scoped>



.offers-list {
  background: #f0f8ff; /* Fond doux et clair pour un look frais */
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.1);
  margin-top: 20px; /* Ajout d'espace au-dessus de la liste */
}

.offer {
  display: flex;
  align-items: center;
  margin-bottom: 20px; /* Espace accru entre les offres */
  padding-bottom: 20px;
  border-bottom: 2px dashed #0230d0; /* Bordure pointillée pour un style plus amusant */
}

.offer:last-child {
  border-bottom: none; /* Pas de bordure au dernier élément */
}

.offer-image {
  width: 120px; /* Image légèrement plus grande pour attirer l'attention */
  height: auto;
  margin-right: 20px; /* Espacement accru */
  border-radius: 10px; /* Coins arrondis pour un style plus doux */
}

p, .offer-details h4, .offer-details p {
   font-family: 'Baloo Bhaijaan 2' , cursive;    /* Cohérence avec la police du titre */
  color: #333; /* Couleur foncée standard pour une excellente lisibilité */
  text-align: left; /* Alignement à gauche pour tout le texte */
}

.offer-details h4 {
  font-size: 1.5rem; /* Taille respectable pour les titres des offres */
  margin-bottom: 5px; /* Espace minimal pour une mise en page compacte */
}

.offer-details p {
  font-size: 1.2rem; /* Taille de police adéquate pour les descriptions */
  margin-bottom: 20px; /* Espacement pour séparer des autres contenus */
}

h3 {
  color: #010f1e; /* Couleur cohérente avec le thème */
  font-family: 'Baloo Bhaijaan 2', cursive; /* Police ludique et adaptée aux enfants */
  font-size: 2rem; /* Taille augmentée pour plus de visibilité */
  padding-bottom: 10px;
  border-bottom: 5px dotted #011934; /* Bordure pointillée pour un effet plus ludique */
  margin-bottom: 30px; /* Espacement accru pour définir clairement la section */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Ombre légère pour un effet de profondeur */
  text-transform: uppercase; /* Texte en majuscules pour plus d'impact */
  text-align: center; /* Centrage du titre pour une mise en page symétrique */
  background-image: linear-gradient(to right, #026968, #00060c 50%, #061533); /* Gradient subtil en arrière-plan du texte */
  -webkit-background-clip: text;
  color: transparent;

}

.offer-details {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Cette propriété répartit les espaces uniformément */
  width: 100%; /* Assurez-vous que le div prend toute la largeur disponible */
}

.details-btn {
  margin-left: auto; /* Pousse le bouton à l'extrême droite */
  padding: 10px 15px;
  background-color: #026968;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  text-align: center;
}

.details-btn:hover {
  background-color: #024949;
}


</style>

