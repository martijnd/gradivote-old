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
  login(state, payload) {
    state.user = payload;
    state.loggedIn = true;
  },
  setGradient(state, payload) {
    state.gradient = payload;
  }
};
