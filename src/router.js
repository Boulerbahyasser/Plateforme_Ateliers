import { createRouter, createWebHistory } from 'vue-router';
import Contact from "@/components/Contact.vue";
import AboutUs from "@/components/AboutUs.vue";
import SignIn from '@/components/SignIn.vue';
import SignUp from "@/components/SignUp.vue";
import WelcomePage from "@/components/WelcomePage.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/contact', component: Contact, name: "Contact" },
    { path: '/about', component: AboutUs, name: "AboutUs" },
    { path: '/signin', component: SignIn, name: "SignIn" },
    { path: '/signup', component: SignUp, name: "SignUp" },
    { path: '/', component: WelcomePage, name: "WelcomePage" }
  ]
});

export default router;
