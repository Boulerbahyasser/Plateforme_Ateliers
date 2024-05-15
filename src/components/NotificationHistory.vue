<template>
  <div class="notifications-history-page">
    <h1>Historique des Notifications</h1>
    <ul>
      <notification-item
        v-for="notification in historyNotifications"
        :key="notification.id"
        :notification="notification"
      ></notification-item>
    </ul>
  </div>
</template>

<script>
import NotificationItem from './NotificationItem.vue';

export default {
  components: {
    NotificationItem
  },
  data() {
    return {
      historyNotifications: [] // Les données des notifications historiques seront chargées ici
    };
  },
  created() {
    this.loadHistoryNotifications();
  },

  methods: {
    async loadHistoryNotifications() {
        try {
          // Simulation de l'appel à l'API
          // Vous pouvez remplacer cette partie par un appel réel à votre backend.
          await new Promise(resolve => setTimeout(resolve, 1000)); // Simule un délai de chargement
          this.historyNotifications = [
            {id: 1, message: "Votre enfant a été inscrit à l'activité de robotique."},
            {id: 2, message: "Paiement reçu pour le cours de programmation."},
            {id: 4, message: "il y'a un nouveau offre qui peux etre interssante a vous"},
            {id: 5, message: "votre enfant ahmed mohdi a été inscrit a l'activiter d'algo"},
            {id: 6, message: "votre enfant ahmed aymen a été inscrit a l'activiter de C#"},
            {id: 7, message: "votre enfant ahmed moadi a été inscrit a l'activiter de programmation"},
            {id: 4, message: "il y'a un nouveau offre qui peux etre interssante a vous"}
          ];
        } catch (error) {
          console.error("Failed to load notifications:", error);
          // Gérer l'erreur de manière appropriée, peut-être avec une notification d'erreur utilisateur.
        }
      }
  }
}
</script>

<style scoped>

.notifications-history-page {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  background: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

h1 {
  color: #305e8c;
  text-align: center;
}

ul {
  list-style: none;
  padding: 0;
}

</style>
