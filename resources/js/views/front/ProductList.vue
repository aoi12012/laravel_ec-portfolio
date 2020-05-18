<template>
  <div class="mt-3">
    <div class="d-flex flex-wrap">
      <Item v-for="(item, index) in items" :key=index :item=item />
    </div>
  </div>
</template>

<script>
  import Item from '../../components/Home/Item.vue';

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
            console.log(err);
            this.message = err;
          });
      }
    },
    components: {
      Item
    }
  }
</script>
