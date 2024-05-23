<template>
  <NavbarElement />
  <div class="welcome-container">
    <div class="text-section">
      <h1>Apprenez vos enfants Sans Limites</h1>
      <p>Commencez dès maintenant, inscrivez vos enfants à des activités enrichissantes, gérez les plannings et les paiements en toute simplicité.</p>
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
import NavbarElement from "@/components/NavBar.vue";

export default {
  name:'WelcomePage' ,
  components: {
    NavbarElement
  },
  methods: {
    goToSignUp() {
      this.$router.push('/signup');
    },
    goToSignIn() {
      this.$router.push('/signin');
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
  background-color: #f0f8ff; /* Fond clair et doux */
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
}

.text-section {
  flex: 1;
  max-width: 50%;
  padding-right: 50px;
}

h1 {
  font-size: 3rem;
  color: #4a90e2;
  font-family: 'Baloo Bhaijaan 2', cursive; /* Police adaptée aux enfants */
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

p {
  font-size: 1.5rem;
  color: #333;
  font-family: 'Baloo Bhaijaan 2', cursive;
  margin-bottom: 30px;
  line-height: 1.5;
}

.signup-btn, .signin-btn {
  padding: 15px 30px;
  margin-top: 20px;
  border-radius: 10px;
  font-size: 1.2rem;
  font-weight: bold;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.signup-btn {
  background-color: #ff6384;
  color: white;
}

.signin-btn {
  background-color: #36a2eb;
  color: white;
}

.signup-btn:hover, .signin-btn:hover {
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.image-section {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.welcome-image {
  max-width: 80%;
  border-radius: 15px;
  object-fit: cover;
}

@media (max-width: 768px) {
  .welcome-container {
    flex-direction: column;
    text-align: center;
  }

  .text-section, .image-section {
    max-width: 100%;
    padding: 0 20px;
  }

  .welcome-image {
    max-width: 100%;
    height: auto;
  }
}
</style>
