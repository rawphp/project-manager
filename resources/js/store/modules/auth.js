import axios from 'axios';

const state = {
  credentials: {
    email: null,
    password: null,
  },
  user: null,
};

const getters = {
  currentUser: (state) => state.user,
};

const actions = {
  async authenticate({commit, dispatch}) {
    return dispatch('setCsrfCookie')
      .catch((error) => {
        const message = {
          type: 'error',
          message: `There was a problem: ${error.message}`,
        };

        dispatch('addNotification', message);
      });
  },
  async setCsrfCookie({dispatch}) {
    const response = await axios.get('/sanctum/csrf-cookie');

    if (response.status === 204) {
      return dispatch('setAuthCookie')
    } else {
      const message = {
        type: 'error',
        message: `There was a problem in the authentication process.`,
      };

      dispatch('addNotification', message);
    }
  },
  async setAuthCookie({dispatch, state}) {
    const response = await axios.post('/api/v1/login', state.credentials);

    if (response.status === 204) {
      const message = {
        type: 'success',
        message: `You have been authenticated successfully.`,
      };

      dispatch('addNotification', message);

      return dispatch('getCurrentUser');
    } else {
      const message = {
        type: 'error',
        message: `There was a problem in the authentication process.`,
      };

      dispatch('addNotification', message);
    }
  },
  async getCurrentUser({commit, dispatch}) {
    const response = await axios.get('/api/v1/current-user');

    if (response.status === 200) {
      commit('setCurrentUser', response.data.data);

      return response.data.data;
    } else {
      const message = {
        type: 'error',
        message: `There was a problem fetching current user.`,
      };

      dispatch('addNotification', message);
    }
  },
  async logout({commit, dispatch}) {
    const response = await axios.get('/api/v1/logout');
    let message;

    if (response.status === 204) {
      commit('setCredentials', null);
      commit('setCurrentUser', null);

      message = {
        type: 'success',
        message: `You have successfully logged out.`,
      };
    } else {
      message = {
        type: 'error',
        message: `Something went wrong in logging your out.`,
      };
    }

    dispatch('addNotification', message);
  }
};

const mutations = {
  setCredentials: (state, credentials) => state.credentials = credentials,
  setCurrentUser: (state, user) => state.user = user,
};

export default {
  state,
  getters,
  actions,
  mutations,
};
