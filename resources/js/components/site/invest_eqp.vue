<template>
    <div class="container">
        
            
    
        <div class="heading row w-75 mx-auto my-5"> 
       
<table class="eq table table-bordered " id="">
    <thead>
        <tr>
            <th>Equipment </th>
            <th>Amount </th>
            <th>Value </th>
            <th>Details </th>  
            <th class="text-center"></th>        
        </tr>

    </thead>
    

    
    <tbody>

        <tr v-for="( equipment, index ) in equipments" >
            <td>{{equipment.eq_name }}</td>
                <td>{{equipment.amount }}</td>
                    <td>{{equipment.value }}</td>
                        <td>{{equipment.details }}</td>
   
            <td class="text-center">

          <!--   <a style="cursor:pointer;" id="invest" v-if="equipment.status == 'active'" @click="Invest(equipment.listing_id,equipment.id,equipment.value,equipment.amount)" class="text-light buttonEq my-2">Invest</a> -->

          <a style="cursor:pointer;" v-if="equipment.status == 'active'" data-target="#investModal" data-toggle="modal" class="text-light buttonEq my-2">Invest</a> 

            <button  v-else  disabled class="text-secondary buttonEq my-2">Invest</button>

            </td>

            <!-- INVEST MODAL -->
  <div  class="modal fade" id="investModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

         <div class="card-header w-100">
           
        </div>

              

        <button type="button" class="m-0 close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">

        <div class="row">
            <div class="col-sm-6">
                <div style="cursor:pointer;" @click="select()" class="single card shadow p-3">
                    <h5>One Time Fee</h5>
                    <p class="text-secondary smalls">Start a conversation & access business records</p> <hr>
                    <p class="font-weight-bold smalls">Commitment to invest fee: 2000 kshs</p>

                </div>
            </div>

            <div class="col-sm-6">
                 <div @click="select2()" style="cursor:pointer;" class="multiple card shadow p-3">
                    <h5>Tiered Subscription</h5>
                    <p style="min-height: 50px;" class="text-secondary small">Access multiple businesses records</p> <hr>
                    <select @change="price($event)" class="form-control" style="    font-family: system-ui;">
                        <option value="1 Month">1 Month, $30/month</option>
                        <option value="1 Year">1 Year, $20/month</option>
                        <option value="2 Years">2 Years, $15/month</option>
                        <option value="3 Years">3 Years, $12month</option>
                    </select>



                </div>
            </div>

        </div>

        </div>

        <div class="modal-footer">

        <div class="card-header w-100">
            <form action="stripe" method="get">
       

                <input type="number" hidden name="id" :value="equipment.id">

                <input type="number" hidden name="listing" :value="equipment.listing_id">

                <input type="number" hidden name="value" :value="equipment.value">
                <input type="number" hidden name="amount" :value="equipment.amount">

                 <input type="text" hidden id="price" name="price" value="2000">


                <button type="submit" class="btn btn-primary px-3 font-weight-bold" >
          Checkout
        </button>
            </form>
        
         </div>

      </div>

        </div>
        </div>
        </div>


<!-- INVEST MODAL -->  


        </tr>
        <td v-if="empty" > No data found! </td>
    
    </tbody> 
    
    
</table>

        
        </div>   

 
        <!-- Body -->
        
        
    </div> 
   
</template>

<script> 
   
export default {

   props: ['auth_user'],
   data: () =>({
    form: new Form({
    }),
    equipments:[],
    empty:false
    }),

    methods:{

    getEquipment:function(){ 
    var id=this.$route.params.id; var t=this;
    axios.get('equipments/'+id).then( (data) =>{console.log(data);
    t.equipments = data.data.data;
    if (t.equipments == null ) t.empty = true; 
    });
    
    },

    Invest(listing_id,id,value,amount){
    var t=this;
     axios.get('invest/'+listing_id+'/'+id+'/'+value+'/'+amount+'/invest').then( (data) =>{console.log(data.data.response);
         toastr.success(data.data.response) 
    });

    },

    select(){ 
    $('.single').css('background','#72c537');
    $('.multiple').css('background','');},
        
    select2(){ 
    $('.single').css('background','');
    $('.multiple').css('background','#72c537');},

    price(ev){
    document.getElementById('price').value = btoa(ev.target.value);
    },

    getPhoto(){
   return '../';
}
  },
  

     mounted() { 
     this.getEquipment(); 
      }

    }
</script>

