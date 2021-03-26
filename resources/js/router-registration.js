import { createWebHashHistory, createRouter } from "vue-router";

import Registration from "./pages/registration.vue";
import Verify from "./pages/verify.vue";

const routes = [
  {
    path: "/",
    name: "Registration",
    component: Registration
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