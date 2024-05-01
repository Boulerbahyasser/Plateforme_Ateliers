<template>
  <div class="offers-list">
    <h3>Toutes les Offres</h3>
    <div class="offer" v-for="offer in offers" :key="offer.id">
      <img :src="offer.imageUrl" alt="Offer Image" class="offer-image">
      <div>
        <h4>{{ offer.title }}</h4>
        <p>{{ offer.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'OffersList',
  data() {
    return {
      offers: [
        { id: 1, title: 'Atelier Robotique', description: 'Découvrez le monde de la robotique avec votre enfant.',  imageUrl: require('@/assets/child.png') },
        { id: 2, title: 'Atelier php', description: 'Découvrez le monde de la php avec votre enfant.', imageUrl:require( '@/assets/child.png' )},


        // Plus d'offres...
      ]
    }
  }
}
</script>

<style scoped>
.offers-list {
  background: white;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.offer {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  text-align: left; /* Assure que le texte est aligné à gauche */
  padding-bottom: 15px; /* Ajoute de l'espace au-dessous du contenu avant la bordure */
  border-bottom: 1px solid #ccc; /* Ligne grise pour séparer les offres */
}
.offer:last-child {
  border-bottom: none;
}

.offer-image {
  width: 100px;
  height: auto;
  margin-right: 15px;
}
</style>
