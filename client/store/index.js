export const state = () => ({
  user: null,
  loggedIn: false,
  error: { message: '' },
  gradient: {
    data: {
      id: 1,
      rule: 'linear-gradient(9deg, rgb(255, 131, 239), rgb(173, 93, 161) 100%);'
    },
    upvotes: 0,
    downvotes: 0
  }
});

export const mutations = {
  login(state, user) {
    state.user = user;
    state.loggedIn = true;
  },
  logOut(state) {
    state.user = null;
    state.loggedIn = false;
  },
  getGradient(state, gradient) {
    state.gradient = gradient;
  },
  setErrorMessage(state, message) {
    console.log(state.error, message);
    state.error.message = message;
  }
};

export const actions = {
  async login({ commit, dispatch }, data) {
    const response = await this.$axios({
      method: 'post',
      url: '/login',
      data
    });
    commit('login', response.data);
    dispatch('getGradient');
  },

  logOut({ commit }) {
    commit('logOut');
  },
  async getGradient({ commit, state }) {
    const response = await this.$axios({
      method: 'get',
      url: '/gradient',
      headers: {
        Authorization: `Bearer ${state.user.api_token}`
      }
    });
    console.log(response);
    if (response.status === 200) {
      commit('getGradient', response.data);
    } else {
      commit('setErrorMessage', response.data);
    }
  },

  async vote({ dispatch, state }, type) {
    const response = await this.$axios({
      method: 'post',
      url: `/gradients/${state.gradient.data.id}/vote`,
      headers: {
        Authorization: `Bearer ${state.user.api_token}`
      },
      data: { type }
    });

    // After voting, fetch a new gradient
    dispatch('getGradient');
  }
};
