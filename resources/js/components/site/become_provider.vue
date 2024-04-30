<template>
    <div class="container" id="">
      



<!-- PAGE CONTENT -->
<div class="my-5 row w-75 mx-auto text-center">
  <h3>Content</h3>
  <h3>Content</h3>
  <h3>Content</h3>
</div>

<!-- PAGE CONTENT -->

    

               </div>
   
</template>

<script>
   
export default {
    props: ['auth_user'],
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
