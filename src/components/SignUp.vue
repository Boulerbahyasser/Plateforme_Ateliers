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
      <p class="already-registered"> Déjà inscrit ? <router-link to="/signin">Connectez-vous</router-link>
      </p>
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
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
input[type="email"]:focus, input[type="password"]:focus  , input[type="text"]:focus{
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
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}
button:active {
  background-color: #012a56;
}


.already-registered {
  text-align: center;
  margin-top: 20px;
}

.already-registered a {
  color: #3498db; /* Couleur de votre choix */
  text-decoration: none;
}


</style>
