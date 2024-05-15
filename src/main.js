

// Importez `createApp` de Vue
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// Créez l'instance de l'application
const app = createApp(App);

// Utilisez le router avec `app.use()`
app.use(router);

// Montez l'application
app.mount('#app');
