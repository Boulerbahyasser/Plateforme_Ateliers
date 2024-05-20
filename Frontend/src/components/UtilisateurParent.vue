<template>
   <!-- Navigation Supérieure -->
   <nav class="bg-blue-500 p-4 flex items-center justify-between">
     <div>
       <button @click="toggleSidebar" class="text-white text-xl font-semibold">
         <i class="fas fa-bars"></i> BIENVENUE
       </button>
     </div>
     <div class="flex items-center space-x-4">
       <i class="fas fa-user-circle text-white text-2xl"></i>
     </div>
   </nav>
 
   <!-- Navigation Latérale -->
   <aside :class="{ 'closed': !isSidebarOpen }" class="bg-gray-600 text-white w-64 min-h-screen p-2">
     <div class="flex justify-end">
       <button @click="closeSidebar" class="text-white p-2">
         <i class="fas fa-times"></i>
       </button>
     </div>
     <nav>
       <ul class="space-y-2">
         <li v-for="(option, index) in opciones" :key="index" class="option-with-dropdown">
           <div class="flex items-center justify-between p-2 hover:bg-gray-700" @click="toggleDropdown(index)">
             <div class="flex items-center">
               <i :class="option.icon + ' mr-2'"></i>
               <span>{{ option.title }}</span>
             </div>
             <i class="fas fa-chevron-down text-xs"></i>
           </div>
           <ul v-show="option.isActive" class="ml-4">
             <li v-for="item in option.items" :key="item">
               <a href="#" class="block p-2 hover:bg-gray-700 flex items-center" @click.prevent="selectChild(item)">
                 <i class="fas fa-chevron-right mr-2 text-xs"></i>
                 {{ item }}
               </a>
             </li>
           </ul>
         </li>
       </ul>
     </nav>
   </aside>
 
   <div class="modal" v-show="showForm">
  <div class="modal-background" @click="closeForm"></div>
  <div class="modal-content">
    <form @submit.prevent="submitForm">
      <h3>Détails de {{ selectedChild }}</h3>
      <div class="form-group">
        <label for="firstName">Nom:</label>
        <input id="firstName" v-model="childDetails.firstName" type="text" placeholder="Nom" disabled>
      </div>
      <div class="form-group">
        <label for="lastName">Prénom:</label>
        <input id="lastName" v-model="childDetails.lastName" type="text" placeholder="Prénom" disabled>
      </div>
      <div class="form-group">
        <label for="courses">Les courses:</label>
        <textarea id="courses" v-model="childDetails.courses" placeholder="Les courses de l'enfant" rows="4" disabled></textarea>
      </div>
      <!-- Ajouter des champs de formulaire ici -->
      <button type="submit">Enregistrer</button>
      <button type="button" @click="closeForm">Annuler</button>
    </form>
  </div>
</div>

 
   <!-- Formulaire Modal pour Ajouter un Enfant -->
   <div class="modal" v-show="showAddChildForm">
     <div class="modal-background" @click="closeAddChildForm"></div>
     <div class="modal-content">
       <form @submit.prevent="addNewChild">
         <i class="fas fa-user-circle text-white text-2xl"></i>
         <input v-model="newChild.firstName" type="text" placeholder="Nom">
         <input v-model="newChild.lastName" type="text" placeholder="Prenom">
         <input v-model="newChild.Niveau" type="text" placeholder="Niveau">
         <input v-model="newChild.dateOfBirth" type="date" placeholder="Date de naissance">
         <button type="submit">Ajouter</button>
         <button type="button" @click="closeAddChildForm">Annuler</button>
       </form>
     </div>
   </div>
 </template>
<script>
export default {
  name: 'UtilisateurParent',
  data() {
    return {
      isSidebarOpen: false,
      showForm: false,
      showAddChildForm: false,
      selectedChild: null,
      newChild: { firstName: '', lastName: '', Niveau: '', dateOfBirth: '' },
      childDetails:{firstName:'',lastName: '',courses:''},
      
      opciones: [
        {
          title: 'Mes Enfants',
          icon: 'fa fa-users',
          isActive: false,
          items: ['Enfant 1', 'Enfant 2']
        },
        {
          title: 'Ajouter un enfant',
          icon: 'fas fa-plus-circle',
          isActive: false,
          items: [],
          action: this.openAddChildForm
        },
        {
          title: 'Logout',
          icon: 'fas fa-sign-out-alt',
          isActive: false,
          items: []
        }
      ]
    }
  },
  methods: {
    toggleSidebar() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
    closeSidebar() {
      this.isSidebarOpen = false;
    },
    toggleDropdown(index) {
      if (this.opciones[index].title === 'Ajouter un enfant') {
        this.openAddChildForm();
      } else {
        this.opciones[index].isActive = !this.opciones[index].isActive;
      }
    },
    openForm() {
      this.showForm = true;
    },
    closeForm() {
      this.showForm = false;
    },
    openAddChildForm() {
      this.showAddChildForm = true;
    },
    closeAddChildForm() {
      this.showAddChildForm = false;
    },
    submitForm() {
      console.log("Updating child:", this.selectedChild);
      this.closeForm();
    },
    addNewChild() {
      console.log("Adding new child:", this.newChild);
      this.closeAddChildForm();
    },
    selectChild(child) {
      this.selectedChild = child;
      this.openForm();
    }
  }
};
</script>

<style>
/* Global Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
}
html, body {
  height: 100%;
  width: 100%;
  background-color: #5b86c2;
  color: #334155;
}

/* Sidebar Styling */
aside {
  width: 280px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background: linear-gradient(to bottom, #312a96, #e2e8f0);
  box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  transition: transform 0.3s ease;
}
aside.closed {
  transform: translateX(-280px);
}

/* Sidebar Links */
aside ul {
  list-style-type: none;
  padding: 50px 0;
}
aside a {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  color: #b2c6e4;
  text-decoration: none;
  transition: background-color 0.3s, color 0.3s;
}
aside a:hover, aside a:focus {
  background: #0056b3;
  color: #ffffff;
}

/* Icon Animations */
aside i {
  margin-right: 10px;
  font-size: 20px;
  transition: transform 0.3s ease-in-out;
}
aside a:hover i {
  transform: rotate(90deg);
}

/* Main Content Styling */
.main {
  margin-left: 280px;
  padding: 20px;
  transition: margin-left 0.3s ease;
}

/* Button and Interactive Element Styling */
button, .button-like {
  background-color: #007BFF;
  color: white;
  border: none;
  padding: 15px;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: all 0.3s ease;
}
button:hover, .button-like:hover {
  background-color: #0056b3;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  transform: translateY(-3px);
}

/* Responsive Adjustments for Sidebar */
@media (max-width: 768px) {
  aside {
    transform: translateX(-100%);
  }
  .main {
    margin-left: 0;
  }
}
.modal {
 position: fixed;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 display: flex;
 justify-content: center;
 align-items: center;
 visibility: visible; /* Ajouté pour contrôler la visibilité */
}
.modal-background {
  position:absolute;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
}
.modal-content {
  background-color: white;
  padding: 20px;
  margin: auto;
  z-index: 2;
  width: 300px; /* Vous pouvez ajuster cette largeur selon vos besoins */
}

.modal-content input,
.modal-content button {
  display: block; /* Assure que chaque élément prend une ligne complète */
  width: 100%; /* Prend toute la largeur du conteneur .modal-content */
  margin-bottom: 30px; /* Espacement entre les éléments */
  box-sizing: border-box; /* Inclut le padding et border dans la largeur totale */
}
.modal[style*="display: block"] {
  visibility: visible; /* Assure que le modal est visible quand display est 'block' */
}
.text-center {
  text-align: center;
}
</style>
 