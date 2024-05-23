<template>
  <div class="choose-children-container">
    <h1>Choisissez les enfants pour l'activité: {{ activityTitre }}</h1>
    <div v-if="loading">Chargement des enfants...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des enfants. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="child in children" :key="child.id" class="child-card" @click="selectChild(child.id)">
        <label :for="`child-${child.id}`" class="child-label">
          <span class="child-name">{{ child.nom + ' ' + child.prenom }}</span>
          <span class="child-level">Niveau: {{ child.niveau }}</span>
        </label>
      </div>
    </div>
    <button @click="submitChildren" class="submit-btn">Terminer</button>
  </div>
</template>
<script>
import axios from '@/axios';

export default {
  name: 'ChooseChildren',
  data() {
    return {
      activityId: this.$route.query.activityId,
      activityTitre: this.$route.query.activityTitre,
      offerId: this.$route.query.offerId,
      offerTitre: this.$route.query.offerTitre,
      children: [],
      loading: true,
      error: false
    };
  },
  created() {
    this.fetchChildren();
  },
  methods: {
    async fetchChildren() {
      try {
        alert(this.activityId) ;
        const response = await axios.get(`http://localhost:8000/api/show/parent/enfant/`);
        this.children = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des enfants:', error);
        this.loading = false;
        this.error = true;
      }
    },
    selectChild(childId) {
      this.$router.push({
        name: 'selectshedule',
        params: { activityId: this.activityId },
        query: {
          activityTitre: this.activityTitre,
          offerId: this.offerId,
          offerTitre: this.offerTitre,
          childId: childId,
          childName: this.children.find(child => child.id === childId).nom + ' ' + this.children.find(child => child.id === childId).prenom
        }
      });
    },
    submitChildren() {
      this.$router.push(`/activitylist/${this.activityId}`);
    }
  }
};
</script>
<style scoped>
.choose-children-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 40px;
  background-color: #f0f0f0;
}

h1 {
  font-size: 2.5rem;
  font-weight: bold;
  color: #0056b3;
  margin-bottom: 20px;
  text-align: center;
}

.child-card {
  width: 800px;
  display: flex;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  transition: transform 0.3s ease;
  align-items: center;
  cursor: pointer;
}

.child-card:hover {
  transform: translateY(-5px);
}

.child-label {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.child-name {
  font-weight: bold;
  color: #333;
}

.child-level {
  font-style: italic;
  color: #666;
}

.submit-btn {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-weight: 500;
  margin-top: 20px;
}

.submit-btn:hover {
  background-color: #0056b3;
  box-shadow: 5px 5px 10px rgba(0,0,0,0.25);
}

.submit-btn:active {
  background-color: #012a56;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
