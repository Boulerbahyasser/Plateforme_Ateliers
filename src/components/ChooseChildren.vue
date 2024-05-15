<template>
  <div class="choose-children-container">
    <h1>Choisissez les enfants pour l'activité: {{ activityName }}</h1>
    <div v-for="child in children" :key="child.id" class="child-card" @click="selectChild(child.id)">
      <label :for="`child-${child.id}`" class="child-label">
        <span class="child-name">{{ child.name }}</span>
        <span class="child-level">Niveau: {{ child.level }}</span>
      </label>
    </div>
    <button @click="submitChildren">Terminer</button>
  </div>
</template>

<script>

export default {
  name: 'ChooseChildren',
  data() {
    return {
      activityName: this.$route.query.activityName || 'Activité',
      children: [
        {
          id: 1,
          name: "Mohammed",
          level: "Débutant"
        },
        {
          id: 2,
          name: "Sara",
          level: "Intermédiaire"
        }
      ]
    };
  },
  methods: {
    selectChild(childId) {
      this.$router.push({ path: '/selectschedule', query: { childId, activityName: this.activityName } });
    },
    submitChildren() {
      console.log('Enfants sélectionnés:', this.children);
      this.$router.push('/activitylist'); // Rediriger vers la liste des activités après soumission
    }
  }
};
</script>

<style scoped>
/* Styles identiques à ceux fournis précédemment */
@import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

.choose-children-container {
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
  margin-bottom: 20px;
}

.child-card {
  width: 800px;
  display: flex;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  transition: transform 0.3s ease;
  align-items: center;
  cursor: pointer;
}

.child-card:hover {
  transform: translateY(-5px);
}

.child-label {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.child-name {
  font-weight: bold;
  color: #333;
}

.child-level {
  font-style: italic;
  color: #666;
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
