import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import ItemList from './views/admin/ItemList.vue';
import ItemDetail from './views/admin/ItemDetail.vue';
import ItemRegist from './views/admin/ItemRegist.vue';
import NotFound from './views/NotFound.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '*',
      component: NotFound
    },
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/admin/items',
      name: 'itemList',
      component: ItemList
    },
    {
      path: '/admin/items/regist',
      name: 'itemRegist',
      component: ItemRegist
    },
    {
      path: '/admin/items/:id',
      name: 'itemDetail',
      component: ItemDetail
    },
  ]
});
