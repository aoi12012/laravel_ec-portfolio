<template>
  <nav id="sidebarMenu" class="sidebar col-2 bg-light border-right">
    <div class="sidebar-sticky pt-3">
      <ul class="sudebar nav flex-column">
        <li class="nav-item">
          <router-link class="sidebar-link d-block" :to="{name: 'itemList'}">商品管理</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<style scoped>
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left:0;
  padding: 48px 0 0;
}
</style>
