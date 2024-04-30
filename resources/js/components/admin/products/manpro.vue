<template>

<div class="text-center  py-4 card">

<h3  class="my-4 h3 bg-primary font-weight-bold">All Categories   </h3>


<table class="display table table-bordered " id="">
	<thead>
		<tr>


		
		<!-- <th> <input class=" mt-2 float-left" type="checkbox"  v-model="catIds"/> Index</th> -->
		 <th>SL</th>
			<th>Product Name </th>
			<th>Brand </th>
			<th>Category </th>
			<th>Desc </th>
			<th>Price </th>
			<th>Qty </th>
				<th>Image </th>
			<th>Status</th>
		
			
			<th class="text-center">Actions</th>
		
		</tr>
	</thead>
	

	
	<tbody>

		<tr v-for="( cats, index ) in allpro" >
			<!-- <input type="checkbox" :value="cats.id" v-model="catIds"/> -->
		<td>{{++index}}</td>
			<td>{{cats.pro_name }}</td>
				<td>{{cats.brand_name }}</td>
					<td>{{cats.cat_name }}</td>
						<td>{{cats.description }}</td>
							<td>{{cats.price }}</td>
								<td>{{cats.r_quantity }}</td>
								<td><img :src="cats.image_name" width="80px" height="60" /> </td>
			<td :class=" colStatus(cats.status)"> {{getStatus(cats.status)}}</td>
			
			
			<td class="text-center">
			<router-link :to="`/edit-product/${cats.id}`" class="py-0 mr-1 btn btn-info">Edit</router-link>
			<a @click="removePro(cats.id)"  class="py-0 btn btn-danger">Delete</a>

			</td>
		</tr>
		<td v-if="empCat()" > No data found! </td>
	
	</tbody> 
	
	
</table>

</div>
</template>

<script> 

export default {
    
	data: () => ({
	category:{},
	catIds:[],
	emptyCat:false
	}),
	methods:{
     getCats:function(){
     let t = this; 
    const response = axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/admin/manage-product').then(function(response){
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
  removePro(id){

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
  axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/delpro/'+id).then( (data) =>{
  console.log(data)
   toastr.success(data.data.message)
              }).catch( (error) =>{})
   this.$store.dispatch("fetchpro")
  }
})

 

  },
  empCat(){
  if(this.$store.state.catData.length<1) this.emptyCat = true;
  }
	},

	 mounted() { 
	// this.getCats(),
	 return this.$store.dispatch("fetchpro")
	  },

	 computed:{ 
      allpro(){  return this.$store.getters.getpro }
	 }

	 

	}
</script>