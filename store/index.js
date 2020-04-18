export const state = () => ({
  error: { message: '' },
  userVotes: [],
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
  getGradient(state, gradient) {
    state.gradient = gradient;
  },
  setErrorMessage(state, message) {
    console.log(state.error, message);
    state.error.message = message;
  },
  setUserVotes(state, votes) {
    state.userVotes = votes;
  }
};

export const actions = {
  async getGradient({ commit, state }) {
    const response = await this.$axios({
      method: 'get',
      url: 'api/gradient',
      headers: {
        Authorization: `Bearer ${state.user.api_token}`
      }
    });

    setGradient(response, commit);
  },

  async vote({ commit, state }, type) {
    const response = await this.$axios({
      method: 'post',
      url: `api/gradients/${state.gradient.data.id}/vote`,
      data: { type }
    });

    setGradient(response, commit);
  },

  async getUserVotes({commit, state}) {
    const response = await this.$axios({
      method: 'get',
      url: 'api/user/votes',
    });

    commit('setUserVotes', response.data);
  }
};

const setGradient = (response, commit) => {
  if (response.status === 200) {
    commit('getGradient', response.data);
  } else {
    commit('setErrorMessage', response.data);
  }
};
