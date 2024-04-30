<template>
    <div class="container bg-white w-75 mx-auto" id="">

    
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
                <h3 class="text-center font-weight-bold"><b class="h5 text-success" > </b> </h3>
       

            <div class="clear"></div>
      


       
         <div class="clear"></div>
    

  
            


            <div class="content_bottom">
                <div class="heading">
                     <h3 class="my-4 font-weight-bold text-center text-dark">Find  a project manager <h6 class="text-center mx-auto">(Within 20 miles of the Business)</h6> </h3>
                </div>
                <div class="clear"></div>
            </div>


           

        <div v-if="!auth_user" class="w-75 h-100 py-5 my-5 my-auto justify-content-center my-2 text-center mx-auto">
                <a style="cursor:pointer; width:40%;"
                    class="searchListing mx-auto text-center py-1 text-light font-weight-bold" @click="make_session2(bid_id);" data-target="#loginmodal2"
                    data-toggle="modal">Login to see</a>
        </div>

             
         <div v-else class="row mt-4 px-3">

             
                <div v-for="( result, index ) in results" class="listing col-sm-4 my-5">
                    <router-link :to="`/AssetServiceDetails/${s_id}/${bid_id}`" class="shadow card border px-3">

                     <img :src="result.image" style="max-width:332px; height:150px" alt=""/>

                    <div class="p-1 pb-2">
                         <h5 class="card_heading mb-0 py-2">Manager: <span class="font-weight-light text-success">{{ result.manager }} </span></h5>

                      <h6 class="card_heading mb-0 py-2">Service: <span class="font-weight-light text-success">{{ result.name }} </span></h6>   

                      <p class="card_text"><span class="rounded"><i class="mr-2 fa fa-phone"></i>{{ result.contact }}</span></p>
                    </div>

                    <p class="card_text pt-1 text-left"><i class="mr-2 fa fa-map-marker"></i>{{ result.location }}</p>

                    <div class="amount float-right text-right w-100 py-0 my-0">   
                        <h6 class="amount font-weight-bold" >Amount: <span class="font-weight-light"><b>${{result.price}}</b></span></h6>
                    </div>

                    </router-link>
                    
              </div>

              <div v-if = "empty" class="col-sm-12 mx-auto">
                <h4 class="bg-light py-4 text-center my-5">No Project Manger found!!</h4>
             </div>
                </div>



<!-- 
         <div class="content_bottom">
                <div class="heading">
                     <h3 class="my-4 bg-light text-center text-secondary">Services</h3>
                </div>
                <div class="clear"></div>
            </div>

             
         <div class="row mt-4">

         <div v-if="this.services =='' && this.results ==''">
         <h3 class="text-center font-weight-bold btn-light btn py-3 d-block">No Results Found! </h3></div>
             
                <div v-for="( service, index ) in services" class="listing col-sm-4 my-5">
                    <router-link :to="`/servicegDetails/${service.id}`" class="shadow card border px-5">


                     <img :src="service.image" style="max-width:332px; height:230px" alt=""/>

                    <h4 class="mt-3 mb-0">{{service.name}} </h4>
                    <p class="my-1"><i class="mr-2 fa fa-map-marker"></i>{{service.location}}</p>
                    
                    </router-link>
                    
              </div>
                </div> -->
                
               
            </div>
           </div>
           

               </div>
   
</template>

<script>
   
export default {
    props: ['auth_user','app_url'],
    data: () => ({
    results:[],
    services:[],
    bid_id:'',
    s_id:'',
    empty:false
    }),


    methods:{
    setRes:function () {
            sessionStorage.removeItem('projectManagers');
            let t = this;
            t.bid_id = this.$route.params.bid_id;
             //this.results = this.ids.split(",");
            axios.get('FindProjectManagers/'+t.bid_id).then( (data) =>{
                //console.log(data.data);
                t.results = data.data.services;
                for (const [key, value] of Object.entries(t.results)) {
                    
                    t.s_id = btoa(value.id); t.s_id = btoa(t.s_id);
                    //t.bid_id = btoa(t.bid_id); t.bid_id = btoa(t.bid_id);
                }

                if(data.data.data.length == 0 || data.data.data == false)
                    t.empty = true;;
              }).catch( (error) =>{})
        },

    make_session2(id) {
      sessionStorage.setItem('projectManagers', id);
      document.getElementById('c_to_action').value = 'loginFromService';
      document.getElementById('c_to_action_login2').value = 'loginFromService';
      document.getElementById('c_to_listing_reg').value = 'True';
    },

        getPhoto(){
   
        return '../';

        }
 
  },
  
   mounted() { 
   this.setRes()
   //this.range()
     //return this.$store.dispatch("fetchpro")
      } 

    }
</script>
