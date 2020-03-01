export const state = () => ({
  user: null,
  loggedIn: false,
  gradient: {
    data: {
      id: 1,
      rule: 'linear-gradient(61deg, #5d66da, #c6dd00 100%);'
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
  getGradient(state, gradient) {
    state.gradient = gradient;
  }
};

export const actions = {
  async login({ commit, dispatch }, data) {
    console.log(data);
    const response = await this.$axios({
      method: 'post',
      url: '/login',
      data
    });
    commit('login', response.data);
    dispatch('getGradient');
  },
  async getGradient({ commit, state }) {
    const response = await this.$axios({
      method: 'get',
      url: '/gradient',
      headers: {
        Authorization: `Bearer ${state.user.api_token}`
      }
    });

    commit('getGradient', response.data);
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
