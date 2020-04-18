<template>
  <div class="flex justify-between">
    <nuxt-link to="/" class="p-4 text-lg font-bold text-white">{{ $auth.user ? $auth.user.name : 'Gradivote' }}</nuxt-link>
    <nuxt-link
      v-if="!loggedIn"
      to="/register"
      class="p-4 font-bold text-white rounded hover:bg-white hover:text-black"
    >Register</nuxt-link>
    <div v-if="loggedIn">
      <nuxt-link
        to="/profile"
        class="p-4 mr-4 font-bold text-white rounded hover:bg-white hover:text-black"
      >Profile</nuxt-link>
      <button
        class="p-4 font-bold text-white rounded hover:bg-white hover:text-black"
        @click="logOut"
      >Sign out</button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.auth.loggedIn;
    }
  },

  methods: {
    async logOut() {
     await this.$auth.logout();
    }
  }
};
</script>
