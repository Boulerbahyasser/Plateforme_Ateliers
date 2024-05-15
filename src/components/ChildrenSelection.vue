<template>
  <div class="children-selection">
    <h2>Sélectionnez les enfants pour l'offre</h2>
    <div v-if="loading">
      Chargement des enfants...
    </div>
    <div v-else>
      <div v-for="child in children" :key="child.id" class="child-card">
        <img :src="child.imageUrl" alt="Child's photo" class="child-image">
        <div class="child-info">
          <h3>{{ child.name }}</h3>
          <p>Âge : {{ child.age }}</p>
          <button @click="selectChild(child)">Sélectionner</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['offerId'],
  data() {
    return {
      children: [],
      loading: true
    }
  },
  created() {
    this.fetchChildren();
  },
  methods: {
    fetchChildren() {
      axios.get(`http://localhost:3000/children?userId=${this.$route.params.userId}`)
        .then(response => {
          this.children = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des enfants:', error);
          this.loading = false;
        });
    },
    selectChild(child) {
      // Logique pour sélectionner un enfant pour l'offre
      console.log('Selected child:', child);
      // Vous pouvez ajouter l'enfant à l'offre ici ou naviguer vers une page de confirmation, etc.
    }
  }
}
</script>

<style scoped>
.children-selection {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.child-card {
  display: flex;
  align-items: center;
  gap: 20px;
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 10px;
}

.child-image {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
}

.child-info > h3 {
  margin: 0;
}

.child-info > p {
  margin: 5px 0;
}
</style>
