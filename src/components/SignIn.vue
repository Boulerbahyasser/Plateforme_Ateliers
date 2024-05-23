<template>
  <NavBar />
  <div class="sign-in">
    <h1>Connexion</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="user.email" @blur="validateEmail" required>
        <span v-if="emailError" class="error">{{ emailError }}</span>
      </div>
      <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" v-model="user.password" @blur="validatePassword" required>
        <span v-if="passwordError" class="error">{{ passwordError }}</span>
      </div>
      <div>
        <button type="submit">Se connecter</button>
      </div>
    </form>
    <p class="forgot-password">
      <router-link to="/forgetpassword">Mot de passe oublié ?</router-link>
    </p>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import axios from "@/axios";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

async function getCSRFToken() {
    try {
        await axios.get('http://localhost:8000/sanctum/csrf-cookie');

    } catch (error) {
        console.error('Failed to fetch CSRF token:', error);
    }
}



export default {
  name: 'SignIn',
  components: {
    NavBar
  },
  data() {
    return {
      user: {
        email: '',
        password: ''
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
      getCSRFToken().then(()=>{


          axios.post('http://localhost:8000/api/login', this.user).then(response => {

          const token = response.data.token;

          // document.cookie = 'auth_token=' + token + '; HttpOnly';// quand ajouter HttpOnly la token pas voir dans cookies
          localStorage.setItem('auth_token', response.data.token);
          axios.defaults.headers.common[`Authorization`] = `Bearer ${token}`;
          alert('Connexion réussie!');
          this.$router.push('/offerspage');
          })
          .catch(error => {
          console.error('Erreur de connexion:', error);
          alert(error.response.data.message);
          });


      })

    }
  }
};
</script>

<style scoped>
.sign-in {
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
  box-sizing: border-box;
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

.forgot-password {
  text-align: center;
  margin-top: 15px;
  color: #666;
}

.forgot-password a {
  color: #2980b9;
  text-decoration: none;
}

.forgot-password a:hover {
  text-decoration: underline;
}

.error {
  color: red;
  font-size: 0.9em;
}
</style>