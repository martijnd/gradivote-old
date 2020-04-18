<template>
  <div class="flex flex-col flex-1">
    <LoginForm />
  </div>
</template>

<script>
import LoginForm from '@/components/LoginForm.vue';


export default {
  middleware: 'guest',
  components: { LoginForm },
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
