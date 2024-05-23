<template>
  <div class="user-profile">
    <h1>Profil Utilisateur</h1>
    <form @submit.prevent="updateProfile" class="profile-form">
      <div class="form-group">
        <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
        <input type="email" id="email" v-model="user.email" disabled class="form-input">
      </div>
      <div class="form-group">
        <label for="name" class="form-label"><i class="fas fa-user"></i> Nom:</label>
        <input type="text" id="name" v-model="user.name" class="form-input">
      </div>
      <div class="form-group">
        <label for="role" class="form-label"><i class="fas fa-briefcase"></i> Fonction:</label>
        <input type="text" id="role" v-model="user.role" class="form-input">
      </div>
      <button type="submit" class="profile-submit">Mettre à jour le profil</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      user: {
        email: '',  // Cet email sera récupéré via l'API
        name: '',  // Nom récupéré via l'API
        role: '',  // Modifiable par l'utilisateur
      },
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchUserProfile();
  },
  methods: {
    async fetchUserProfile() {
      try {
        const response = await axios.get('http://localhost:8000/api/user/profile');
        this.user = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération du profil:', error);
        this.loading = false;
        this.error = true;
      }
    },
    async updateProfile() {
      try {
        const response = await axios.put('http://localhost:8000/api/user/profile', this.user);
        console.log("Mise à jour des données de l'utilisateur réussie:", response.data);
      } catch (error) {
        console.error('Erreur lors de la mise à jour du profil:', error);
      }
    }
  }
}
</script>

<style scoped>
.user-profile {
  max-width: 600px;
  margin: 40px auto;
  padding: 20px;
  background: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

h1 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #34495e;
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.profile-form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 20px;
  text-align: left;
}

.form-label {
  display: block;
  margin-bottom: 5px;
  color: #333;
  font-weight: bold;
}

.form-input {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 2px solid #ddd;
  transition: border-color 0.3s;
}

.form-input:focus {
  border-color: #3498db;
}

.profile-submit {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
  background-color: #3498db;
  color: white;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.profile-submit:hover {
  background-color: #2980b9;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.profile-submit:active {
  background-color: #1e5d8b;
}

.fas {
  margin-right: 5px;
  color: #3498db; /* Couleur des icônes pour correspondre à la bordure et au bouton */
}

.loader, .error-message {
  text-align: center;
  color: #e74c3c; /* Rouge doux pour les messages d'erreur */
  font-size: 1.2rem;
  margin-top: 20px;
}
</style>
