<template>
  <div>
    <Header />
    <div class="container-fluid">
      <RouterView />
    </div>
  </div>
</template>

<script>
  import Header from '../components/Layout/Header.vue';

  export default {
    components: {
      Header
    }
  }
</script>
