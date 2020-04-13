import {Store} from 'vuex';
import auth from './modules/auth';
import projects from './modules/projects';
import tasks from './modules/tasks';
import VuexPersistence from "vuex-persist";

const persistLocal = new VuexPersistence({
  storage: window.localStorage,
  reducer: (state) => ({
      ...state,
      auth: {
        user: state.auth.user,
      }
    }),
});

export default () => {
  return new Store({
    modules: {
      auth,
      projects,
      tasks,
    },
    plugins: [persistLocal.plugin]
  });
};
