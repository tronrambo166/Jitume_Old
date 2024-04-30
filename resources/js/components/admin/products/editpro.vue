<template>

<div class="text-center  py-4 card">

 <h3  class="my-4  h3  font-weight-bold">Update Product  </h3>	
		
	<form class="form-group" @submit.prevent="upPro" @keydown="form.onKeydown($event)" >
    Name: <input class="form-group" v-model="form.pro_name" type="text" name="pro_name" placeholder="Product Name">
    <div style="color:red;" v-if="form.errors.has('pro_name')" v-html="form.errors.get('pro_name')" /> <br>

     Desc: <input class="form-group" v-model="form.desc" type="text" name="desc" placeholder="desc">
    <div style="color:red;" v-if="form.errors.has('desc')" v-html="form.errors.get('desc')" /> <br>

     Cat Id:  <input class="form-group"  v-model="form.cat_id" type="number" name="cat_id" >
    <div style="color:red;" v-if="form.errors.has('catName')" v-html="form.errors.get('catName')" /> <br>

     Brand Id:  <input class="form-group"  v-model="form.brand_id" type="number" name="catName" >
    <div style="color:red;" v-if="form.errors.has('catName')" v-html="form.errors.get('catName')" /> <br>

     Price:  <input class="form-group"  v-model="form.price" type="number" name="catName" >
    <div style="color:red;" v-if="form.errors.has('catName')" v-html="form.errors.get('catName')" /><br>

     Qty:  <input class="mb-2" v-model="form.qty" type="number" name="qty" >
    <div style="color:red;" v-if="form.errors.has('catName')" v-html="form.errors.get('catName')" /><br>

   Image: <input multiple type="file" name="image[]" @change="handleFile" />
   <img :src="form.showImage" width="100px" />
   
    <h5  class="my-4  h6   font-weight-bold"> Status  </h5>	
    <input type="radio" class="form-check-input" id="inactive" value="0" v-model="form.status" />
    <label  for="inactive" > Inactive </label>

      <input type="radio" class="mx-3 form-check-input" id="active" value="1" v-model="form.status" />
    <label  for="active" class="mx-5 " > Active </label>


    
    <button type="submit" :disabled="form.busy" class="btn btn-primary">
     Save
    </button>
  </form>

</div>

</template>

<script> 

export default {
	data: () =>({
	form: new Form({
	pro_name:'',
	desc:'',
	cat_id:'',
	brand_id:'',
	price:'',
	qty:'',
	image:[],
	showImage:null,
	status:0
	}),
	thisCat:[]
	}),
	methods:{
	handleFile (event) {
	      let t = this
      const file = event.target.files[0]
      this.form.image = file

      let filereader = new FileReader();
      filereader.onload = function(e) {
      t.form.showImage = e.target.result
      }
      filereader.readAsDataURL(event.target.files[0])
    },
	showPro(){ 
	var id=this.$route.params.id; var t=this;
	axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/admin/edit-product/'+id).then( function(response) {
	t.form.pro_name = response.data.editpro[0].pro_name;
	t.form.desc = response.data.editpro[0].description;
	t.form.cat_id = response.data.editpro[0].cat_id;
	t.form.brand_id = response.data.editpro[0].brand_id;
	t.form.price = response.data.editpro[0].price;
	t.form.qty = response.data.editpro[0].r_quantity;
	t.form.status = response.data.editpro[0].status;
	console.log(response.data);
	});
	
	},
	async upPro(){ 
	var id=this.$route.params.id; var t=this;
	const response = await this.form.post('http://localhost/laravel_projects/Vue_eCommerce/public/admin/uppro/'+id)
	console.log(response.data.message);
	toastr.success(response.data.message);
	this.$router.push('/manage-product');
	}

	},
	mounted(){
	this.showPro();
	}
	
}
</script>