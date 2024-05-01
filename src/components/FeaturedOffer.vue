<template>
  <div class="welcome-container">
    <div class="text-section">
      <h1>Atelier Algorithme</h1>
      <p>Découvrez le monde de l'algorithme avec votre enfant.</p>
      <router-link to="/signup" class="signup-btn">Inscrivez-vous à l'offre</router-link>

    </div>
    <div class="image-section">
      <img src="@/assets/child.png" alt="Learning" class="welcome-image">
    </div>
  </div>
</template>

<script>

</script>
<style scoped>
.welcome-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: rgba(187,35,38); /* Fond clair */
  height: 40vh;
  padding-bottom: 20px;
}

.text-section {
  flex: 1;
  max-width: 40%; /* Ajustez selon vos besoins */
  padding-right: 50px; /* Espace entre le texte et l'image */
  margin-left: 70px;
}

h1 {
  font-size: 50px ;
  color: #305e8c;
  margin-bottom: 20px;
}

p {
  font-size: 1.2rem;
  color: #eff1f3;
  margin-bottom: 30px;
}

.signup-btn {
  padding: 10px 20px;
  margin-top: 10px;
  border: none;
  border-radius: 5px;
  color: white;
  text-decoration: none;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.signup-btn {
  background-color: #007BFF;
  margin-right: 40px;
}

.signup-btn:hover {
  background-color: #0056b3;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}
.signup-btn:active {
  background-color: #012a56;
}

.image-section {
  flex: 1;
  max-width: 30%; /* Ajustez selon vos besoins */
  display: flex;
  justify-content: center;
  align-items: center;

}

.welcome-image {
  max-width: 350px;
  height: auto; /* Maintient le ratio d'aspect de l'image */
  margin-right: 70px;
  margin-bottom: 1px;
  margin-top: 15px;
}
 .welcome-container:hover {
  transform: scale(1.05); /* Agrandissement léger */
  transition: transform 0.3s ease-in-out;

}
</style>

