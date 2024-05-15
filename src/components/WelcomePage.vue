<template>
  <NavbarElement/>
  <div class="welcome-container">
    <div class="text-section">
      <h1>Apprenez vos enfants Sans Limites</h1>
      <p>Commencez,Inscrivez vos enfants à des activités enrichissantes, gérez les plannings et les paiements en toute simplicité.</p>
      <div>
        <button type="button" @click="goToSignUp" class="signup-btn">Inscrivez-vous gratuitement</button>
        <button type="button" @click="goToSignIn" class="signin-btn">Explorez les cours</button>
      </div>


    </div>
    <div class="image-section">
      <img src="@/assets/child.png" alt="Learning" class="welcome-image">
    </div>
  </div>
</template>

<script>
import NavbarElement from "@/components/NavBar.vue";

export default {
  components: {
    NavbarElement
  },
  methods: {
    goToSignUp() {
      this.$router.push('/signup');
    },
    goToSignIn() {
      this.$router.push('/signin');
    }
  }
}
</script>

<style scoped>

.welcome-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #E2F0D9; /* Fond clair et amusant */
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
}


.text-section {
  flex: 1;
  max-width: 50%; /* Plus d'espace pour l'image */
  padding-right: 50px; /* Espace entre le texte et l'image */
}

h1 {
  font-size: 3rem; /* Plus grand pour captiver l'attention */
  color: #4A90E2; /* Couleur amusante */
  font-family: 'Comic Sans MS', 'Comic Neue', cursive; /* Police plus adaptée aux enfants */
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.1); /* Ajout d'une petite ombre pour le relief */
}

p {
  font-size: 1.5rem; /* Plus lisible */
  color: #333;
  font-family: 'Comic Sans MS', 'Comic Neue', cursive;
  margin-bottom: 30px;
  line-height: 1.5; /* Espacement entre les lignes pour une meilleure lisibilité */
}

.signup-btn, .signin-btn {
  padding: 15px 30px; /* Plus grand pour faciliter le clic */
  margin-top: 20px;
  border-radius: 10px; /* Coins plus arrondis */
  font-size: 1.2rem; /* Texte plus grand */
  font-weight: bold; /* Texte en gras */
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.signup-btn {
  background-color: #FF6384; /* Rose vif */
}

.signin-btn {
  background-color: #36A2EB; /* Bleu vif */
}

.signup-btn:hover, .signin-btn:hover {
  transform: scale(1.05); /* Grossit légèrement au survol */
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.image-section {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.welcome-image {
  max-width: 80%;
  border-radius: 15px; /* Ajout de bordures arrondies pour adoucir les angles */
}
@media (max-width: 768px) {
    .welcome-container {
        flex-direction: column;
    }

    .text-section, .image-section {
        max-width: 100%;
        padding: 0 20px;
    }

    .welcome-image {
        max-width: 100%;
        height: auto;
    }
}



</style>