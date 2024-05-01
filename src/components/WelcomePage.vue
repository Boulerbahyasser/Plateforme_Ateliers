<template>
  <div class="welcome-container">
    <div class="text-section">
      <h1>Apprenez vos enfants Sans Limites</h1>
      <p>Commencez,Inscrivez vos enfants à des activités enrichissantes, gérez les plannings et les paiements en toute simplicité.</p>
      <div>
        <button type="button" @click="goToSignUp" class="signup-btn">Inscrivez-vous gratuitement</button>
        <button type="button" @click="goToSignIn" class="signin-btn">Explorez les cours</button>
      </div>


    </div>
    <div class="image-section">
      <img src="@/assets/child.png" alt="Learning" class="welcome-image">
    </div>
  </div>
</template>

<script>
import { useRouter } from 'vue-router';

export default {
  setup() {
    const router = useRouter(); // Obtenez l'instance du routeur pour Vue 3

    function goToSignUp() {
      router.push('/signup'); // Redirige vers le composant SignUp
    }

    function goToSignIn() {
      router.push('/signin'); // Redirige vers le composant SignIn
    }

    return {
      goToSignUp,
      goToSignIn
    }
  }
}
</script>


<style scoped>
.welcome-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #F8F9FA; /* Fond clair */
  height: 100vh;
}

.text-section {
  flex: 1;
  max-width: 60%; /* Ajustez selon vos besoins */
  padding-right: 50px; /* Espace entre le texte et l'image */
}

h1 {
  font-size: 2.5rem;
  color: #2C3E50;
  margin-bottom: 20px;
}

p {
  font-size: 1.2rem;
  color: #34495E;
  margin-bottom: 30px;
}

.signup-btn, .signin-btn {
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

.signin-btn {
  background-color: #18d561;
}

.signup-btn:hover  {
  background-color: #0056b3;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}
.signin-btn:hover{
  background-color: #2cc469;
  box-shadow:5px 5px 10px rgba(0,0,0,0.25) ;
}

.image-section {
  flex: 1;
  max-width: 60%; /* Ajustez selon vos besoins */
  display: flex;
  justify-content: center;
  align-items: center;
}

.welcome-image {
  max-width: 100%;
  height: auto; /* Maintient le ratio d'aspect de l'image */
}
</style>
