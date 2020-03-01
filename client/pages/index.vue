<template>
  <div class="flex flex-col min-h-screen" :style="'background: '+ gradient.data.rule">
    <Navbar />
    <LoginForm v-if="!loggedIn" />
    <VoteContainer v-if="loggedIn" />
  </div>
</template>

<script>
import LoginForm from '../components/LoginForm';
import VoteContainer from '../components/VoteContainer';
import Navbar from '../components/Navbar';

export default {
  components: { Navbar, LoginForm, VoteContainer },
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
