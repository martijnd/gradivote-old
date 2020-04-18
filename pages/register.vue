<template>
<div id="register-form" class="flex items-center justify-center flex-1">
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" style="min-width: 300px;">
      <h2 class="text-3xl font-bold text-center text-indigo-600">Gradivote</h2>
      <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">Name</label>
        <input
          class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="name"
          v-model="name"
          type="text"
          placeholder="Name"
        />
      </div>
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
      <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">Password</label>
        <input
          class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="password"
          v-model="password"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">Password Confirmation</label>
        <input
          class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="password_confirmation"
          v-model="password_confirmation"
          type="password"
          placeholder="Password Confirmation"
        />

        {{ errorMessage }}
      </div>
      <div class="flex items-center justify-center">
        <button
          @click="register"
          class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
          type="button"
        >REGISTER</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  middleware: 'guest',
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errorMessage: ''
    }
  },
  methods: {
    async register() {
      if (this.password === this.password_confirmation) {
          await this.$store.dispatch('register', {
            name: this.name,
          email: this.email,
          password: this.password
        });
        this.errorMessage = '';
        this.$router.push('/');
      } else {
        this.errorMessage = 'Passwords do not match!';
      }
    }
  }

}
</script>
