<template>
  <div class="flex flex-col flex-1">
    <LoginForm />
  </div>
</template>

<script>

export default {
  middleware: 'guest',
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
