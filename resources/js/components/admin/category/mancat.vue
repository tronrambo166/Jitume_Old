<template>

<div class="text-center  py-4 card">

<h3  class="my-4 h3 bg-primary font-weight-bold">All Categories   </h3>


<table class="display table table-bordered " id="">
	<thead>
		<tr>


		
		<th> <input class=" mt-2 float-left" type="checkbox" @click="selectAll"  v-model="catsAll"/> Index</th>
			<th>Category Name </th>
			<th>Status</th>
			
			<th class="text-center">Actions</th>
		
		</tr>
	</thead>
	

	
	<tbody>

		<tr v-for="( cats, index ) in allcategory" >
		<input type="checkbox" :value="cats.id" v-model="catIds"/>
		<td>{{++index}}</td>
			<td>{{cats.cat_name | substr(6)}}</td>
			<td :class=" colStatus(cats.status)"> {{getStatus(cats.status)}}</td>
			<td>{{cats.created_at | time}}</td>
			
			<td class="text-center">
			<router-link :to="`/edit-category/${cats.id}`" class=" mr-1 btn btn-info">Edit</router-link>
			<a @click="removeCat(cats.id)"  class=" btn btn-danger">Delete</a>

			</td>
		</tr>
		<td v-if="empCat()" > No data found! </td>
	
	</tbody> 
	<button :disabled="!isSelected" @click="removeCats(catIds)"  class=" btn btn-warning">Delete</button>
	
	
</table>

</div>
</template>

<script> 

export default {
    
	data: () => ({
	category:{},
	catIds:[],
	catsAll:false,
	isSelected:false,
	emptyCat:false
	}),
	methods:{
     getCats:function(){
     let t = this; 
    const response = axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/admin/manage-category').then(function(response){
    console.log(response.data);
    t.allcategory=response.data.data;
   
    });
	
  },
  getStatus(status){
   let data ={ 0:'inactive', 1:'active'}
   if(status==1) this.statusCol = 'bg-success'; else this.statusCol = 'bg-danger';
  return data[status];
  },
   colStatus(status){
   var col;
   if(status==1)  col = 'py-0 btn btn-success'; else  col = 'py-0 btn btn-danger';
   return col;
  },
  removeCat(id){

  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
  axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/delcat/'+id).then( (data) =>{
  console.log(data)
   toastr.success(data.data.message)
              }).catch( (error) =>{})
   this.$store.dispatch("getCats")
  }
})

  },
  removeCats(ids){
  axios.post('http://localhost/laravel_projects/Vue_eCommerce/public/delcats',{ids:ids}).then( (data) =>{
  console.log(data)
   toastr.success(data.data.message)
              }).catch( (error) =>{})
   this.$store.dispatch("getCats")
  },

  selectAll(event){
  if(this.catsAll === false){
  this.allcategory.forEach( (event) =>{
  this.catIds.push(event.id)
  })
  }
  else  this.catIds = [];
  },
  empCat(){
  if(this.$store.state.catData.length<1) this.emptyCat = true;
  }
	},

	 mounted() { 
	// this.getCats(),
	 return this.$store.dispatch("getCats")
	  },

	 computed:{ 
      allcategory(){  return this.$store.getters.getCat }
	 },
	 watch:{
	 catIds(){ if(this.catIds.length > 0) this.isSelected=true; }
	 }

	 

	}
</script>