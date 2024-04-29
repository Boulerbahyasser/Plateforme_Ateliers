<template>
  <nav class="navbar">
    <div class="navbar-left">
      <router-link to="/" class="navbar-brand">
        <img src="@/assets/logo.png" alt="Logo" class="navbar-logo">
      </router-link>
    </div>
    <ul class="navbar-center">
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/about">About Us</router-link></li>
      <li><router-link to="/how-to-use">How to use</router-link></li>
      <li><router-link to="/cont">Contact</router-link></li>
    </ul>
    <div class="navbar-right">
      <router-link to="/cart"><i class="fas fa-shopping-cart"></i></router-link>
      <router-link to="/profile"><i class="fas fa-user"></i></router-link>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavbarElement'
  // Vous pouvez ajouter du script ici si nécessaire
};
</script>

<style scoped>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #ffffff;
  padding: 0 1rem;
  border-bottom: 1px solid #ccc; /* Changez la couleur #ccc en fonction de votre design */
  position: sticky;
  top: 0; /* Cela garantit que la navbar reste en haut de la page */
  z-index: 1000; /* Assurez-vous qu'elle se trouve au-dessus des autres contenus */
  /* Votre autre CSS */
}

.navbar-left, .navbar-right {
  flex: 1;
}

.navbar-center {
  flex: 2;
  list-style: none;
  display: flex;
  justify-content: space-around;
  margin: 0;
  padding: 0;

}

.navbar-logo {
  height: 50px; /* ou la taille que vous voulez */
}

.navbar a {
  text-decoration: none;
  color: #333;
}

.navbar-right a {
  text-align: right;
}

.fas {
  margin-left: 15px;
}

/* Ajoutez vos propres styles ici pour correspondre à l'image que vous avez fournie */
</style>
