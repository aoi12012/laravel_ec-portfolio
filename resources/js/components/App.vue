<template>
  <div>
    <Header />
    <main>
      <div class="container">
        <RouterView />
      </div>
    </main>
  </div>
</template>

<script>
  import Header from './Header.vue';

  export default {
    components: {
      Header
    }
  }
</script>
