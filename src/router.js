import { createRouter, createWebHistory } from 'vue-router';
import Contact from "@/components/Contact.vue";
import AboutUs from "@/components/AboutUs.vue";
import SignIn from '@/components/SignIn.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/cont', component: Contact },
    { path: '/about', component: AboutUs },
      { path: '/signin', component: SignIn }
  ]
});

export default router;
