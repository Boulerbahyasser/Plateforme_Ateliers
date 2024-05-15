<template>
  <div class="offer-container">
    <button @click="prevOffer" class="nav-btn left-btn">⬅️</button>
    <div class="text-section">
      <h1>{{ currentOffer.title }}</h1>
      <p>{{ currentOffer.description }}</p>
      <router-link to="/offerdetails" class="signup-btn">Inscrivez-vous à l'offre</router-link>
    </div>
    <div class="image-section">
      <img :src="currentOffer.imageUrl" alt="Learning" class="offer-image">
    </div>
    <button @click="nextOffer" class="nav-btn right-btn">➡️</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      offers: [
        {
          title: "Atelier Algorithme",
          description: "Découvrez le monde de l'algorithme avec votre enfant.",
          imageUrl: require("@/assets/child.png")
        },
        {
          title: "Atelier Robotique",
          description: "Plongez dans le monde fascinant de la robotique.",
          imageUrl: require("@/assets/child.png")
        },
        {
          title: "Atelier Programmation",
          description: "Apprenez à coder avec Python.",
          imageUrl: require("@/assets/child1.png")
        }
      ],
      currentIndex: 0
    };
  },
  computed: {
    currentOffer() {
      return this.offers[this.currentIndex];
    }
  },
  methods: {
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

.nav-btn {
  border: none;
  background: transparent;
  color: #fff;
  font-size: 1.5rem;
  cursor: pointer;
  padding: 10px;
  transition: color 0.3s ease;
}

.left-btn {
  position: absolute;
  left: 20px;
}

.right-btn {
  position: absolute;
  right: 20px;
}

.nav-btn:hover {
  color: #efb902;
}
</style>




