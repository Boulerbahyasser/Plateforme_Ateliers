import { createRouter, createWebHistory } from 'vue-router';
import Contact from "@/components/Contact.vue";
import AboutUs from "@/components/AboutUs.vue";
import SignIn from '@/components/SignIn.vue';
import SignUp from "@/components/SignUp.vue";
import WelcomePage from "@/components/WelcomePage.vue";
import OffersPage from "@/components/OffersPage.vue";
import OfferDetails from "@/components/OfferDetails.vue";
import NotificationsPage from "@/components/NotificationsPage.vue";
import ActivityList from "@/components/ActivityList.vue";
import ChildrenSelection from "@/components/ChildrenSelection.vue";
import UserProfile from "@/components/UserProfile.vue";
import ChangePassword from "@/components/ChangePassword.vue";
import NotificationHistory from "@/components/NotificationHistory.vue";
import ChooseChildren from "@/components/ChooseChildren.vue";
import SelectSchedule from "@/components/SelectSchedule.vue";
import ForgetPassword from "@/components/ForgetPassword.vue";
import UnaUthorized from "@/components/UnaUthorized.vue";
import ParentRequests from "@/components/ParentRequests.vue";
import DemandeActivity from "@/components/DemandeActivity.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/contact', component: Contact, name: "Contact" },
    { path: '/about', component: AboutUs, name: "AboutUs" },
    { path: '/signin', component: SignIn, name: "SignIn" },
    { path: '/signup', component: SignUp, name: "SignUp" },
    { path: '/', component: WelcomePage, name: "WelcomePage" },
    { path: '/offerspage' , component:OffersPage , name:"OffersPage" },
    { path: '/offerdetails/:id' , component:OfferDetails , name:"offerdetails"},
    { path:'/activitylist/:offerId' , component:ActivityList , name:"activitylist"},
    { path:'/notificationpage' , component:NotificationsPage , name:"notificationpage"},
    { path:'/childrenselection' , component:ChildrenSelection , name:"childrenselection"},
    { path:'/userprofile' , component:UserProfile , name:"userprofile"} ,
    { path:'/changepassword' , component:ChangePassword , name:"changepassword"},
    { path:'/notificationhistory' , component:NotificationHistory , name:"notificationhistory"},
    { path:'/choosechildren' , component:ChooseChildren , name:"choosechildren"},
    { path:'/selectshedule' , component:SelectSchedule , name:"selectshedule"},
    { path:'/forgetpassword' , component:ForgetPassword , name:"forgetpassword"},
    { path:'/unauthorized' , component:UnaUthorized ,name:"unauthorized"},
    { path: '/parentrequests', component: ParentRequests , name: "parentrequests"},
    { path: '/demandeactivity/:id', component: DemandeActivity, name: "demandeactivity"}

  ]
});

export default router;
