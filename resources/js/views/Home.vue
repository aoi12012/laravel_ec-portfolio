<template>
  <div>
    <h1>Home Page</h1>
    <div class="d-flex">
      <Item v-for="(item, index) in items" :key=index :item=item />
    </div>
  </div>
</template>

<script>
  import Item from '../components/Home/Item.vue';

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
          .get('/api/items')
          .then(response => {
            console.log(response);
            this.items = response.data;
          })
          .catch(err => {
            this.message = err;
          });
      }
    },
    components: {
      Item
    }
  }
</script>
