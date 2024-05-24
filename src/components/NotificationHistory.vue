<template>
  <div class="notifications-history-page">
    <h1>Historique des Notifications</h1>
    <ul>
      <notification-item
        v-for="notification in historyNotifications"
        :key="notification.id"
        :notification="notification"
        @delete="deleteNotification"
      ></notification-item>
    </ul>
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
      historyNotifications: [], // Les données des notifications historiques seront chargées ici
      loading: true,
      error: false
    };
  },
  created() {
    this.loadHistoryNotifications();
  },
  methods: {
    async deleteNotification(id) {
      try {
        await axios.delete(`http://localhost:8000/api/delete/notification/${id}`);
        this.historyNotifications = this.historyNotifications.filter(n => n.id !== id);
      } catch (error) {
        console.error("Failed to delete notification:", error);
      }
    },

    async loadHistoryNotifications() {
      try {
        const response = await axios.get('http://localhost:8000/api/show/notification/parent/remaining/');
        this.historyNotifications = response.data;
        this.loading = false;
      } catch (error) {
        console.error("Failed to load notifications:", error);
        alert(error.response.data.message);
        this.loading = false;
        this.error = true;
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
