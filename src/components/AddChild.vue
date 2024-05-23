<template>
  <div class="add-child-container">
    <h1>Ajouter un Nouvel Enfant</h1>
    <form @submit.prevent="submitForm" class="add-child-form">
      <div class="form-group">
        <label for="nom" class="form-label"><i class="fas fa-user"></i> Nom:</label>
        <input type="text" id="nom" v-model="child.nom" class="form-input" required>
      </div>
      <div class="form-group">
        <label for="prenom" class="form-label"><i class="fas fa-user"></i> Prénom:</label>
        <input type="text" id="prenom" v-model="child.prenom" class="form-input" required>
      </div>
      <div class="form-group">
        <label for="date_naissance" class="form-label"><i class="fas fa-calendar"></i> Date de naissance:</label>
        <input type="date" id="date_naissance" v-model="child.date_naissance" class="form-input" required>
      </div>
      <div class="form-group">
        <label for="niveau" class="form-label"><i class="fas fa-graduation-cap"></i> Niveau:</label>
        <input type="text" id="niveau" v-model="child.niveau" class="form-input" required>
      </div>
      <div class="form-group">
        <label for="photo" class="form-label"><i class="fas fa-camera"></i> Photo:</label>
        <input type="file" id="photo" @change="onFileChange" class="form-input" accept="image/*">
        <div v-if="child.photo" class="photo-preview">
          <img :src="child.photo" alt="Photo de l'enfant">
        </div>
      </div>
      <button type="submit" class="form-submit">Ajouter l'enfant</button>
    </form>
  </div>
</template>

<script>
import axios from '@/axios';

export default {
  name: 'AddChild',
  data() {
    return {
      child: {
        nom: '',
        prenom: '',
        date_naissance: '',
        niveau: '',
        photo: null,
      }
    };
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.child.photo = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
    async submitForm() {
      try {
        // Préparez les données du formulaire pour l'envoi
        const formData = new FormData();
        formData.append('nom', this.child.nom);
        formData.append('prenom', this.child.prenom);
        formData.append('date_naissance', this.child.date_naissance);
        formData.append('niveau', this.child.niveau);
        if (this.child.photo) {
          formData.append('photo', this.dataURLtoBlob(this.child.photo));
        }

        // Envoyez les données au backend
        await axios.post('http://localhost:8000/api/children', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        // Redirigez vers la liste des enfants après l'ajout
        this.$router.push({ name: 'userchildren' });
      } catch (error) {
        console.error('Erreur lors de l\'ajout de l\'enfant:', error);
      }
    },
    dataURLtoBlob(dataURL) {
      const arr = dataURL.split(',');
      const mime = arr[0].match(/:(.*?);/)[1];
      const bstr = atob(arr[1]);
      let n = bstr.length;
      const u8arr = new Uint8Array(n);
      while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
      }
      return new Blob([u8arr], { type: mime });
    }
  }
};
</script>

<style scoped>
.add-child-container {
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

.add-child-form {
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

.photo-preview {
  margin-top: 10px;
}

.photo-preview img {
  max-width: 100px;
  max-height: 100px;
  border-radius: 50%;
  object-fit: cover;
}

.form-submit {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
  background-color: #3498db;
  color: white;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.form-submit:hover {
  background-color: #2980b9;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.form-submit:active {
  background-color: #1e5d8b;
}
</style>
