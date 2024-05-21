<template>
  <NavBar />
  <div class="sign-up">
    <h1>Inscription</h1>
    <form @submit.prevent="submitForm">

      <div>
        <label for="name">Nom d'utilisateur</label>
        <input type="text" id="name" v-model="user.name" required>
      </div>

      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="user.email"  @blur="validateEmail" required>
        <span v-if="emailError" class="error">{{ emailError }}</span>
      </div>

      <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" v-model="user.password" @blur="validatePassword" required>
        <span v-if="passwordError" class="error">{{ passwordError }}</span>
      </div>
      <!-- <div>
        <label for="password">confirm password :</label>
        <input type="password" id="password" name="password_confirmation" @blur="validatePassword" required>
        <span v-if="passwordError" class="error">{{ passwordError }}</span>
      </div> -->

      <div>
        <button type="submit">S'inscrire</button>
      </div>

      <p class="already-registered">Déjà inscrit ? <router-link to="/signin">Connectez-vous</router-link></p>

    </form>
  </div>
</template>

<script>
import axios from 'axios';
import NavBar from "@/components/NavBar.vue";

export default {
  name: 'SignUp',
  components: { NavBar },
  data() {
    return {
      user: {

        name: '',
        email: '',
        password: '',
      },

      emailError: '',
      passwordError: ''
    };
  },
  methods: {
    validateEmail() {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!re.test(this.user.email)) {
        this.emailError = 'Veuillez entrer un email valide';
      } else {
        this.emailError = '';
      }
    },
    validatePassword() {
      if (this.user.password.length < 8) {
        this.passwordError = 'Le mot de passe doit contenir au moins 8 caractères';
      } else {
        this.passwordError = '';
      }
    },
    submitForm() {
      this.validateEmail();
      this.validatePassword();
      if (this.emailError || this.passwordError) {
        return;
      }
      axios.post('http://localhost:8000/api/register-parent', this.user)
        .then(response => {
          alert('Inscription réussie!');
          console.log(response.data);
          this.$router.push('/signin');
        })
        .catch(error => {
          console.error('Erreur lors de l\'inscription:', error);
          alert(error.response.data.message);
        });
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

.error {
  color: red;
  font-size: 0.9em;
}
</style>