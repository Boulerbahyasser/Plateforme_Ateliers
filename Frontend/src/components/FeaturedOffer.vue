<template>
  <div class="offer-container">
    <div class="text-section">
      <h1>Atelier Algorithme</h1>
      <p>Découvrez le monde de l'algorithme avec votre enfant.</p>
      <router-link to="/signup" class="signup-btn">Inscrivez-vous à l'offre</router-link>
    </div>
    <div class="image-section">
      <img src="@/assets/child.png" alt="Learning" class="offer-image">
    </div>
  </div>
</template>


<script>

</script>


<style scoped>
.offer-container {
  display: flex;
  align-items: center;
  justify-content: space-between;

  background: linear-gradient(135deg, #081865 0%, #7c87bd 100%); /* Gradient subtil basé sur la couleur originale */
  height: 40vh;
  padding: 20px;
  border-radius: 15px; /* Coins arrondis pour un look doux */
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Ombre pour ajouter de la profondeur */
  transition: transform 0.3s ease-in-out;
}

.offer-container:hover {
  transform: scale(1.05); /* Effet de zoom léger pour interactivité */
}

.text-section {
  flex: 1;
  max-width: 40%;
  color: #eff1f3; /* Couleur du texte ajustée pour le contraste */
}

h1 {
  font-size: 2.5rem; /* Taille ajustée pour mieux s'adapter */
  margin-bottom: 15px;
}

p {
  font-size: 1.2rem;
  margin-bottom: 20px;
}

.signup-btn {
  padding: 12px 25px;
  background-color: #efb902; /* Couleur vive pour attirer l'attention */
  border-radius: 10px;
  font-size: 1.1rem; /* Taille du texte ajustée */
  font-weight: bold; /* Texte en gras */
}

.signup-btn:hover {
  background-color: #cc9113;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.image-section {
  flex: 1;
  max-width: 30%; /* Espace augmenté pour l'image */
  margin-right: 30px;
}

.offer-image {
  max-width: 100%;
  border-radius: 10px; /* Image avec coins arrondis */
}
</style>



