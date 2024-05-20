<template>
  <div class="offers-page">
    <featured-offer></featured-offer>
    <offers-list></offers-list>
  </div>
</template>

<script>
import FeaturedOffer from './FeaturedOffer.vue';
import OffersList from './OffersList.vue';

export default {
  components: {
    FeaturedOffer,
    OffersList
  }
}
</script>

<style scoped>
.offers-page {
  padding: 20px;
  background: #F8F9FA; /* Comme votre page Welcome */
}
</style>
