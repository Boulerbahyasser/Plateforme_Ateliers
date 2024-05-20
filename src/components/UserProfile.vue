<template>
  <div class="user-profile">
    <h2 class="profile-header">Profil Utilisateur</h2>
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
@import url('https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;700&display=swap');

.user-profile {
  max-width: 600px;
  margin: 40px auto;
  padding: 25px;
  background: #ffffff; /* couleur de fond douce */
  border: 2px solid #4A90E2; /* bordure bleue */
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-family: 'Baloo Bhaijaan 2', cursive; /* police conviviale */
}

.profile-header {
  color: #4A90E2;
  text-align: center;
  margin-bottom: 20px;
  font-size: 2rem;
  font-weight: bold;
}

.form-group {
  margin-bottom: 20px;
  position: relative;
}

.form-label {
  display: block;
  margin-bottom: 5px;
  color: #333;
  font-weight: bold;
}

.form-input {
  width: 100%;
  padding: 12px;
  border-radius: 5px;
  border: 2px solid #4A90E2;
  transition: border-color 0.3s;
  font-family: 'Baloo Bhaijaan 2', cursive;
}

.form-input:focus {
  border-color: #305e8c;
}

.profile-submit {
  width: 100%;
  padding: 12px;
  background-color: #4A90E2;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
  font-family: 'Baloo Bhaijaan 2', cursive;
  font-size: 1.2rem;
  font-weight: bold;
}

.profile-submit:hover {
  background-color: #305e8c;
  transform: scale(1.05);
}

.profile-submit:active {
  background-color: #203d5c;
}

.fas {
  margin-right: 5px;
  color: #4A90E2; /* Couleur des icônes pour correspondre à la bordure et au bouton */
}

.loader, .error-message {
  text-align: center;
  color: #e74c3c; /* Rouge doux pour les messages d'erreur */
  font-size: 1.2rem;
  margin-top: 20px;
}
</style>
