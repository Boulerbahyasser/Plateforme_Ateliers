<template>
  <div class="offer-details-container">
    <div class="offer-card">
      <div class="offer-image">
        <img :src="offer.imageUrl" alt="Offer Image">
      </div>
      <div class="offer-info">
        <h1>{{ offer.title }}</h1>
        <p class="offer-description">{{ offer.description }}</p>
        <div class="offer-meta">
          <span class="offer-price">${{ offer.price }}</span>
          <button @click="Demander">Demander</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      offer: {
        title: "Advanced Programming",
        description: "Enhance your skills with our comprehensive programming courses. Learn advanced concepts in a practical manner.",
        price: 149.99,
        imageUrl: require("@/assets/child.png")
      }
    }
  },
  methods: {
    Demander() {
      // Trigger a review modal or redirect to a review page
      console.log('Demande added!');
    }
  }
}
</script>

<style scoped>
.offer-details-container {
  display: flex;
  justify-content: center;
  padding: 40px;
  background-color: #f0f0f0;
}

.offer-card {
  width: 800px;
  display: flex;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.offer-card:hover {
  transform: translateY(-5px);
}

.offer-image img {
  width: 300px;
  height: 300px;
  object-fit: cover;
}

.offer-info {
  padding: 20px;
  flex-grow: 1;
}

.offer-description {
  font-size: 1rem;
  color: #666;
  margin: 10px 0;
}

.offer-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
}

.offer-price {
  font-size: 1.5rem;
  color: #333;
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}
button:active {
  background-color: #012a56;
}
</style>
