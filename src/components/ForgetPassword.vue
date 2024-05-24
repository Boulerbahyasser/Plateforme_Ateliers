<template>
  <NavBar />
  <div class="forget-password">
    <h1>Mot de passe oublié</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" required>
      </div>
      <div>
        <button type="submit">Réinitialiser le mot de passe</button>
      </div>
      <p class="already-registered">
        <router-link to="/signin">Retour à la connexion</router-link>
      </p>
    </form>
  </div>
</template>

<script>
import axios from '@/axios';
import NavBar from "@/components/NavBar.vue";

export default {
  name: 'ForgetPassword',
  components: { NavBar },
  data() {
    return {
      email: ''
    };
  },
  methods: {
    submitForm() {
      axios.post('http://localhost:8000/api/forget-password', { email: this.email })
        .then(response => {
          alert('Un email de réinitialisation a été envoyé!');
          console.log(response.data);
          this.$router.push('/signin'); // Exemple de redirection vers la page de connexion
        })
        .catch(error => {
          console.error('Erreur lors de la réinitialisation du mot de passe:', error);
        // alert('Une erreur est survenue lors de la réinitialisation du mot de passe.');
        console.log(error.response.data.message);
        alert(error.response.data.message);
        });
    }
  }
};
</script>

<style scoped>
.forget-password {
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

input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 2px solid transparent;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: border-color 0.2s, box-shadow 0.2s;
  box-sizing: border-box; /* Ensure the width is not affected by padding or border */
}

input[type="text"],
input[type="password"],
input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 2px solid transparent;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: border-color 0.2s, box-shadow 0.2s;

}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus {
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