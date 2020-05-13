<template>
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="" alt="item name">
    <div class="card-body">
      <p class="card-title">{{ item.name }}<p>
      <p class="card-text">xxxxxxxx</p>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      item: Object
    }
}
</script>
