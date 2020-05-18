<template>
  <div>
    <div class="d-flex justify-content-between flex-nowrap border-bottom mt-4 mb-2">
      <h1>商品管理</h1>
      <div class="btn-toolbar">
        <router-link :to="{ name: 'itemEdit'}" class="btn btn-secondary float-right mb-2">編集</router-link>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <p class="mb-0">商品画像</p>
          <figure class="figure border" style="width: 250px; height: 250px;">
            <img
               :src="item.thumbnail"
               class="figure-img img-fluid rounded d-block mx-auto"
               style="max-width: 250px; max-height: 250px;"
            >
          </figure>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="itemName">商品名</label>
            <span class="form-control">{{ item.name }}</span>
          </div>
          <div class="form-group">
            <label for="itemNameKana">商品名(カナ)</label>
            <span class="form-control">{{ item.name_kana }}</span>
          </div>
          <div class="form-group">
            <label for="discription">商品説明</label>
            <span class="form-control" style="white-space:pre-wrap; word-wrap:break-word; min-height: 37px; height: auto;">{{ item.description }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>販売価格</label>
            <span class="form-control">{{ item.base_price | addComma }}</span>
          </div>
        </div>
      </div>
      <div>
        <button class="btn btn-secondary" @click="deleteItem">削除</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        item: null
      };
    },
    created: function() {
      this.getItem();
    },
    methods: {
      getItem() {
        axios
          .get(`/api/admin/items/${this.$route.params.id}`)
          .then(response => {
            this.item = response.data;
            console.log(this.item);
          })
          .catch(err => {
            this.message = err;
          });
      },
      deleteItem() {
        axios
          .delete(`/api/admin/items/${this.$route.params.id}`)
          .then(response => {
            console.log(response);
            window.location.href = "/admin/items";
          })
          .catch(err => {
            console.log(err);
            this.message = err;
          });
      },
    }
  }
</script>
