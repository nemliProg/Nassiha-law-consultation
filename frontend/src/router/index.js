import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import store from '../store/index'
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
  }
  ,
  {
    path: "/profile/:id",
    name: "Profile",
    component: () =>
      import(/**/ "../views/LawyerProfile.vue"),
  },
  {
    path: "/myprofile",
    name: "MyProfile",
    component: () =>
      import(/**/ "../views/MonProfile.vue"),
  },
  {
    path: "/chat",
    name: "Chat",
    component: () =>
      import(/**/ "../views/Chat.vue"),
  },
  {
    path: "/:pathMatch(.*)*",
    name: "notFound",
    component: () =>
      import(/**/ "../views/NotFound.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  const lawyerRoutes = ['MyProfile'];
  const clientRoutes = ['Profile','search'];
  const globalRoutes = ['home','LawyerLogin','ClientLogin','ClientSignin','LawyerSignin','Authenticate','about'];
  const state = store.state;
  if (globalRoutes.includes(to.name)) {
    next();
    return true;
  }else if (clientRoutes.includes(to.name)) {
    if (state.isLoggedIn && state.role === 'client') {
      next();
      return true;
    }else {
      next({name : "home"});
      return true;
    }
  }else if (lawyerRoutes.includes(to.name)) {
    if (state.isLoggedIn && state.role === 'lawyer') {
      next();
      return true;
    }else {
      next({name : "home"});
      return true;
    }
  }else if(to.name === 'Chat') {
    if (state.isLoggedIn && state.role) {
      next();
      return true;
    }else {
      next({name : "home"});
      return true;
    }
  }else {
    next();
    return true;
  }
});

export default router;
