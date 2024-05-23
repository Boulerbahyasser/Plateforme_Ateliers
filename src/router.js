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
import UserProfile from "@/components/UserProfile.vue";
import ChangePassword from "@/components/ChangePassword.vue";
import NotificationHistory from "@/components/NotificationHistory.vue";
import ChooseChildren from "@/components/ChooseChildren.vue";
import SelectSchedule from "@/components/SelectSchedule.vue";
import ForgetPassword from "@/components/ForgetPassword.vue";
import UnaUthorized from "@/components/UnaUthorized.vue";
import ParentRequests from "@/components/ParentRequests.vue";
import DemandeActivity from "@/components/DemandeActivity.vue";
import SubmitRequest from "@/components/SubmitRequest.vue";
import UserChildren from "@/components/UserChildren.vue";
import ChildPlanning from "@/components/ChildPlanning.vue";
import ActivityChildren from "@/components/ActivityChildren.vue";
// import AddChild from "@/components/AddChild.vue";
import EditChild from "@/components/EditChild.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [

      { path: '/', component: WelcomePage, name: "WelcomePage" },
    { path: '/signin', component: SignIn, name: "SignIn" },
    { path: '/signup', component: SignUp, name: "SignUp" },
    { path:'/forgetpassword' , component:ForgetPassword , name:"forgetpassword"},
    { path:'/changepassword/:token' , component:ChangePassword , name:"changepassword"},
    { path: '/offerspage' , component:OffersPage , name:"OffersPage" },
    { path: '/offerdetails/:id' , component:OfferDetails , name:"offerdetails"},
    { path:'/activitylist/:offerId' , component:ActivityList , name:"activitylist"},
    { path:'/choosechildren' , component:ChooseChildren , name:"choosechildren"},
    { path:'/selectshedule/:activityId' , component:SelectSchedule , name:"selectshedule"},
    { path: '/submitrequest' , component:SubmitRequest , name:"submitrequest"},
    { path:'/notificationpage' , component:NotificationsPage , name:"notificationpage"},
    { path:'/notificationhistory' , component:NotificationHistory , name:"notificationhistory"},
    { path:'/userprofile' , component:UserProfile , name:"userprofile"} ,
    { path:'/unauthorized' , component:UnaUthorized ,name:"unauthorized"},
    { path: '/parentrequests', component: ParentRequests , name: "parentrequests"},
    { path: '/demandeactivity/:id', component: DemandeActivity, name: "demandeactivity"},
    { path: '/contact', component: Contact, name: "Contact" },
    { path: '/about', component: AboutUs, name: "AboutUs" },
    { path: '/userchildren', component: UserChildren, name: "userchildren" },
    { path: '/childplanning/:id', component: ChildPlanning, name: "childplanning" },
    // { pat: '/addChild' , component:AddChild , name:"addChild"},
    { path:'/editChild/:id' , component:EditChild , name:"editChild"},
{ path: '/activitychildren/:requestId/activities/:activityId/children', component: ActivityChildren, name: "activityChildren" }  ]
});

export default router;