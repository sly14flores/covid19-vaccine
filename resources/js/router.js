import { createWebHashHistory, createRouter } from "vue-router";

import PageWrapper from './PageWrapper.vue';

import Dashboard from "./pages/dashboard/Dashboard.vue";
import Registrations from "./pages/summary/registrations.vue";
import Surveys from "./pages/summary/surveys.vue";

/**
 * Users
 */
import Login from "./pages/login.vue";
import Registration from "./pages/registration.vue";
import Verify from "./pages/verify.vue";
import Users from "./pages/users/Users.vue";
import UsersList from "./pages/users/List.vue";
import UserNew from './pages/users/New.vue';
import UserEdit from './pages/users/Edit.vue';

const routes = [
  {
    path: "/admin",
    name: "Login",
    component: Login
  },
  {
    path: "/verify",
    name: "Verify",
    component: Verify
  },
  {
    path: "/registration",
    name: "Registration",
    component: Registration
  },  
  {
    path: "/",
    redirect: "/summary/surveys",
    name: "Dashboard",
    component: PageWrapper,
    props: {pageComponent: Surveys}
  },   
  {
    path: "/summary/surveys",
    name: "Surveys",
    component: PageWrapper,
    props: {pageComponent: Surveys}
  },
  {
    path: "/summary/registrations",
    name: "Registrations",
    component: PageWrapper,
    props: {pageComponent: Registrations}
  },   
  {
    path: "/users",
    name: "Users",
    component: PageWrapper,
    props: {pageComponent: Users},
    children: [
      {
        path: '',
        name: 'UsersList',
        component: UsersList
      },
      {
        path: 'new',
        name: 'NewUser',
        component: UserNew
      },      
      {
        path: 'user/:id',
        name: 'ShowUser',
        component: UserEdit
      }
    ]
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;