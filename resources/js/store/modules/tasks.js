const state = {
  list: [],
};

const getters = {
  tasks: (state) => state.list,
};

const actions = {};

const mutations = {
  setTasks: (state, tasks) => state.list = tasks,
};

export default {
  state,
  getters,
  actions,
  mutations,
};
