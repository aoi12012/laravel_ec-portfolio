<template>
  <header>
    <nav class="navbar navbar-indigo bg-dark sticky-top flex-nowrap">
      <router-link class="navbar-brand" to="/">Protfolio</router-link>
      <div class="form-inline float-left">
        <input class="form-control" v-model="form.search">
        <button class="btn btn-outline-success" @click="search">
          検索
        </button>
      </div>
      <div>
        <span class="p-2 nav-item dropdown d-inline-block" v-if="login_user">
          <a class="nav-link dropdown-toggle text-decoration-none text-light p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ login_user }}さん</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <button class="dropdown-item btn" @click="logout">ログアウト</button>
          </div>
        </span>
        <span class="p-2" v-else>
          <router-link class="text-light" :to="{ name: 'login'}">ログイン</router-link>
        </span>
        <span class="text-light p-2"><Icon name="shopping-cart" />カート</span>
      </div>
    </nav>
  </header>
</template>

<script>
  import Icon from 'vue-awesome/components/Icon';

  export default {
    data () {
      return {
        form: {
          search: ''
        },
        login_user: ''
      }
    },
    created: function() {
      this.init();
    },
    methods: {
      init() {
        const profile = JSON.parse(localStorage.getItem('profile'));
        if (profile) {
          this.login_user = profile.profile.name;
        }
      },
      search() {
        window.location.href = `/product/search/${this.form.search}`;
      },
      logout() {
        let profile = JSON.parse(localStorage.getItem('profile'));
        const config = {headers: {}};
        config.headers.Authorization = `Bearer ${profile.token.access_token}`;
        axios
          .get('api/logout', config)
          .then(response => {
            localStorage.removeItem('profile');
            window.location.href = "/login";
          })
          .catch(err => {
            console.log(err);
          });
      }
    },
    components: {
      Icon
    }
  }
</script>
