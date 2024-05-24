<template>
  <div class="change-password">
    <h2 class="form-header">Changer le Mot de Passe</h2>
    <form @submit.prevent="submitForm"> <!-- Appeler submitForm lors de la soumission -->

      <div class="form-group">
        <label for="newPassword" class="form-label"><i class="fas fa-lock-open"></i> Nouveau Mot de Passe:</label>
        <input type="password" id="newPassword" v-model="passwords.password" class="form-input">
      </div>

      <div class="form-group">
        <label for="confirmPassword" class="form-label"><i class="fas fa-lock"></i> Confirmer Nouveau Mot de Passe:</label>
        <input type="password" id="confirmPassword" v-model="passwords.password_confirmation" class="form-input">
      </div>

      <button type="submit" class="form-submit">Changer Mot de Passe</button>
    </form>
  </div>
</template>

<script>
import axios from '@/axios';

export default {
  data() {
    return {
      passwords: {
        password: '',
        password_confirmation: ''
      },
      token: null, // Stocker le token ici
    };
  },
  mounted() {
    // Récupérer le token de l'URL
    const url = window.location.href;
    const token = url.substring(url.lastIndexOf('/') + 1);
    this.token = token;
  },
  methods: {
    submitForm() {
      // Appeler changePassword avec le token
      this.changePassword(this.token);
    },
    changePassword(token) {
      if (!token) {
        alert("Token not found in URL.");
        return;
      }

      if (this.passwords.password !== this.passwords.password_confirmation) {
        alert("Les mots de passe ne correspondent pas.");
        return;
      }

      // Envoyer la requête POST avec le token et les nouveaux mots de passe
      axios.post(`http://localhost:8000/api/reset-password/${token}`, this.passwords)
        .then(response => {
          alert(response.data.message);
          this.$router.push('/login');
        })
        .catch(error => {
          console.error('Erreur de Reset Password:', error);
          alert(error.response.data.message);
        });
    }
  }
}
</script>

<style scoped>
/* Vos styles ici */
</style>

<style scoped>
/* Vos styles ici */
</style>


<style scoped>
.change-password {
  max-width: 500px;
  margin: auto;
  padding: 20px;
  background: #f0f8ff; /* couleur de fond douce */
  border: 2px solid #0096c7; /* bordure bleue */
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-header {
  color: #005f73;
  text-align: center;
  margin-bottom: 20px;
  font-size: 24px;
}

.form-group {
  margin-bottom: 20px;
  position: relative;
}

.form-label {
  display: block;
  margin-bottom: 5px;
  color: #003049;
  font-weight: bold;
}

.form-input {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 2px solid #00b4d8;
  transition: border-color 0.3s;
}

.form-input:focus {
  border-color: #0077b6;
}

.form-submit {
  width: 100%;
  padding: 10px;
  background-color: #0077b6;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-submit:hover {
  background-color: #023e8a;
}

.fas {
  margin-right: 5px;
}
</style>