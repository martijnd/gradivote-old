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
  ON_AUTH_STATE_CHANGED_MUTATION(state, { authUser, claims }) {
    // you can request additional fields if they are optional (e.g. photoURL)
    const { uid, email, emailVerified, displayName, photoURL } = authUser

    state.authUser = {
      uid,
      displayName,
      email,
      emailVerified,
      photoURL: photoURL || null, // results in photoURL being null for server auth
      // use custom claims to control access (see https://firebase.google.com/docs/auth/admin/custom-claims)
      isAdmin: claims.custom_claim
    }
  }
  login(state, user) {
    state.user = user;
    state.loggedIn = true;
  },
  logOut(state) {
    state.user = null;
    state.loggedIn = false;
    state.error.message = '';
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
  async onAuthStateChangedAction({ commit, dispatch }, { authUser, claims }) {
    if (!authUser) {
      await dispatch('cleanupAction')

      return
    }

    // you can request additional fields if they are optional (e.g. photoURL)
    const { uid, email, emailVerified, displayName, photoURL } = authUser

    commit('SET_USER', {
      uid,
      email,
      emailVerified,
      displayName,
      photoURL, // results in photoURL being undefined for server auth
      // use custom claims to control access (see https://firebase.google.com/docs/auth/admin/custom-claims)
      isAdmin: claims.custom_claim
    })
  }


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

    setGradient(response, commit);
  },

  async vote({ commit, state }, type) {
    const response = await this.$axios({
      method: 'post',
      url: `/gradients/${state.gradient.data.id}/vote`,
      headers: {
        Authorization: `Bearer ${state.user.api_token}`
      },
      data: { type }
    });

    setGradient(response, commit);
  }
};

const setGradient = (response, commit) => {
  if (response.status === 200) {
    commit('getGradient', response.data);
  } else {
    commit('setErrorMessage', response.data);
  }
};
