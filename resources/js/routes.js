import DashboardComponent from "./views/Dashboard.vue";
import DocsComponent from './views/Docs.vue';
import LoginComponent from './views/Login.vue';
import ProfileComponent from './views/Profile.vue';
import ProjectCreateComponent from './views/project/ProjectCreate.vue';
import ProjectListComponent from './views/project/ProjectList.vue';
import ProjectShowComponent from './views/project/ProjectShow.vue';
import TaskCreateComponent from './views/task/TaskCreate.vue';
import TaskListComponent from './views/task/TaskList.vue';
import TaskShowComponent from './views/task/TaskShow.vue';

const routes = [
  {
    name: "dashboard",
    path: "/",
    component: DashboardComponent
  },
  {
    name: 'login',
    path: '/login',
    component: LoginComponent
  },
  {
    name: 'docs',
    path: '/docs',
    component: DocsComponent
  },
  {
    name: 'profile',
    path: '/profile',
    component: ProfileComponent,
  },
  {
    name: 'project-create',
    path: '/projects/create',
    component: ProjectCreateComponent,
  },
  {
    name: 'projects',
    path: '/projects',
    component: ProjectListComponent,
  },
  {
    name: 'project-show',
    path: '/projects/:id',
    component: ProjectShowComponent,
    props: true
  },
  {
    name: 'task-create',
    path: '/tasks/create',
    component: TaskCreateComponent,
  },
  {
    name: 'tasks',
    path: '/tasks',
    component: TaskListComponent,
  },
  {
    name: 'task-show',
    path: '/tasks/:id',
    component: TaskShowComponent,
    props: true
  }
];

export default routes;
