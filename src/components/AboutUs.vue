<template>
  <NavBar/>
  <div class="about-us">
    <h1>À propos de nous</h1>
    <p>Ceci est une page à propos de notre entreprise...</p>
  </div>
</template>

<script>
import NavBar from "@/App.vue";

export default {
  name: 'AboutUs',
  components: {NavBar}
};
</script>

<style scoped>
.about-us {
  padding: 20px;
  text-align: center;
}
</style>
