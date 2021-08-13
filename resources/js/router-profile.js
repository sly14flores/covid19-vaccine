import { createWebHashHistory, createRouter } from "vue-router";

import Profile from "./pages/profiles/registration.vue";
import Verify from "./pages/profiles/verify.vue";
import PublicVerify from "./pages/profiles/publicVerify.vue";

const routes = [
  {
    path: "/",
    name: "Profile",
    component: Profile
  },
  {
    path: "/:id/verify",
    name: "Verify",
    component: Verify
  },
  {
    path: "/verify",
    name: "PublicVerify",
    component: PublicVerify
  },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;