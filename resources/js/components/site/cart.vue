<template>
    <div class="container">
        
              <!-- Layout -->
 
     <div class="row border_dark p-0" style="">
     <div class="col-sm-8">
      
     <div class="navbar navbar-expand-sm p-0 navy  ">
       <ul class="navbar-nav py-2 ">

        <li class="nav-item py-1 pl-3 pr-4">
            <a href="home"><img class="" src="images/logo_services.png" width="200px" height="65px" style="margin-left: 58px;"></a>
        </li>
        
         <li class="nav-item py-1 px-3"><router-link to="/home" class="text-secondary ">Home</router-link></li>

                    <li class="nav-item py-1 px-3 text-secondary"><router-link to="/services" class="text-secondary ">Jitume service</router-link></li>

                    <li class="font-weight-bold nav-item py-1 px-3"><router-link to="/applyShow" class=" text-secondary">Apply for show
                    </router-link></li>

                </ul>
                 </div>
            </div>

    
    
    <div class="col-sm-3">
  <ul>
        <li style="list-style-type: none;" class="float-right mt-3 nav-item py-1 px-3 text-light "> 

      <a v-if="auth_user" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="background: rgb(175 173 173 / 23%); cursor:pointer;" class=" text-dark d-inline px-3 py-2 d-inline-block text-center" ><b>Logout</b></a>
          
      <a v-else data-target="#loginModal" data-toggle="modal" style="background: #ffffff8c;" class=" text-dark d-inline px-3 py-2 d-inline-block text-center" ><b>Sign In</b></a>

       </li>
                                    
    </ul>
        </div> 

       <div class="col-sm-1"> </div>

    </div> 
           

    <!-- Layout -->
    
    
        <div class="heading row w-75 mx-auto my-5"> 
       
<table class="eq table table-bordered " id="">
    <thead>
        <tr>
            <th>Service Name </th>
            <th>Category </th>
            <th>Price </th>
            <th>Quantity </th>  
            <th class="text-center"></th>        
        </tr>

    </thead>
    

    
    <tbody>

        <tr v-for="( equipment, index ) in equipments" :id="equipment.id">
            <td>{{equipment.name }}</td>
                <td>{{equipment.category }}</td>
                    <td>{{equipment.price }} x {{equipment.qty }}</td>
                        <td>{{equipment.qty }}</td>
   
            <td class="text-center">

          <!--   <a style="cursor:pointer;" id="invest" v-if="equipment.status == 'active'" @click="Invest(equipment.listing_id,equipment.id,equipment.value,equipment.amount)" class="text-light buttonEq my-2">Invest</a> -->

          <a @click="removeCart(equipment.id)" style="cursor:pointer;"  class="text-light buttonEq my-2">X</a> 

        

            </td>

            

        </tr>
        <td v-if="empty" > No data found! </td>
    
    </tbody> 
    
    
</table>

<div class="shopping float-right">
    <div class="float-left">
        <h6>Vat (5%): <span id="vat" class="text-secondary font-weight-bold"></span> </h6> 

        <h6>Tax (2%): <span id="tax" class="text-secondary font-weight-bold"></span> </h6> 

        <h4>TOTAL: <span id="total" class="text-secondary font-weight-bold"></span> Kshs</h4> 
    </div>
                    <div class="float-right">
                    <form action="cartStripe" method="get">
       
                             <input type="text" hidden id="price" name="price" value="">
                              <input type="number" hidden id="service_id" name="service_id" value="">


                          <button @click="make_session(form.id);" type="submit" class="btn btn-dark text-light px-3 mt-4 font-weight-bold" >
                            Checkout
                            </button> 
                        </form>

                        

                    </div> 
                </div>

        
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

     cart(){
           var t = this;
           axios.get('cart').then( (data) =>{
            t.equipments = data.data.data;
            if(data.data.cartCount == 0)
                t.expty = true;
         console.log(data.data.total)
         document.getElementById('vat').innerHTML = (0.05*data.data.total).toFixed(2);
         document.getElementById('tax').innerHTML = (0.02*data.data.total).toFixed(2);
         document.getElementById('total').innerHTML = (0.07*data.data.total)+data.data.total;

         var grand = ( (0.07*data.data.total)+data.data.total) /136;
         document.getElementById('price').value =grand.toFixed(2);
        
    });
    },

    removeCart(id){
    var t=this;
     axios.get('removeCart/'+id).then( (data) =>{
         $('#'+id).css('display','none');
         toastr.success(data.data.data) 
         document.getElementById('vat').innerHTML = (0.05*data.data.total).toFixed(2);
         document.getElementById('tax').innerHTML = (0.02*data.data.total).toFixed(2);
         document.getElementById('total').innerHTML = (0.07*data.data.total)+data.data.total;  

         var grand = ( (0.07*data.data.total)+data.data.total) /136;
         document.getElementById('price').value =  grand.toFixed(2); 
    });

    },

    select(){ 
    $('.single').css('background','#72c537');
    $('.multiple').css('background','');},
        
    select2(){ 
    $('.single').css('background','');
    $('.multiple').css('background','#72c537');},

    price(ev){ alert(ev.target.value);
    document.getElementById('price').value = btoa(ev.target.value);
    },

    getPhoto(){
    return '../';
},

replaceText(){
    if(this.$router.currentRoute.path == '/cart'){
    $('#call_to').html('');
    $('#call_to').html('<a onclick="c_to_actionS();" data-target="#loginModal" data-toggle="modal" style="background: #72c537; border-radius: 15px;cursor: pointer;font-size: 11px; " class="text-light px-sm-3 my-1 px-1 py-1 ml-5 d-inline-block small text-center" ><span style="font-weight:bolder;" id="c_to_ac">Add Your Service</span></a> ');
    }
    }

  },
  

     mounted() { 
     this.replaceText();   
     this.cart(); 
      }

    }
</script>

