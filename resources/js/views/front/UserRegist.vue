<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">会員登録</div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">利用者名</label>
              <div class="col-md-6">
                <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" required>
                <span class="invalid-feedback" role="alert">
                  <strong>※入力必須です。</strong>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">メールアドレス</label>
              <div class="col-md-6">
                <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }" required>
                <span class="invalid-feedback" role="alert">
                  <strong>※入力必須です。</strong>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">パスワード</label>
              <div class="col-md-6">
                <input v-model="form.password" type="password" class="form-control" :class="{ 'is-invalid': errors.password }" required>
                <span class="invalid-feedback" role="alert">
                  <strong>{{ errors.password }}</strong>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">確認用パスワード</label>
              <div class="col-md-6">
                <input v-model="form.password_confirmation" type="password" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary float-right" @click="regist">
                  登録
                </button>
              </div>
            </div>
          </form>
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
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
        },
        errors: {
          name: '',
          email: '',
          password: ''
        }
      }
    },
    methods: {
      regist() {
        axios
          .post('/api/user/regist', this.form)
          .then(response => {
            alert('登録が完了しました。');
            window.location.replace('/login');
          })
          .catch(err => {
            let errors = err.response.data.errors;
            this.errors.name = ( errors.name ? errors.name[0] : '');
            this.errors.email = ( errors.email ? errors.email[0] : '');
            this.errors.password = ( errors.password ? errors.password[0] : '');
            console.log(this.errors);
          });
      }
    }
  }
</script>
