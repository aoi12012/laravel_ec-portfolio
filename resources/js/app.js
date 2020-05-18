require('./bootstrap');
import 'vue-awesome/icons';

import Vue from 'vue';
import router from './router';

import App from './components/App';

Vue.filter('addComma', function(val) {
  return val?.toLocaleString();
})


new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App />'
})
