<template>
  <main>
    <div class="row mt-5">
      <div class="col-6">
        <figure class="figure" style="width: 100%; height: 100%;">
          <img
             :src="item.thumbnail"
             class="figure-img img-fluid rounded d-block mx-auto"
             style="max-height: 600px"
          >
        </figure>
      </div>
      <div class="col-3">
        <div>
          <p>{{ item.name }}</p>
        </div>
        <hr>
        <div>価格: &yen {{ item.base_price | addComma }}</div>
        <div>
          <div>商品説明</div>
          <div style="white-space:pre-wrap; word-wrap:break-word;">{{ item.description }}</div>
        </div>
      </div>
      <div class="col-3">
        <div class="border">
          <div>価格: &yen {{ item.base_price | addComma }}</div>
          <div class="mb-2">
            <button class="btn btn-sm btn-warning mx-auto d-block p-1" style="width: 80%;">
              <span class="float-left text-light bg-dark rounded p-1" style="width: 25px; height: 25px;">
                <Icon name="shopping-cart" />
              </span>
              <span class="align-middle d-block" style="padding: 4px 0">
                カートに入れる
              </span>
            </button>
          </div>
          <div class="mb-2">
            <button class="btn btn-sm mx-auto d-block p-1" style="width: 80%; background: #f6993f;">
              <span class="float-left text-light bg-dark rounded" style="width: 25px; height: 25px; padding: 2px 0;">
                <Icon name="caret-right" />
              </span>
              <span class="align-middle d-block" style="padding: 4px 0">
                すぐに買う
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
    </div>
  </main>
</template>

<script>
  import Icon from 'vue-awesome/components/Icon';

  export default {
    data() {
      return {
        item: {},
        message: ''
      };
    },
    components: {
      Icon
    },
    mounted: function() {
      this.getItem();
    },
    methods: {
      getItem() {
        axios
          .get(`/api/items/${this.$route.params.id}`)
          .then(response => {
            console.log(response);
            this.item = response.data;
          })
          .catch(err => {
            this.message = err;
          });
      }
    }
  }
</script>
