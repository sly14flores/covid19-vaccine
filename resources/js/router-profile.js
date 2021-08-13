import { createWebHashHistory, createRouter } from "vue-router";

import Profile from "./pages/profiles/registration.vue";
import Verify from "./pages/profiles/verify.vue";

const routes = [
  {
    path: "/",
    name: "Profile",
    component: Profile
  },
  {
    path: "/verify",
    name: "Verify",
    component: Verify
  },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;