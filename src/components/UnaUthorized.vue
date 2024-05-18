<template>
  <div class="unaUthorized">
    <h1>Non Autorisé</h1>
    <p>Vous n'avez pas la permission d'accéder à cette page.</p>
    <router-link to="/">Retour à l'accueil</router-link>
  </div>
</template>

<script>
export default {
  name: 'UnaUthorized'
};
</script>

<style scoped>
.unaUthorized {
  text-align: center;
  margin-top: 50px;
}
</style>
