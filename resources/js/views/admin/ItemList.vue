<template>
  <div>
    <div class="d-flex justify-content-between flex-nowrap border-bottom mt-4 mb-2">
      <h1>商品管理</h1>
      <div class="btn-toolbar">
        <router-link :to="{ name: 'itemRegist'}" class="btn btn-secondary float-right mb-2">商品登録</router-link>
      </div>
    </div>
    <div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">商品コード</th>
            <th scope="col">商品名</th>
            <th scope="col">販売状況</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items">
            <td><router-link :to="{ name: 'itemDetail', params: { id: item.item_id }}">{{ item.item_id }}</router-link></td>
            <td>{{ item.name }}</td>
            <td>販売中</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        items: {},
        message: ''
      };
    },
    created: function() {
      this.getItem();
    },
    methods: {
      getItem() {
        axios
          .get('/api/admin/items')
          .then(response => {
            console.log(response);
            this.items = response.data;
          })
          .catch(err => {
            this.message = err;
          });
      }
    }
  }
</script>
