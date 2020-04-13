const state = {
  list: [],
};

const getters = {
  projects: (state) => state.list,
};

const actions = {};

const mutations = {
  setProjects: (state, projects) => state.list = projects,
};

export default {
  state,
  getters,
  actions,
  mutations,
};
