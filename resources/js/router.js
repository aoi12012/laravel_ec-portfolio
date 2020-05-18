import Vue from 'vue';
import Router from 'vue-router';
import Index from './views/Index.vue';
import Login from './views/front/Login.vue';
import ProductList from './views/front/ProductList.vue';
import ProductSearch from './views/front/ProductSearch.vue';
import ProductDetail from './views/front/ProductDetail.vue';

import Admin from './views/Admin.vue';
import ItemList from './views/admin/ItemList.vue';
import ItemDetail from './views/admin/ItemDetail.vue';
import ItemRegist from './views/admin/ItemRegist.vue';
import ItemEdit from './views/admin/ItemEdit.vue';

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
      component: Index,
      children: [
        {
          path: '/login',
          name: 'login',
          component: Login
        },
        {
          path: '/',
          name: 'productList',
          component: ProductList
        },
        {
          path: '/product/:id',
          name: 'productDetail',
          component: ProductDetail
        },
        {
          path: '/product/search/:param',
          name: 'productSearch',
          component: ProductSearch
        },
      ]
    },
    {
      path: '/admin',
      component: Admin,
      children: [
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
        {
          path: '/admin/items/:id/edit',
          name: 'itemEdit',
          component: ItemEdit
        }
      ]
    },
  ]
});
