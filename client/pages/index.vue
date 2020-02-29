<template>
  <div class="min-h-screen flex flex-wrap mb-4" :style="'background: '+ gradient.data.rule">
    <LoginForm v-if="!loggedIn" />
    <div v-if="loggedIn">
      {{ user.name }}
      <button
        @click="vote('UPVOTE')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="button"
      >👍</button>
      <button
        @click="vote('DOWNVOTE')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="button"
      >👎</button>
      <div class="block">
        <p>👍: {{gradient.upvotes }}👎: {{gradient.downvotes }}</p>
        <p>Total: {{gradient.upvotes - gradient.downvotes }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import LoginForm from '../components/LoginForm';

export default {
  components: { LoginForm },
  computed: {
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.loggedIn;
    },
    api_token() {
      return this.$store.state.user.api_token;
    },
    gradient() {
      return this.$store.state.gradient;
    }
  },
  methods: {
    async getGradient() {
      const response = await this.$axios({
        method: 'get',
        url: '/gradient',
        headers: {
          Authorization: `Bearer ${this.api_token}`
        }
      });
      this.$store.commit('setGradient', response.data);
    },
    async vote(type) {
      const response = await this.$axios({
        method: 'post',
        url: `/gradients/${this.gradient.data.id}/vote`,
        headers: {
          Authorization: `Bearer ${this.api_token}`
        },
        data: { type }
      });

      this.getGradient();
    }
  }
};
</script>
