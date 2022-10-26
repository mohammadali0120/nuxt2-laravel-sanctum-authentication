<template>
  <div>
    <div class="mb-6 py-4 bg-black">
      <div class="container">
        <ul class="flex items-center -mx-2">
          <li class="text-white font-bold mx-2">
            <nuxt-link to="/">Home</nuxt-link>
          </li>
          <li class="text-white font-bold mx-2">
            <nuxt-link to="/products">Products</nuxt-link>
          </li>

          <template v-if="$auth.loggedIn">
            <li class="text-white font-bold mx-2">
              <nuxt-link to="/verification">Verification</nuxt-link>
            </li>
          </template>
          <template v-if="!$auth.loggedIn">
            <div class="flex items-center ml-auto">
              <li class="text-white font-bold mx-2">
                <nuxt-link to="/login">Login</nuxt-link>
              </li>
              <li class="text-white font-bold mx-2">
                <nuxt-link to="/register">Register</nuxt-link>
              </li>
            </div>
          </template>
          <template v-else>
            <li
              class="text-white font-bold mx-2 cursor-pointer ml-auto"
              @click="onLogout"
            >
              Logout
            </li>
          </template>
        </ul>
      </div>
    </div>
    <div class="container">
      <Nuxt />
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    async onLogout() {
      await this.$axios.post('/api/logout', this.$auth.user)

      await this.$auth.logout() // it will clear the cookies

      window.location.reload()
    },
  },
}
</script>

<style></style>
