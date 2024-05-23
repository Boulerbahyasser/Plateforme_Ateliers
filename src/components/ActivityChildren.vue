<template>
  <div class="activity-children">
    <h1>Enfants pour l'Activité</h1>
    <div v-if="loading">Chargement des enfants...</div>
    <div v-else-if="error" class="error-message">Erreur lors de la récupération des enfants. Veuillez réessayer plus tard.</div>
    <div v-else>
      <div v-for="child in children" :key="child.id" class="child-item">
        <div class="child-details">
          <h2>{{ child.nom }}</h2>
          <p><strong>Niveau :</strong> {{ child.niveau }}</p>
          <p><strong>État :</strong>
            <span :class="getStatusClass(child.etat)">{{ child.etat }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from '@/axios';

export default {
  name: 'ActivityChildren',
  data() {
    return {
      children: [],
      loading: true,
      error: false,
    };
  },
  created() {
    this.fetchChildren();
  },
  methods: {
    async fetchChildren() {
      const { requestId, activityId } = this.$route.params; // Assuming you are passing the request and activity IDs via route parameters
      try {
const response = await axios.get(`http://localhost:8000/api/show/parent/demande/activity/enfants/${requestId}/${activityId}`);        this.children = response.data;
        this.loading = false;
      } catch (error) {
        console.error('Erreur lors de la récupération des enfants:', error);
        this.loading = false;
        this.error = true;
      }
    },
    getStatusClass(status) {
      switch (status) {
        case 'accepté':
          return 'status-accepted';
        case 'refusé':
          return 'status-refused';
        case 'en cours':
          return 'status-pending';
        default:
          return '';
      }
    }
  }
};

</script>

<style scoped>
.activity-children {
  max-width: 800px;
  margin: 40px auto;
  padding: 25px;
  background-color: #f0f4f8;
  border-radius: 10px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  text-align: center;
}

h1 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #34495e;
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.child-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.child-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.child-details {
  flex-grow: 1;
  text-align: left;
}

.child-details h2 {
  font-family: 'Baloo Bhaijaan 2', cursive;
  color: #2c3e50;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.child-details p {
  font-size: 1.2rem;
  color: #7f8c8d;
  margin: 5px 0;
}

.status-accepted {
  color: green;
}

.status-refused {
  color: red;
}

.status-pending {
  color: orange;
}

.error-message {
  color: red;
  text-align: center;
  margin-top: 20px;
}
</style>
