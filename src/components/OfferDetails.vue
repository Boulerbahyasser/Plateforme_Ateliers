<template>
  <UtilisateurParent />
  <div class="offer-details-container">
    <div class="offer-card">
      <div class="offer-image">
        <img :src="offer.imageUrl" alt="Offer Image">
      </div>
      <div class="offer-info">
        <div class="text-content">
          <h1>{{ offer.title }}</h1>
          <p class="offer-description">{{ offer.description }}</p>
          <div class="date-info">
            <p><strong>Start:</strong> {{ offer.startDate }}</p>
            <p><strong>End:</strong> {{ offer.endDate }}</p>
          </div>
          <div class="remise-container">
            <p class="remise-label">La Tarif est :</p>
            <span class="offer-price">${{ offer.tarif }}</span>
          </div>
        </div>
        <div class="button-container">
          <button @click="GoToActivities">Choisir les Activités</button>
        </div>
      </div>
    </div>
    <ActivityList v-if="showActivities" :offer="offer" />
  </div>
</template>

<script>
import UtilisateurParent from "@/components/UtilisateurParent.vue";
import ActivityList from "@/components/ActivityList.vue";

export default {
  components: {
    UtilisateurParent,
    ActivityList
  },
  data() {
    return {
      offer: {
        title: "Advanced Programming",
        description: "Enhance your skills with our comprehensive programming courses.",
        tarif: 149.99,
        imageUrl: require("@/assets/child.png"),
        startDate: "2024-01-01",
        endDate: "2024-06-01",
        id: 1
      },
      showActivities: false
    };
  },
  methods: {
    Demander() {
      console.log('Demande added!');
    },
    chooseChildren() {
      this.$router.push({ path: '/childrenselection', query: { offerId: this.offer.id } });
    },
    GoToActivities() {
      this.$router.push({ path: '/activitylist', query: { offerId: this.offer.id } });
    }
  }
};
</script>

<style scoped>
.offer-details-container {
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
  margin-bottom: 0.5rem;
}

.offer-card {
  width: 800px;
  display: flex;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  overflow: hidden;
  transition: transform 0.3s ease;
  align-items: flex-start;
}

.offer-card:hover {
  transform: translateY(-5px);
}

.offer-image img {
  width: 300px;
  height: 428px;
  object-fit: cover;
}

.offer-info {
  display: flex;
  flex-direction: column;
  padding: 20px;
}

.text-content {
  width: 100%;
  margin-bottom: 20px;
}

.offer-description, .date-info {
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 10px;
  text-align: left;
}

.date-info {
  font-style: italic;
  color: #333;
}

.date-info p {
  font-style: italic;
  color: #333;
}

.remise-container {
  display: flex;
  align-items: center;
  gap: 10px;
}

.remise-label {
  margin: 0;
  font-size: 1.2rem;
  color: #100505;
}

.offer-price {
  font-size: 2rem;
  color: #e8554e;
  font-weight: bold;
  margin-top: 20px;
}

.button-container {
  align-self: flex-end;
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
  gap: 10px;
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-weight: 500;
}

button:hover {
  background-color: #0056b3;
  box-shadow: 5px 5px 10px rgba(0,0,0,0.25);
}

button:active {
  background-color: #012a56;
}
</style>
