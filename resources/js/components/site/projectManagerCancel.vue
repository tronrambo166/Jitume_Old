<template>
    <div class="container bg-white" id="">

    
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    

             
         <div class="row mt-4 px-3">

<!-- Cancel -->
    <div class="card py-5" id="cancel" style="width:50%; margin:auto;"  >
          <div class="">
            <h5 class="" style="margin-left:30px;" id="">Are you sure you don’t want to Proceed with this investment?</h5>

          </div>
          <div class="card-body py-5 mb-5">
            <div class="row w-75 mx-auto" >

                <div class="col-md-6">
                <a class="primary_bg text-center text-light" style="text-decoration:none;padding:8px;border-radius:5px; width:75%; margin:auto; cursor:pointer;" target="_blank" @click="CancelAssetBid();" >
                   <small><b>OK</b></small>
                </a>
                </div>

                

                <div class="col-md-6"> 
                <a @click="showMessage();" style="text-decoration:none;color:black;background:white;padding:8px;border-radius:5px; width:75%; margin:auto; cursor:pointer;" class=" border border-dark text-center">
                <span class="text-dark" aria-hidden="true"><small>Cancel</small></span>
                </a>

                </div>
        </div>
      </div>
    </div>
    <!-- Cancel -->


    <div class="card" id="message" style="display:none; width:50%; margin:auto; padding-bottom:30px;padding-top:30px;"  >
        <div class="w-100 m-0 py-5 alert font-weight-bold alert-info alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">Thanks! You can always go back to inbox and request for a project manager.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

    </div>


    <div class="card" id="cancelMessage" style="display:none; width:50%; margin:auto; padding-bottom:30px;padding-top:30px;"  >
        <div class="w-100 m-0 py-5 alert font-weight-bold alert-danger alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">Thanks! Your bid was canceled.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

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
    empty:false
    }),


    methods:{
    CancelAssetBid:function () {
            let t = this;
            this.bid_id = this.$route.params.bid_id;
             //this.results = this.ids.split(",");
            axios.get('CancelAssetBid/'+t.bid_id).then( (data) =>{
            //console.log(data);
            $('#cancel').hide();
            $('#cancelMessage').show();
              }).catch( (error) =>{})
        },

        showMessage:function () {
          $('#cancel').hide();
          $('#message').show();
        }
 
  },
  
   mounted() { 
   //this.setRes()
      } 

    }
</script>
