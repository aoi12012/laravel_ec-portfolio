<template>
  <div>
    <div class="d-flex justify-content-between flex-nowrap border-bottom mt-4 mb-2">
      <h1>商品管理</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <p class="mb-0">商品画像</p>
          <figure class="figure border" style="width: 250px; height: 250px;">
            <img :src="data.image" class="figure-img img-fluid rounded d-block mx-auto" style="max-width: 250px; max-height: 250px;">
          </figure>
          <div class="form-group">
            <input type="file" class="from-control" @change="setImage" />
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label :class="{'is-invalid': errors.name}">商品名</label><label class="invalid-feedback d-inline ml-1" v-if="errors.name">※入力必須です。</label>
            <input v-model="form.name" type="text" class="form-control" v-bind:class="{ 'is-invalid': errors.name}">
          </div>
          <div class="form-group">
            <label :class="{'is-invalid': errors.name_kana}">商品名(カナ)</label><label class="invalid-feedback d-inline ml-1" v-if="errors.name_kana">※入力必須</label>
            <input v-model="form.name_kana" type="text" class="form-control" v-bind:class="{'is-invalid': errors.name_kana}">
          </div>
          <div class="form-group">
            <label for="description">商品説明</label>
            <textarea v-model="form.description" class="form-control" id="description" rows="5"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="price">販売価格</label>
            <input type="text" class="form-control" id="price">
          </div>
        </div>
        <div class="col-4">
          <button class="btn" @click="regist">登録</button>
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
          name_kana: '',
          description: '',
          image: ''
        },
        errors: {
          name: '',
          name_kana: '',
          image: ''
        },
        data: {
          image: ''
        }
      };
    },
    created: function() {
      this.getItem();
    },
    methods: {
      setImage(e) {
        e.preventDefault();
        this.data.image = '';
        this.form.image = '';
        let files = e.target.files;
        if (files[0].type.startsWith("image/")) {
          this.data.image = window.URL.createObjectURL(files[0]);
          this.form.image = files[0];
        } else {
          alert("画像以外のファイルはアップロードできません。");
          e.target.type = 'text';
          e.target.type = 'file';
        }
      },
      getItem() {
        axios
          .get(`/api/admin/items/${this.$route.params.id}`)
          .then(response => {
            this.form = response.data;
            this.data.image = this.form.thumbnail;
            console.log(this.item);
          })
          .catch(err => {
            this.message = err;
          });
      },
      regist() {
        this.init();
        let config = {
          headers: {}
        };
        const formData = new FormData();
        formData.append('name', this.form.name);
        formData.append('name_kana', this.form.name_kana);
        formData.append('description', this.form.description);
        config.headers['X-HTTP-Method-Override'] = 'PUT';
        axios.post(`/api/admin/items/${this.$route.params.id}`, formData, config)
          .then(response => {
            console.log(response);
          })
          .catch(err => {
            let errors = err.response.data.errors;
            this.errors.name = ( errors.name ? errors.name[0] : '');
            this.errors.name_kana = ( errors.name_kana ? errors.name_kana[0] : '');
          });
      },
      init() {
        this.errors = {
          name: '',
          name_kana: '',
          image: ''
        }
      }
    }
  }
</script>
