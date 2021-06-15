import { createWebHashHistory, createRouter } from "vue-router";

import PageWrapper from './PageWrapper.vue';

// import Dashboard from "./pages/dashboard/Dashboard.vue";
import LandingPage from "./pages/landing-page.vue";
import SummaryRegistrations from "./pages/summary/registrations.vue";
import Vaccination from "./pages/summary/vaccination.vue";
import Surveys from "./pages/summary/surveys.vue";
import Vaccines from "./pages/scanners/vaccines.vue";

// vaccines
import VaccinesList from "./pages/vaccines/list.vue";
import Screening from "./pages/vaccines/screening.vue";
import Inoculation from "./pages/vaccines/inoculation.vue";
import Monitoring from "./pages/vaccines/monitoring.vue";

import Login from "./pages/login.vue";
// import Registration from "./pages/registration.vue";
import Booking from "./pages/booking.vue";
// import Verify from "./pages/verify.vue";
import ChangePassword from "./pages/change-password.vue";

/**
 * Admin - Registrations
 */
 import Registrations from "./pages/registrations/Registrations.vue";
 import RegistrationsList from "./pages/registrations/List.vue";
 import RegistrationNew from './pages/registrations/New.vue';
 import RegistrationEdit from './pages/registrations/Edit.vue';

/**
 * Users
 */
import Users from "./pages/users/Users.vue";
import UsersList from "./pages/users/List.vue";
import UserNew from './pages/users/New.vue';
import UserEdit from './pages/users/Edit.vue';

/**
 * Hospitals
 */
import Hospitals from "./pages/hospitals/Hospitals.vue";
import HospitalsList from "./pages/hospitals/List.vue";
import HospitalNew from './pages/hospitals/New.vue';
import HospitalEdit from './pages/hospitals/Edit.vue';

const routes = [
  {
    path: "/landing-page",
    name: "LandingPage",
    component: LandingPage
  },
  {
    path: "/change-password",
    name: "ChangePassword",
    component: PageWrapper,
    props: {pageComponent: ChangePassword}
  },
  {
    path: "/scanners/vaccines",
    name: "Vaccines",
    component: PageWrapper,
    props: {pageComponent: Vaccines}
  },
  {
    path: "/login",
    name: "Login",
    component: Login
  },
  {
    path: "/booking",
    name: "Booking",
    component: Booking
  },
  // {
  //   path: "/verify",
  //   name: "Verify",
  //   component: Verify
  // },
  // {
  //   path: "/registration",
  //   name: "Registration",
  //   component: Registration
  // },  
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
    name: "SummaryRegistrations",
    component: PageWrapper,
    props: {pageComponent: SummaryRegistrations}
  },{
    path: "/summary/vaccination",
    name: "Vaccination",
    component: PageWrapper,
    props: {pageComponent: Vaccination}
  },
  {
    path: "/vaccines/list/:phase",
    name: "VaccinesList",
    component: PageWrapper,
    props: {pageComponent: VaccinesList}
  },
  {
    path: "/vaccines/screening",
    name: "Screening",
    component: PageWrapper,
    props: {pageComponent: Screening}
  },
  {
    path: "/vaccines/inoculation",
    name: "Inoculation",
    component: PageWrapper,
    props: {pageComponent: Inoculation}
  },
  {
    path: "/vaccines/monitoring",
    name: "Monitoring",
    component: PageWrapper,
    props: {pageComponent: Monitoring}
  },
  {
    path: "/registrations",
    name: "Registrations",
    component: PageWrapper,
    props: {pageComponent: Registrations},
    children: [
      {
        path: '',
        name: 'RegistrationsList',
        component: RegistrationsList
      },
      {
        path: 'new',
        name: 'NewRegistration',
        component: RegistrationNew
      },      
      {
        path: 'registration/:id',
        name: 'ShowRegistration',
        component: RegistrationEdit
      }
    ]
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
  {
    path: "/hospitals",
    name: "Hospitals",
    component: PageWrapper,
    props: {pageComponent: Hospitals},
    children: [
      {
        path: '',
        name: 'HospitalsList',
        component: HospitalsList
      },
      {
        path: 'new',
        name: 'NewHospital',
        component: HospitalNew
      },      
      {
        path: 'hospital/:id',
        name: 'ShowHospital',
        component: HospitalEdit
      }
    ]
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;