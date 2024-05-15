<template>
  <div class="change-password">
    <h2 class="form-header">Changer le Mot de Passe</h2>
    <form @submit.prevent="changePassword">
      <div class="form-group">
        <label for="oldPassword" class="form-label"><i class="fas fa-lock"></i> Ancien Mot de Passe:</label>
        <input type="password" id="oldPassword" v-model="passwords.oldPassword" class="form-input">
      </div>
      <div class="form-group">
        <label for="newPassword" class="form-label"><i class="fas fa-lock-open"></i> Nouveau Mot de Passe:</label>
        <input type="password" id="newPassword" v-model="passwords.newPassword" class="form-input">
      </div>
      <div class="form-group">
        <label for="confirmPassword" class="form-label"><i class="fas fa-lock"></i> Confirmer Nouveau Mot de Passe:</label>
        <input type="password" id="confirmPassword" v-model="passwords.confirmPassword" class="form-input">
      </div>
      <button type="submit" class="form-submit">Changer Mot de Passe</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      passwords: {
        oldPassword: '',
        newPassword: '',
        confirmPassword: ''
      }
    };
  },
  methods: {
    changePassword() {
      if (this.passwords.newPassword !== this.passwords.confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        return;
      }
      console.log("Mot de passe mis à jour", this.passwords);
      // Ici, vous feriez un appel API pour changer le mot de passe
    }
  }
}
</script>

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
