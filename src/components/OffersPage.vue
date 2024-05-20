<template>
<UtilisateurParent />
  <div class="offers-page">
    <FeaturedOffer />
    <OffersList />
  </div>
</template>

<script>
import FeaturedOffer from './FeaturedOffer.vue';
import OffersList from './OffersList.vue';
import UtilisateurParent from "@/components/UtilisateurParent.vue";

export default {
  components: {
    FeaturedOffer ,
    OffersList,
    UtilisateurParent
  }
}
</script>

<style scoped>
.offers-page {
  padding: 20px;
  background: #F8F9FA; /* Comme votre page Welcome */
}
</style>
