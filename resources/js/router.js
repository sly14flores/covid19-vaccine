import { createWebHashHistory, createRouter } from "vue-router";

import PageWrapper from './PageWrapper.vue';

// import Dashboard from "./pages/dashboard/Dashboard.vue";
import LandingPage from "./pages/landing-page.vue";
import SummaryRegistrations from "./pages/summary/registrations.vue";
import Vaccination from "./pages/summary/vaccination.vue";
import Surveys from "./pages/summary/surveys.vue";
import Vaccines from "./pages/scanners/vaccines.vue";

// vaccines
import VaccineWrapper from "./pages/vaccines/wrapper.vue";
import VaccinePhase from "./pages/vaccines/phase.vue";
import QueryScreening from "./pages/vaccines/QueryScreening.vue";
import QueryInoculation from "./pages/vaccines/QueryInoculation.vue";
import QueryMonitoring from "./pages/vaccines/QueryMonitoring.vue";
import Screening from "./pages/vaccines/screening.vue";
import Inoculation from "./pages/vaccines/inoculation.vue";
import Monitoring from "./pages/vaccines/monitoring.vue";

// reports
import ReportWrapper from "./pages/reports/Wrapper.vue";
import ReportPhase from "./pages/reports/Phase.vue";
import Vas from "./pages/reports/Vas.vue";
import Deferred from "./pages/reports/Deferred.vue";
import Schedule from "./pages/reports/Schedule.vue";
import Aefi from "./pages/reports/Aefi.vue";
import VaccinationCard from "./pages/reports/VaccinationCard.vue";
import VaccinationCertificate from "./pages/reports/VaccinationCertificate.vue";
import Certificate from "./pages/reports/Certificate.vue";
import Card from "./pages/reports/Card.vue";

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
    path: "/vaccines",
    name: "VaccineFlow",
    component: PageWrapper,
    props: {pageComponent: VaccineWrapper},
    children: [
      {
        path: "list/screening",
        name: "QueryScreening",
        component: VaccinePhase,
        props: {pageComponent: QueryScreening},
      },
      {
        path: "list/inoculation",
        name: "QueryInoculation",
        component: VaccinePhase,
        props: {pageComponent: QueryInoculation},
      },
      {
        path: "list/monitoring",
        name: "QueryMonitoring",
        component: VaccinePhase,
        props: {pageComponent: QueryMonitoring},
      },
      {
        path: "screening/:qr/:next_dose",
        name: "Screening",
        component: VaccinePhase,
        props: {pageComponent: Screening},
      },
      {
        path: "inoculation/:qr",
        name: "Inoculation",
        component: VaccinePhase,
        props: {pageComponent: Inoculation},
      },
      {
        path: "monitoring/:qr",
        name: "Monitoring",
        component: VaccinePhase,
        props: {pageComponent: Monitoring},
      }
    ]
  },
  {
    path: "/reports",
    name: "Reports",
    component: PageWrapper,
    props: {pageComponent: ReportWrapper},
    children: [
      {
        path: "list/vas",
        name: "Vas",
        component: ReportPhase,
        props: {pageComponent: Vas},
      },
      {
        path: "list/deferred",
        name: "Deferred",
        component: ReportPhase,
        props: {pageComponent: Deferred},
      },
      {
        path: "list/schedule",
        name: "Schedule",
        component: ReportPhase,
        props: {pageComponent: Schedule},
      },
      {
        path: "list/aefi",
        name: "AEFI",
        component: ReportPhase,
        props: {pageComponent: Aefi},
      },
      {
        path: "list/card",
        name: "Vaccination Card",
        component: ReportPhase,
        props: {pageComponent: VaccinationCard},
      },
      {
        path: "list/certificate",
        name: "Vaccination Certificate",
        component: ReportPhase,
        props: {pageComponent: VaccinationCertificate},
      },
      {
        path: "certificate/:qr",
        name: "Certificate",
        component: ReportPhase,
        props: {pageComponent: Certificate},
      },
      {
        path: "card/:qr",
        name: "Card",
        component: ReportPhase,
        props: {pageComponent: Card},
      },
    ]
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