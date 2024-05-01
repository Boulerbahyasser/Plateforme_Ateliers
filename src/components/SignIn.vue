<template>
  <div class="sign-in">
    <h1>Connexion</h1>
    <form @submit.prevent="submitLogin">
      <div>
        <label for="email">Email:</label>
        <input type="text" id="email" v-model="login.email" required>
      </div>
      <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" v-model="login.password" required>
      </div>
      <div>
        <button type="submit">Se connecter</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'SignIn',
  data() {
    return {
      login: {
        email: '',
        password: ''
      }
    };
  },
  methods: {
    submitLogin() {
      console.log("Données de connexion:", this.login);
      // Ajoutez ici la logique pour envoyer les données de connexion à un serveur.
    }
  }
};
</script>

<style scoped>
.sign-in {
  max-width: 300px;
  margin: auto;
  padding: 25px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
label {
  display: block;
  margin-bottom: 5px;
}
input[type="text"], input[type="password"] {
  width: 95%;
  padding: 7px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="text"]:focus, input[type="password"]:focus {
  outline: none; /* Supprime l'encadrement par défaut au focus */
  border-color: #3498db; /* Change la couleur de la bordure au focus si désiré */
}


button {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #0056b3;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}

button:active {
background-color: #012a56}


</style>
