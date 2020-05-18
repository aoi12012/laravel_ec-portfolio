<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-8 col-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
              <label for="email" class="col-4 control-label">E-Mail Address</label>
              <div class="alert alert-denger" role="alert" v-if="showAlert">
                {{ alertMessage }}
              </div>
              <div class="form-group">
                <div class="col-6">
                  <input id="email" type="email" class="form-control"
                    v-model="email" required>
                </div>
              </div>
              <label for="password" class="col-4 control-label">Password</label>
              <div class="form-group">
                <div class="col-6">
                  <input id="password" type="password" class="form-control"
                    v-model="password" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-8 col-offset-4">
                  <button @click="login" class="btn btn-primary">Login</button>
                </div>
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
