<script>
import AppHeader from './components/AppHeader.vue';
export default {
  components: {
    AppHeader,
  }
}

// import HelloWorld from './components/HelloWorld.vue'
// import TheWelcome from './components/TheWelcome.vue'
</script>

<template>
  <AppHeader />
  <router-view />
</template>

<style scoped>

</style>
