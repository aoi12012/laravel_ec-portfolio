<template>
  <div class="mt-4">
    <div class="container">
      <div class="row">
        <h1>ログイン</h1>
      </div>
      <div class="row">
        <div class="col-6">
            <router-link class="btn d-block mx-auto" style="width: 100px; background: #f6993f; margin-top: 100px" :to="{name: 'userRegist'}">新規登録</router-link>
        </div>
        <div class="col-6 border-left">
          <div class="panel panel-default mx-auto">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <label for="email" class="control-label">E-Mail Address</label>
              <div class="alert alert-denger" role="alert" v-if="showAlert">
                {{ alertMessage }}
              </div>
              <div class="form-group">
                  <input id="email" type="email" class="form-control"
                    v-model="email" required>
              </div>
              <label for="password" class="col-4 control-label">Password</label>
              <div class="form-group">
                  <input id="password" type="password" class="form-control"
                    v-model="password" required>
              </div>
              <div class="form-group">
                  <button @click="login" class="btn btn-primary">Login</button>
              </div>
            </div>
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
        email: '',
        password: '',
        showAlert: false,
        alertMessage: '',
      }
    },
    methods: {
      login() {
        const formData = new FormData();
        formData.append('email', this.email);
        formData.append('password', this.password);
        axios
          .post('/api/login', formData)
          .then(response => {
            const data = response.data;
            localStorage.setItem('profile', JSON.stringify(data));
            window.location.href = "/";
          })
          .catch(err => {
            this.message = err;
          });
      },
    }
  }
</script>
