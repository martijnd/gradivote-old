<template>
  <div id="login-form" class="flex items-center justify-center flex-1">
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" style="min-width: 300px;">
      <h2 class="text-3xl font-bold text-center text-indigo-600">Gradivote</h2>
      <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">E-mail</label>
        <input
          class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="email"
          v-model="email"
          type="text"
          placeholder="E-mail"
        />
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">Password</label>
        <input
          class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="password"
          v-model="password"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="flex items-center justify-center">
        <button
          @click="login"
          class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
          type="button"
        >SIGN IN TO VOTE</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: 'porter48@example.net',
      password: 'password'
    };
  },
  methods: {
    async login() {
      this.$store.dispatch('login', {
        email: this.email,
        password: this.password
      });
    }
  }
};
</script>
