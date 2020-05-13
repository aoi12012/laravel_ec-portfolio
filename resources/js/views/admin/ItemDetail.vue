<template>
  <div>
    <h1>商品管理</h1>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <p class="mb-0">商品画像</p>
          <figure class="figure border" style="width: 250px; height: 250px;">
            <img
               :src="item.detail.thumbnail"
               class="figure-img img-fluid rounded d-block mx-auto"
               style="max-width: 250px; max-height: 250px;"
            >
          </figure>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="itemName">商品名</label>
            <span class="form-control">{{ item.detail.name }}</span>
          </div>
          <div class="form-group">
            <label for="itemNameKana">商品名(カナ)</label>
            <span class="form-control">{{ item.detail.name_kana }}</span>
          </div>
          <div class="form-group">
            <label for="discription">商品説明</label>
            <span class="form-control" rows="5">{{ item.detail.description }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="price">販売価格</label>
            <input type="text" class="form-control" id="price">
          </div>
        </div>
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
    }
  }
</script>
