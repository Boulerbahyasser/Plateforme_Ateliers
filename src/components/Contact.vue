<template>
    <NavBar />
  <div class="contact-container">
    <h1>Contactez-nous</h1>
    <form @submit.prevent="submitContactForm">
      <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" id="name" v-model="contact.name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="contact.email" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" v-model="contact.message" required></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";

export default {
  name: 'ContactElement',
  components: {NavBar},
  data() {
    return {
      contact: {
        name: '',
        email: '',
        message: ''
      }
    };
  },
  methods: {
    submitContactForm() {
      // Traitement du formulaire de contact
      console.log("Form Submitted", this.contact);
      // Envoyer les informations à un serveur ou afficher un message
    }
  }
};
</script>

<style scoped>
.contact-container {
  max-width: 600px;
  margin: 40px auto;
  padding: 40px; /* Augmenté pour plus de respiration */
  box-shadow: 0 10px 20px rgba(0,0,0,0.15); /* Ombre plus forte pour plus de profondeur */
  border-radius: 10px; /* Coins plus arrondis */
  background-color: #ffffff; /* Fond clair pour un contraste élevé */
  border: 1px solid #ccc; /* Bordure subtile pour définir le conteneur */
}

h1 {
  text-align: center;
  color: #2C3E50; /* Couleur foncée pour plus de contraste */
  font-size: 2.8rem; /* Taille de police légèrement augmentée */
  margin-bottom: 30px; /* Espace accru sous le titre */
}

.form-group {
  margin-bottom: 25px; /* Espacement accru pour une meilleure organisation */
}

label {
  display: block;
  margin-bottom: 10px; /* Espacement accru sous le label */
  color: #333;
  font-weight: 600; /* Police en gras pour une meilleure lisibilité */
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 15px; /* Padding accru pour un confort d'écriture */
  margin-bottom: 20px; /* Espacement accru */
  border: 2px solid #e3e3e3; /* Bordure plus visible */
  border-radius: 5px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06); /* Ombre interne pour un effet subtil */
  transition: all 0.3s ease-in-out;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
  border-color: #3498db; /* Couleur de bordure au focus */
  box-shadow: 0 0 8px rgba(52, 152, 219, 0.5); /* Ombre externe au focus pour un effet "glow" */
}

button {
  padding: 15px 30px; /* Padding accru pour un bouton plus grand */
  border-radius: 6px; /* Coins légèrement plus arrondis */
  font-size: 1.1rem; /* Taille de police augmentée */
  letter-spacing: 1px; /* Espacement des lettres pour un effet stylisé */
}

button:hover {
  background-color: #2980b9; /* Couleur de survol */
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4); /* Ombre plus marquée au survol */
}

button:active {
  background-color: #2575b5; /* Couleur active plus sombre */
}
</style>

