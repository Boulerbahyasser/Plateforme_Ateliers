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
    <div class="button-container">
      <button @click="deleteAllNotifications">Supprimer toutes les notifications</button>
    </div>
    <div class="button-container">
          <button @click="viewHistory">Voir l'historique des notifications</button>
    </div>
  </div>
</template>
<script>
import NotificationItem from './NotificationItem.vue';
import axios from '@/axios';

export default {
  components: {
    NotificationItem
  },
  data() {
    return {
      notifications: [], // Les données des notifications seront chargées ici
      loading: true,
      error: false
    };
  },
  methods: {
    async deleteNotification(id) {
      try {
        await axios.delete(`http://localhost:8000/api/delete/notification/${id}`);
        this.notifications = this.notifications.filter(n => n.id !== id);
      } catch (error) {
        console.error("Failed to delete notification:", error);
      }
    },
    async deleteAllNotifications() {
      try {
        await axios.get('http://localhost:8000/api/delete/notification/all/');
        this.notifications = [];
      } catch (error) {
        console.error("Failed to delete all notifications:", error);
      }
    },
    viewHistory() {
      this.$router.push('/notificationhistory');
    },
    async loadNotifications() {
      try {
        const response = await axios.get('http://localhost:8000/api/show/notification/parent/top/');
        this.notifications = response.data;
        this.loading = false;
      } catch (error) {
        console.error("Failed to load notifications:", error);
        this.loading = false;
        this.error = true;
      }
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

.button-container {
  display: flex;
  justify-content: center;
}

button {
  background-color: #4A90E2;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s;
  margin-top: 20px;
}

button:hover {
  background-color: #3778c2;
}

button:focus {
  outline: none;
  box-shadow: 0 0 0 2px #fff, 0 0 0 4px #3778c2;
}
</style>