import { createWebHashHistory, createRouter } from "vue-router";

import Dashboard from "./pages/dashboard/Dashboard.vue";

/**
 * Users
 */
import Users from "./pages/users/Users.vue";
import UsersList from "./pages/users/UsersList.vue";
import UserForm from "./pages/users/UserForm.vue";

const routes = [
  {
    path: "/",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/users",
    name: "Users",
    component: Users,
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