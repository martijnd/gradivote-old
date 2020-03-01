<template>
  <div class="container p-4 mx-auto mt-4 bg-white rounded shadow">
    <h2 class="mb-4 text-2xl font-bold text-center text-indigo-700">Votes</h2>
    <div class="flex flex-wrap">
      <div class="w-1/4 p-2" v-for="vote of votes" :key="vote.id">
        <div
          class="px-2 py-6 font-bold text-center shadow-lg"
          :class="vote.type === 'UPVOTE' ? 'text-green-300' : 'text-red-300'"
          :style="`background: ${vote.gradient.rule}`"
        >{{ vote.type}}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      votes: []
    };
  },
  computed: {
    api_token() {
      return this.$store.state.user.api_token;
    },
    loggedIn() {
      return this.$store.state.loggedIn;
    }
  },
  methods: {
    async getVotes() {
      const response = await this.$axios({
        method: 'get',
        url: '/user/votes',
        headers: {
          Authorization: `Bearer ${this.api_token}`
        }
      });
      this.votes = response.data;
    }
  },
  mounted() {
    if (this.loggedIn) {
      this.getVotes();
    } else {
      this.$router.push({
        path: '/'
      });
    }
  }
};
</script>
