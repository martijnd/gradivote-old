<template>
  <div class="container p-4 mx-auto mt-4 bg-white rounded shadow">
    <h2 class="mb-4 text-2xl font-bold text-center text-indigo-700">Votes</h2>
    <div class="flex flex-wrap" v-if="!loading">
      <div class="w-1/4 p-2" v-for="vote of votes" :key="vote.id">
        <div
          class="px-2 py-6 font-bold text-center shadow-lg"
          :class="vote.type === 'UPVOTE' ? 'text-green-300' : 'text-red-300'"
          :style="`background: ${vote.gradient.rule}`"
        >{{ vote.type}}</div>
      </div>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  data() {
    return {
      loading: false
    }
  },
  computed: {
    api_token() {
      return this.$store.state.user.api_token;
    },
    loggedIn() {
      return this.$store.state.loggedIn;
    },
    votes() {
      return this.$store.state.userVotes;
    }
  },
  methods: {
    async getVotes() {
      this.loading = true;
      await this.$store.dispatch('getUserVotes');
      this.loading = false;
    }
  },
  mounted() {
    this.loading = false;
    this.getVotes();
  }
};
</script>
