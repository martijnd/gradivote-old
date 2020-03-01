<template>
  <div class="flex justify-between">
    <nuxt-link to="/" class="p-4 text-lg font-bold text-white">{{ user ? user.name : 'Gradivote' }}</nuxt-link>
    <div>
      <nuxt-link
        to="/profile"
        class="p-4 mr-4 font-bold text-white rounded hover:bg-white hover:text-black"
        @click="logOut"
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
    }
  },

  methods: {
    logOut() {
      this.$store.dispatch('logOut');
    }
  }
};
</script>
