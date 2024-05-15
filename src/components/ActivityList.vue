<template>
  <div class="activity-list-container">
    <h1>Activités Disponibles</h1>
    <div v-for="activity in activities" :key="activity.id" class="activity-item">
      <img :src="activity.imageUrl" alt="Image de l'activité" class="activity-image">
      <div class="activity-details">
        <h3>{{ activity.title }}</h3>
        <p>{{ activity.description }}</p>
        <p><strong>Objectifs :</strong> {{ activity.objectives }}</p>
        <p><strong>Domaine :</strong> {{ activity.domain }}</p>
      </div>
      <div class="action-buttons">
        <button @click="goToActivityDetails">Choisir les enfants</button>
      </div>
    </div>
    <button @click="makeRequest">Faire une demande</button>
  </div>
</template>

<script>
export default {
  name: 'ActivityList',
  data() {
    return {
      activities: [
        {
          id: 1,
          title: "Introduction à la programmation",
          description: "Améliorez vos compétences avec nos cours de programmation complets.",
          objectives: "Apprendre à coder",
          domain: "Informatique",
          imageUrl: require("@/assets/child.png"),
        },
        {
          id: 2,
          title: "Exploration artistique",
          description: "Découvrez diverses techniques artistiques et exprimez votre créativité.",
          objectives: "Développer la créativité",
          domain: "Arts",
          imageUrl: require("@/assets/child.png"),
        }
      ]
    };
  },
  methods: {
    goToActivityDetails() {
      this.$router.push({ path: '/choosechildren' });
    },
    makeRequest() {
      console.log('Faire une demande');
      // Logique pour faire une demande
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap'); /* Importing a fun, child-friendly font */

.activity-list-container {
  padding: 20px;
  text-align: center;
  background-image: linear-gradient(to top right, #02143b, #625dea); /* Vibrant gradient background */
  color: #ffffff; /* White text for better visibility */
}

h1 {
  font-family: 'Bangers', cursive; /* Fun, child-friendly font */
  color: #e1d9da; /* Bright yellow color */
  text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* Subtle shadow for depth */
  font-size: 2.5rem; /* Larger font size for the title */
  margin-bottom: 20px; /* Spacing below the title */
}

.activity-item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  border: 3px solid #020100; /* Bright yellow border */
  padding: 20px;
  border-radius: 15px; /* More pronounced rounded corners */
  background-color: #ffffff; /* White background for the activity items */
  color: #333; /* Dark text for readability */
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1); /* Subtle shadow for depth */
}

.activity-item:hover {
  transform: scale(1.027); /* More noticeable increase in size on hover */
}

.activity-image {
  width: 150px;
  height: 150px; /* Adjust height to make the image square */
  margin-right: 20px;
  border-radius: 10px; /* Slightly rounded corners for images */
}

.activity-details h3 {
  margin: 0;
  font-family: 'Bangers', cursive; /* Using the imported fun font */
  color: #d0772f; /* Bright orange for headings */
  font-size: 1.8rem;
}

.activity-details p {
  font-size: 1.2rem;
  color: #555; /* Dark grey for readability */
}

.action-buttons {
  margin-left: auto; /* Align buttons to the right */
  display: flex;
  align-items: center;
}

button {
  padding: 10px 20px;
  background-color: #3498db; /* Bright cyan */
  color: white;
  border-radius: 8px; /* Rounded button edges */
  font-size: 1.1rem;
  margin-left: 10px; /* Space between checkbox and button */
}

button:hover {
  background-color: #01389e; /* Darker shade of cyan on hover */
}
</style>
