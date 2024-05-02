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
  max-width: 350px;
  margin: 40px auto;
  padding: 25px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  background-color: #f8f9fa;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #333;
  font-weight: 600;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 2px solid transparent;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: border-color 0.2s, box-shadow 0.2s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  border-color: #3498db;
  box-shadow: 0 2px 4px rgba(50, 150, 250, 0.5);
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #3498db;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s, box-shadow 0.3s;
}

button:hover {
  background-color: #2980b9;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

button:active {
  background-color: #2575b5;
}

.already-registered {
  text-align: center;
  margin-top: 15px;
  color: #666;
}

.already-registered a {
  color: #2980b9;
  text-decoration: none;
}

.already-registered a:hover {
  text-decoration: underline;
}
</style>
