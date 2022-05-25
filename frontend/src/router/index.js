import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    component: () => import(/**/ "../views/AboutView.vue"),
  },
  {
    path: "/search",
    name: "search",
    component: () => import(/**/ "../views/Search.vue"),
  },
  {
    path: "/authenticate",
    name: "Authenticate",
    component: () => import(/**/ "../views/Authenticate.vue"),
  },
  {
    path: "/authenticate/lawyer/login",
    name: "LawyerLogin",
    component: () =>
      import(/**/ "../views/authenticate/lawyer/LawyerLogin.vue"),
  },
  {
    path: "/authenticate/client/login",
    name: "ClientLogin",
    component: () =>
      import(/**/ "../views/authenticate/client/ClientLogin.vue"),
  },
  {
    path: "/authenticate/lawyer/signin",
    name: "LawyerSignin",
    component: () =>
      import(/**/ "../views/authenticate/lawyer/LawyerSignin.vue"),
  },
  {
    path: "/authenticate/client/signin",
    name: "ClientSignin",
    component: () =>
      import(/**/ "../views/authenticate/client/ClientSignin.vue"),
  },
  {
    path: "/profile",
    name: "LawyerProfile",
    component: () =>
      import(/**/ "../views/LawyerProfile.vue"),
  },
  ,
  {
    path: "/profile/:id",
    name: "Profile",
    component: () =>
      import(/**/ "../views/LawyerProfile.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
