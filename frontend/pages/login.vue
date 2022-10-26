<template>
  <div>
    <div class="mb-6">
      <h1 class="text-2xl font-bold">Login</h1>
    </div>
    <form @submit.prevent="onSubmit">
      <div class="mb-6">
        <input
          v-model="form.email"
          type="email"
          class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
          placeholder="Email address"
          required
        />
      </div>

      <div class="mb-6">
        <input
          v-model="form.password"
          type="password"
          class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
          placeholder="Password"
          required
        />
      </div>

      <div class="text-center lg:text-left">
        <button
          class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >
          Login
        </button>
        <p class="text-sm font-semibold mt-2 pt-1 mb-0">
          Don't have an account?
          <nuxt-link
            to="/register"
            class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
            >Register</nuxt-link
          >
        </p>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'LoginPage',
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    }
  },
  methods: {
    async onSubmit() {
      try {
        const response = await this.$auth.loginWith('laravelSanctum', {
          data: this.form,
        })
        console.log('Login response', response)
        window.location.replace('/')
      } catch (err) {
        console.log(err)
      }
    },
  },
}
</script>

<style></style>
