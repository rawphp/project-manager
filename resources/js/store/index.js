import {Store} from 'vuex';
import auth from './modules/auth';
import projects from './modules/projects';
import tasks from './modules/tasks';
import notifications from './modules/notifications';
import VuexPersistence from "vuex-persist";

const persistLocal = new VuexPersistence({
  storage: window.localStorage,
  reducer: (state) => ({
    ...state,
    auth: {
      loading: state.auth.loading,
      user: state.auth.user,
    },
  }),
});

export default () => {
  return new Store({
    state: {
      pagination: {
        page: 1,
        perPage: 10,
      },
    },
    mutations: {
      setCurrentPagination: (state, {page, perPage}) => state.pagination = {page, perPage},
    },
    modules: {
      auth,
      projects,
      tasks,
      notifications,
    },
    plugins: [persistLocal.plugin]
  });
};
