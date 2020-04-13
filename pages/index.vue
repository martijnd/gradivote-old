<template>
  <div class="flex flex-col flex-1">
    <LoginForm v-if="!loggedIn" />
    <VoteContainer v-if="loggedIn" />
  </div>
</template>

<script>
import LoginForm from '../components/LoginForm';
import VoteContainer from '../components/VoteContainer';

export default {
  components: { LoginForm, VoteContainer },
  computed: {
    loggedIn() {
      return this.$store.state.loggedIn;
    },
    gradient() {
      return this.$store.state.gradient;
    }
  }
};
</script>
