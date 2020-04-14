import axios from "axios";

const state = {
  pagination: {
    total: 0,
    count: 0,
    page: 1,
    perPage: 10,
  },
  list: [],
};

const getters = {
  projectPagination: state => state.pagination,
  projects: (state) => state.list,
};

const actions = {
  async fetchProjects({commit, dispatch}, {page, perPage}) {
    const response = await axios.get(`/api/v1/projects?page=${page}&perPage=${perPage}`);

    if (response.status === 200) {
      commit('setProjects', response.data.data);
      commit('setProjectPagination', {
        total: +response.data.total,
        page: +response.data.current_page,
        perPage: +response.data.per_page,
      })
    } else {
      const message = {
        type: 'error',
        message: `There was a problem fetching projects.`,
      };

      dispatch('addNotification', message);
    }
  }
};

const mutations = {
  setProjects: (state, projects) => state.list = projects,
  setProjectPagination: (state, pagination) => {
    state.pagination = {
      ...state.pagination,
      ...pagination,
    };
  }
};

export default {
  state,
  getters,
  actions,
  mutations,
};
