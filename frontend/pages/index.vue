<template>
  <div>
    <div v-if="$auth.loggedIn">
      <p>Hi <strong>{{ $auth.user }}</strong>, Welcome</p>
    </div>
    <div v-else>Hi Welcome</div>
  </div>
</template>

<script>
export default {
  name: 'IndexPage',
}
</script>
