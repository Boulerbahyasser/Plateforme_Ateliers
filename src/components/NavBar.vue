 <template>

  <nav class="navbar">
    <div class="navbar-left">
      <router-link to="/" class="navbar-brand">
        <img src="@/assets/logo.png" alt="Logo" class="navbar-logo">
      </router-link>
    </div>
    <ul class="navbar-center" :class="{ 'show': isMenuOpen }"> <!-- Si isMenuOpen est vrai (true), alors la classe show sera ajoutée à l'élément ul. Si isMenuOpen est faux (false), alors la classe show ne sera pas appliquée. -->
      <li><router-link to="/">Welcome</router-link></li>
      <li><router-link to="/about">About Us</router-link></li>
      <li><router-link to="/how-to-use">How to use</router-link></li>
      <li><router-link to="/contact">Contact</router-link></li>
    </ul>
    <div class="navbar-right">
      <router-link to="/notification"><i class="fas fa-bell"></i></router-link>
      <router-link to="/profile"><i class="fas fa-user"></i></router-link>
    </div>
    <button class="nav-toggle" @click="toggleMenu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>
  </nav>

</template>

<script>
export default {
  name: 'NavbarElement',
  data() {
    return {
      isMenuOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    }
  }
};
</script>

<style scoped>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
  color: white;
  padding: 0.75rem 1.5rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.navbar-left, .navbar-right {
  flex: 1;
}

.navbar-left {
  flex: 1;
  position: relative; /* Ajout de position relative */
}


.navbar-left::after {
  content: "";
  display: block;
  width: 2px;  /* Épaisseur de la ligne */
  height: 100%; /* Hauteur pour couvrir entièrement la hauteur de la barre de navigation */
  background-color: white; /* Couleur de la ligne */
  position: absolute;
  right: 0; /* Positionner à la droite du `navbar-left` */
  top: 0;
}


.navbar-center {
  flex: 3; /* élément prendra deux 3 plus d'espace disponible que les autres éléments flexibles avec une valeur flex de 1.*/
  list-style: none;
  display: flex;
  justify-content: space-around;
  margin: 0;
  padding: 0;
}

.navbar-logo {
  height: 50px;
  transition: transform 0.3s ease-in-out;
}

.navbar-logo:hover {
  transform: scale(1.1);
}

.navbar a {
  text-decoration: none;
  color: white;
  font-weight: 500;
  transition: color 0.3s ease-in-out;
}

.navbar a:hover {
  font-weight: bold;
}

.fas {
  margin-left: 20px;
  font-size: 20px;
  transition: transform 0.3s ease-in-out;
}

.fas:hover {
  transform: rotate(180deg);
}

.nav-toggle {
  display: none;
  flex-direction: column;
  cursor: pointer;
  border: none;
  background: none;
}

.nav-toggle .bar {
  display: block;
  width: 25px;
  height: 3px;
  margin: 3px auto;
  background-color: white;
  transition: all 0.3s ease;
}

@media (max-width: 768px) {
   .navbar-left::after {
    display: none; /* Cache la ligne verticale sur les petits écrans */
  }

  .navbar-center {
    position: absolute;
    top: 60px;
    width: 100%;
    background-color: rgba(1, 17, 52, 0.85);
    flex-direction: column;
    display: none;
  }

  .navbar-center.show {
    display: flex;
  }

  .nav-toggle {
    display: flex;
  }
}
</style>