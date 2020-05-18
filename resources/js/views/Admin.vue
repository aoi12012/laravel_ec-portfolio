<template>
  <div>
    <Header />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-10 px-md-4">
          <RouterView />
        </main>
      </div>
    </div>
  </div>
</template>

<style scoped>
main {
  margin-left: 200px;
}
</style>

<script>
  import Header from '../components/Layout/admin/Header.vue';
  import Sidebar from '../components/Layout/admin/Sidebar.vue';

  export default {
    components: {
      Header,
      Sidebar,
    }
  }
</script>
