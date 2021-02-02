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
import Users from "./pages/users/Users.vue";
import UsersList from "./pages/users/List.vue";
import UserForm from "./pages/users/Form.vue";

const routes = [
  {
    path: "/login",
    name: "Login",
    component: Login
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
        component: UserForm
      },
      {
        path: 'user/:id',
        name: 'ShowUser',
        component: UserForm
      }
    ]
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;