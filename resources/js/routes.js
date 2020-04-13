import HomeComponent from "./components/views/Home.vue";
import DocsComponent from './components/views/Docs.vue';
import LoginComponent from './components/views/Login.vue';
import ProfileComponent from './components/views/Profile.vue';

const routes = [
  {
    name: "home",
    path: "/",
    component: HomeComponent
  },
  {
    name: 'docs',
    path: '/docs',
    component: DocsComponent
  },
  {
    name: 'login',
    path: '/login',
    component: LoginComponent
  },
  {
    name: 'profile',
    path: '/profile',
    component: ProfileComponent
  }
];

export default routes;
