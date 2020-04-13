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
  async authenticate({dispatch}) {
    return dispatch('setCsrfCookie');
  },
  async setCsrfCookie({dispatch}) {
    const response = await axios.get('/sanctum/csrf-cookie');

    if (response.status === 204) {
      return dispatch('setAuthCookie')
    }
  },
  async setAuthCookie({dispatch, state}) {
    const response = await axios.post('/api/v1/login', state.credentials);

    if (response.status === 204) {
      return dispatch('getCurrentUser');
    }
  },
  async getCurrentUser({commit}) {
    const response = await axios.get('/api/v1/current-user');

    commit('setCurrentUser', response.data.data);

    return response.data.data;
  },
  async logout({commit, dispatch}) {
    const response = await axios.get('/api/v1/logout');

    if (response.status === 204) {
      commit('setCredentials', null);
      commit('setCurrentUser', null);
    }
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
