<template>
  <div class="mt-3">
    <div class="d-flex">
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
        console.log('aaaa');
        axios
          .get(`/api/search/${this.$route.params.param}`)
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
