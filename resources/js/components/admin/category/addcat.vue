<template>

<div class="text-center  py-4 card">

 <h3  class="my-4  h3  font-weight-bold">Add Categories  </h3>	
		   
	<form @submit.prevent="addCategory" @keydown="form.onKeydown($event)">
    <input v-model="form.catName" type="text" name="catName" placeholder="Category Name">
    <div style="color:red;" v-if="form.errors.has('catName')" v-html="form.errors.get('catName')" />
    
   
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
	catName:'',
	status:0
	})
	}),
	methods:{
	async addCategory(){
	const response = await this.form.post('http://localhost/laravel_projects/Vue_eCommerce/public/admin/save-category');
	console.log(response.data);
	/*Toast.fire({
    icon:'success',
    title:'Category Added!'
}); */

 toastr.success('Category Added!', { timeout:5000 });
 //this.$router.push('/manage-category');

	}
	}
}
</script>