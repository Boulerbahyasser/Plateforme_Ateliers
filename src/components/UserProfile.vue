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
        <input type="text" id="name" v-model="user.name" disabled class="form-input">
      </div>
      <div class="form-group">
        <label for="role" class="form-label"><i class="fas fa-briefcase"></i> Fonction:</label>
        <input type="text" id="role" v-model="user.role" class="form-input">
      </div>
      <div class="form-group">
        <label for="childrenCount" class="form-label"><i class="fas fa-child"></i> Nombre d'enfants:</label>
        <input type="number" id="childrenCount" v-model="user.childrenCount" class="form-input">
      </div>
      <button type="submit" class="profile-submit">Mettre à jour le profil</button>
    </form>
  </div>
</template>


<script>
export default {
  components:{

  },
  data() {
    return {
      user: {
        email: 'user@example.com',  // Cet email est normalement récupéré via l'API
        name: 'John Doe',  // Nom récupéré via l'API
        role: '',  // Modifiable par l'utilisateur
        childrenCount: 0  // Modifiable par l'utilisateur
      }
    };
  },
  methods: {
    updateProfile() {
      console.log("Mise à jour des données de l'utilisateur", this.user);
      // Ici, vous feriez un appel API pour mettre à jour les données de l'utilisateur
    }
  }
}
</script>

<style scoped>
.user-profile {
  max-width: 500px;
  margin: auto;
  padding: 20px;
  background: #f0f8ff; /* couleur de fond douce */
  border: 2px solid #0096c7; /* bordure bleue */
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-header {
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

.profile-submit {
  width: 100%;
  padding: 10px;
  background-color: #0077b6;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.profile-submit:hover {
  background-color: #023e8a;
}

.fas {
  margin-right: 5px;
}
</style>

