<template>
  <div id="vote-container" class="flex flex-col items-center justify-center flex-1">
    <div>
      <div class="text-2xl font-bold text-red-800" v-if="errorMessage.length">{{errorMessage}}</div>
      <div v-else>
        <button
          @click="vote('UPVOTE')"
          class="px-8 py-2 text-6xl font-bold text-white rounded-lg hover:bg-green-700 focus:outline-none"
          type="button"
        >👍</button>
        <button
          @click="vote('DOWNVOTE')"
          class="px-8 py-2 text-6xl font-bold text-white rounded-lg hover:bg-red-700 focus:outline-none"
          type="button"
        >👎</button>
        <div id="stats-container" class="px-8 py-4 mt-6 bg-white rounded shadow-lg">
          <h3 class="text-xl font-bold">Stats</h3>
          <hr class="mb-2" />
          <p class="text-green-700">{{gradient.upvotes }} UPVOTES</p>
          <p class="text-red-700">{{gradient.downvotes }} DOWNVOTES</p>
          <p class="mt-2 text-lg font-bold">{{gradient.upvotes - gradient.downvotes }} points</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    user() {
      return this.$store.state.user;
    },
    gradient() {
      return this.$store.state.gradient;
    },
    errorMessage() {
      return this.$store.state.error.message;
    }
  },
  methods: {
    vote(type) {
      this.$store.dispatch('vote', type);
    }
  }
};
</script>
