<template>
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
export default {
  name: 'ContactElement',
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
  margin: auto;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.form-group {
  margin-bottom: 20px;
}
label {
  display: block;
  margin-bottom: 5px;
}
input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 8px;
  box-sizing: border-box; /* Assurez-vous que le padding ne change pas la largeur */
}
button {
  padding: 10px 20px;
  background-color: #3498db;
  color: white;
  border: none;
  cursor: pointer;
}
button:hover {
  background-color: #2980b9;
}
</style>
