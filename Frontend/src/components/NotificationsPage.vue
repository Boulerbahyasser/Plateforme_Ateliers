<template>
  <div class="notifications-page">
    <h1>Notifications</h1>
    <ul>
      <notification-item
        v-for="notification in notifications"
        :key="notification.id"
        :notification="notification"
        @delete="deleteNotification"
      ></notification-item>
    </ul>
    <button @click="viewHistory">Voir l'historique des notifications</button>
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
      notifications: [] // Les données des notifications seront chargées ici
    };
  },
  methods: {
    deleteNotification(id) {
      // Ici, ajouter la logique pour supprimer la notification
      this.notifications = this.notifications.filter(n => n.id !== id);
    },
    viewHistory() {
      // Logique pour afficher l'historique des notifications
    },
    loadNotifications() {
      // Ici, ajouter la logique pour charger les notifications depuis un serveur ou un service local
    }
  },
  created() {
    this.loadNotifications();
  }
}
</script>

<style scoped>
.notifications-page {
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

button {
  background-color: #4A90E2;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s;
}

button:hover {
  background-color: #3778c2;
}

button:focus {
  outline: none;
  box-shadow: 0 0 0 2px #fff, 0 0 0 4px #3778c2;
}
</style>

