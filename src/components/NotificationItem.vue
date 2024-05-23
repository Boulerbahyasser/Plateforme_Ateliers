

<template>
  <li class="notification-item">
    <p>{{ notification.contenu }}</p>
    <button @click="$emit('delete', notification.id)">Supprimer</button>
  </li>
</template>

<script>
export default {
  props: {
    notification: Object
  }
}
</script>

<style scoped>
.notification-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  background: white;
  margin-bottom: 10px;
  border-radius: 4px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.05);
}

.notification-item p {
  margin: 0;
  color: #333;
  flex-grow: 1;
}

button {
  background-color: #e53e3e;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s;
}

button:hover {
  background-color: #c53030;
}

button:focus {
  outline: none;
  box-shadow: 0 0 0 2px #fff, 0 0 0 4px #c53030;
}
</style>
