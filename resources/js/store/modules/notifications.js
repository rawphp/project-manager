const state = {
  items: [],
};

let nextId = 1;

const getters = {};

const actions = {
  addNotification: ({commit}, message) => {
    commit('pushNotification', message);
  },
  removeNotification: ({commit}, messageId) => {
    commit('deleteNotification', messageId);
  }
};

const mutations = {
  pushNotification: (state, message) => state.items.push({
    id: nextId++,
    ...message,
  }),
  deleteNotification: (state, messageId) => state.items = state.items.filter((m) => m.id !== messageId),
};

export default {
  state,
  getters,
  actions,
  mutations,
};
