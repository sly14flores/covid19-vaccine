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
    path: "/verify",
    name: "Verify",
    component: Verify
  },
  {
    path: "/public/verify",
    name: "PublicVerify",
    component: PublicVerify
  },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;