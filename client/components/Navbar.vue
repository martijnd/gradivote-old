<template>
  <div class="flex justify-between">
    <h2 class="p-4 text-lg font-bold text-white">{{ user ? user.name : 'Gradivote' }}</h2>
    <button
      class="p-3 m-1 font-bold text-white rounded hover:bg-white hover:text-black"
      @click="logOut"
    >Sign out</button>
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
