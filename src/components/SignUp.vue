<template>
  <div class="sign-up">
    <h1>Inscription</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Nom d'utilisateur</label>
        <input type="text" id="name" v-model="user.name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="user.email" required>
      </div>
      <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" v-model="user.password" required>
      </div>
      <div>
        <button type="submit">S'inscrire</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'SignUp',
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: ''
      }
    };
  },
  methods: {
    submitForm() {
      // Ici, vous ajouterez la logique pour traiter l'inscription
      console.log("Données d'inscription:", this.user);
      // Vous pourriez vouloir envoyer ces données à un serveur
    }
  }
};
</script>

<style scoped>
.sign-up {
  max-width: 300px;
  margin: auto;
  padding: 25px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
label {
  display: block;
  margin-bottom: 5px;
}
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 95%;
  padding: 7px;
  margin-bottom: 10px;
}
button {
  width: 100%;
  padding: 10px;
  background-color: #3498db;
  border: none;
  color: white;
  cursor: pointer;
}
button:hover {
  background-color: #2980b9;
}
</style>
