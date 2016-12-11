<template>
  <header class="main-header">

    <router-link to="/" class="logo">
      <span class="logo-mini"><b>A</b></span>
      <span class="logo-lg"><b>管理后台</b></span>
    </router-link>

    <!-- Header Navbar: style can be found in header.less -->
    <navigation></navigation>
  </header>
</template>

<script>
  import navigation from './navigation.vue'

  export default {
    components: {
      navigation
    }
  }
</script>

<style>

</style>
