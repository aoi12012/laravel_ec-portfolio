<template>
  <div>
    <h1>商品管理</h1>
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
            <label for="itemName">商品名</label>
            <input v-model="form.itemName" type="text" class="form-control" id="itemName">
          </div>
          <div class="form-group">
            <label for="itemNameKana">商品名(カナ)</label>
            <input v-model="form.itemNameKana" type="text" class="form-control" id="itemNameKana">
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
          itemName: '',
          itemNameKana: '',
          description: '',
          file: ''
        },
        data: {
          image: ''
        }
      };
    },
    methods: {
      setImage(e) {
        e.preventDefault();
        this.data.image = '';
        this.form.file = '';
        let files = e.target.files;
        if (files[0].type.startsWith("image/")) {
          this.data.image = window.URL.createObjectURL(files[0]);
          this.form.file = files[0];
        } else {
          alert("画像以外のファイルはアップロードできません。");
          e.target.type = 'text';
          e.target.type = 'file';
        }
      },
      regist() {
        const formData = new FormData();
        formData.append('itemName', this.form.itemName);
        formData.append('itemNameKana', this.form.itemNameKana);
        formData.append('description', this.form.description);
        formData.append('image', this.form.file);
        console.log(formData);
        axios.post('/api/admin/items', formData)
          .then(response => {
            console.log(response);
          })
          .catch(err => {
            this.message = err;
          });
      }
    }
  }
</script>
