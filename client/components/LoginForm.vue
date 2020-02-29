<template>
  <div id="login-form" class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="email"
          v-model="email"
          type="text"
          placeholder="E-mail"
        />
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
          v-model="password"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="flex items-center justify-between">
        <button
          @click="login"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button"
        >Sign In</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: 'will.lonie@example.com',
      password: 'password'
    };
  },
  methods: {
    async login() {
      const response = await this.$axios({
        method: 'post',
        url: '/login',
        data: {
          email: this.email,
          password: this.password
        }
      });

      this.$store.commit('login', response.data);
    }
  }
};
</script>
