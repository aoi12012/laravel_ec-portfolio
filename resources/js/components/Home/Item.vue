<template>
  <router-link class="text-decoration-none ml-2 mb-2" :to="{name: 'productDetail', params: {'id' : item.item_id}}">
    <div class="card" style="width: 18rem;">
      <div class="card-img-top rounded ms-auto overflow-hidden" style="max-width: 100%; height: 200px;">
        <img :src="item.thumbnail" style="width: 100%; height: auto;">
      </div>
      <div class="card-body border-top">
        <p class="card-title">{{ item.name }}<p>
        <p class="card-text">価格: &yen{{ item.price | addComma }}</p>
      </div>
    </div>
  </router-link>
</template>

<script>
  export default {
    props: {
      item: Object
    }
}
</script>
