<template>
        <div class="main">
        <div class="container">



             <div class="w-75 m-auto row my-4 text-center">
                <div class="col-sm-11">
                    <h4 class="font-weight-bold text-center pt-2">Let's get you started!</h4>
                    <h6>All plans start with a 7 days free trial.</h6>
                </div>

                <div class="col-sm-1 px-0">
                    <a @click="$router.go(-1)" style="width: 100%;" class="m-auto border border-dark btn px-1 py-1 font-weight-bold">Back</a>
                </div>

                 <div class="col-sm-11 my-3">
                    <input checked @change="type($event);" style="font-size:20px;" name="type" type="radio"  value="M" id="month"> <span class="mr-3">Monthly</span>
                     <input @change="type($event);" name="type" type="radio" value="Y" id="year">
                     <span class="">Annually (Save 20%)</span> 
                </div>
     

            </div>


            <div class="w-75 m-auto row border border-dark my-4">
                <div class="col-sm-4 ">
                    <h5 class="text-center pt-2">Silver</h5>
                </div>

                <div class="col-sm-4 ">
                    <h5 class="text-center pt-2">Gold</h5>
                </div>

                <div class="col-sm-4">
                    <h5 class="text-center pt-2">Platinum</h5>
                </div>

            </div>


            <div id="monthly" class="row w-75 mx-auto">
                <div class="col-sm-4">
                    <div class=" card"  @click="select(9.99)" id="one" >
                        <p class="text-center font-weight-bold h5 pt-2">$9.99</p>
                    <p class="text-center px-3">10 free "Start conversations" per month from any range.</p>

                    <a @mouseleave="leave()" @mouseover="hover()"
                    @click="make_session(form.id);stripeFee(form.id, 0.00,'silver-trial',30);" style="border: 1px solid black;" id="convBtn1"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2">Try free for 7 days</a>
                </div>
                 </div>

                <div class="col-sm-4 "    >
                    <div class=" card" @click="select(29.99)" id="two">
                        <p class="text-center font-weight-bold h5 pt-2">$29.99</p>
                    <p class="text-center px-3">Silver + access to all data from one chosen range.</p>

                    <a v-if="form.range != 'all'" @mouseleave="leave()" @mouseover="hover2()"
                    @click="make_session(form.id);stripeFee(form.id, 0.00,'gold-trial',30);" style="border: 1px solid black;" id="convBtn2"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2">Try free for 7 days</a>

                    <a v-else onclick="alert('Please select a package!');" @mouseover="hover7()" style="border: 1px solid black;" id="convBtn7"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2">Try free for 7 days</a>

                </div> </div>

                <div class="col-sm-4 "  >
                    <div class=" card"  @click="select(69.99)" id="three">
                        <p class="text-center font-weight-bold h5 pt-2">$69.99</p>
                    <p class="text-center px-3">Silver access + Gold access to all data.</p> <br>

                    <a @mouseleave="leave()" @mouseover="hover3()"
                    @click="make_session(form.id);stripeFee(form.id, 0.00,'platinum-trial',30);" style="border: 1px solid black;" id="convBtn3"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2">Try free for 7 days</a>

                </div> </div>

            </div>



            <div id="yearly" class=" row w-75 mx-auto" style="display:none;">
                <div class="col-sm-4">
                    <div class=" card"  @click="select(95.99)" id="four" >
                        <p class="text-center font-weight-bold h5 pt-2">$95.99</p>
                    <p class="text-center px-3">10 free "Start conversations" per month from any range.</p>
                    <a @mouseleave="leave()" @mouseover="hover4()" style="border: 1px solid black;" id="convBtn4"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2 disabled">Try free for 7 days</a>
                </div> </div>

                <div class="col-sm-4 ">
                    <div class=" card" @click="select(287.99)" id="five" >
                        <p class="text-center font-weight-bold h5 pt-2">$287.99</p>
                    <p class="text-center px-3">Silver + access to all data from one chosen range.</p>
                    <a @mouseleave="leave()" @mouseover="hover5()" style="border: 1px solid black;" id="convBtn5"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2 disabled">Try free for 7 days</a>
                </div> </div>

                <div class="col-sm-4 ">
                    <div class=" card" @click="select(671.99)" id="six" >
                        <p class="text-center font-weight-bold h5 pt-2">$671.99</p>
                    <p class="text-center px-3">Silver access + Gold access to all data.</p> <br>
                    <a @mouseleave="leave()" @mouseover="hover6()" style="border: 1px solid black;" id="convBtn6"  class="d-block py-1 convBtn text-center mx-auto w-75 btn  px-2 my-2 disabled">Try free for 7 days</a> 
                </div> </div>

            </div>


            <div class="row w-75 mx-auto  my-5">
                
                <div class="w-25 px-4">
                     <h6 class="text-left pl-5">Turnover ranges:</h6>
                        <p class="small_label2 my-2 py-1 text-left pl-5 border">  $0-$10000</p>
                        <p class="small_label2 my-2 py-1 text-left pl-5 border"> $10000-$100000</p>                    
                        <p class="small_label2 my-2 py-1 text-left pl-5 border">  $100000-$25000</p>
                        <p class="small_label2 my-2 py-1 text-left pl-5 border">  $250000-$50000</p>
                        <p class="small_label2 my-2 py-1 text-left pl-5 border">  $500000+</p>   
                </div>

                <div class="w-25 collapse" id="ranges">
                     <select id="" name="chosen_range" class="p-2" @change="select_range($event)">
                         <option value="">Select Range</option>
                         <option value="0-10000">$0-$10000</option>
                         <option value="10000-100000">$10000-$100000</option>
                         <option value="100000-250000">$100000-$250000</option>
                         <option value="250000-500000">$250000-$500000</option>
                         <option value="500000+">$500000+</option>
                     </select>
                </div>


                <div class="w-75">
                <form action="stripe" method="get" class="float-right mt-5">
                    <input type="text" hidden id="package" name="package" value="">
                 <input type="text" hidden id="price" name="price" value="">
                  <input type="number" hidden id="listing_id" name="listing_id" value="">
                 <a v-if="form.select" @click="make_session(form.id);stripeFee(form.id, form.price,form.pacage,form.days);" type="submit" class=" text-light py-2 px-5 small buttonListing mr-2 " >
                  Checkout
                </a>

                <a v-else onclick="alert('Please select a package!');" type="button" class=" buttonListing primary_bg mr-2 text-light py-2 px-5 small " >
                  Checkout
                </a>

            </form>
                </div>

                </div>


               
                


       
        </div>
    </div>
</template>

<script>

    export default {
    props: ['auth_user'],    
    data: () => ({
    form: new Form({
        id:'',
        pacage:'',
        days:'',
        price:'',
        range:'all',
        select:false
    }),
    empty:false
    }),

    created(){
         var id=this.$route.params.id;
         let t=this;
         t.form.id = id;
         //document.getElementById('listing_id').value = id;

    },
    methods:{
    type(event){
        if(event.target.value == 'M'){
        $('#monthly').show();
        $('#yearly').hide();
    }
    else {
        $('#monthly').hide();
        $('#yearly').show();
    }

    },

    select_range(event){
    this.form.range = event.target.value;
    },

    select(event){ 
    this.form.select = true;

    if(event == '9.99'){
        this.form.price = 9.99;
        this.form.days = 30;
    var pacage = 'silver';
    this.form.pacage = pacage;
    $('#ranges').hide();
    $('#one').css('background','#e0edd8');
    $('#two').css('background','');
    $('#three').css('background','');
  }

   if(event == '29.99'){
    this.form.price = 29.99;
    this.form.days = 30;
    var pacage = 'gold';
    this.form.pacage = pacage;
    $('#ranges').show();
    $('#two').css('background','#e0edd8');
    $('#one').css('background','');
    $('#three').css('background','');
  }

   if(event == '69.99'){
    this.form.price = 69.99;
    this.form.days = 30;
    var pacage = 'platinum';
    this.form.pacage = pacage;
    $('#ranges').hide();
    $('#three').css('background','#e0edd8');
    $('#two').css('background','');
    $('#one').css('background','');
  }

   if(event == '95.99'){
    this.form.price = 95.99;
    this.form.days = 365;
    var pacage = 'silver';
    this.form.pacage = pacage;
    $('#ranges').hide();
    $('#four').css('background','#e0edd8');
    $('#five').css('background','');
    $('#six').css('background','');
  }

  if(event == '287.99'){
    this.form.price = 287.99;
    this.form.days = 365;
    var pacage = 'gold';
    this.form.pacage = pacage;
    $('#ranges').show();
    $('#five').css('background','#e0edd8');
    $('#four').css('background','');
    $('#six').css('background','');
  }

  if(event == '671.99'){
    this.form.price = 671.99;
    this.form.days = 365;
    var pacage = 'platinum';
    this.form.pacage = pacage;
    $('#ranges').hide();
    $('#six').css('background','#e0edd8');
    $('#five').css('background','');
    $('#four').css('background','');
  }
    document.getElementById('price').value = event;
    document.getElementById('listing_id').value = this.form.id;
    document.getElementById('package').value = pacage;
},

stripeFee: function (business_id,amount,plan,days) {
    if(plan == 'gold' && this.form.range == 'all')
        alert('Please select a range!');

    else {
        var range = btoa(this.form.range);
        var amount = btoa(amount);
        var business_id = btoa(business_id);
        var plan = btoa(plan);
        var days = btoa(days);
        $.confirm({
          title: 'Are you sure?',
          content: 'Are you sure to pay?',
          buttons: {
            confirm: function () {
              window.location.href = './stripeSubscribe/' + amount+'/'+plan+'/'+days+'/'+range;
            },
            cancel: function () {
              $.alert('Canceled!');
            },
          }
        });
    }

    },

 make_session(id){
            sessionStorage.setItem('invest',id);
        },

        hover(){
            $('#convBtn1').css({background:'#083608', color:'white'});
        },
        hover2(){
            $('#convBtn2').css({background:'#083608', color:'white'});
        },
        hover3(){
            $('#convBtn3').css({background:'#083608', color:'white'});
        },
        hover4(){
            $('#convBtn4').css({background:'#083608', color:'white'});
        },
        hover5(){
            $('#convBtn5').css({background:'#083608', color:'white'});
        },
        hover6(){
            $('#convBtn6').css({background:'#083608', color:'white'});
        },
        hover7(){
            $('#convBtn7').css({background:'#083608', color:'white'});
        },
        leave(){
            $('.convBtn').css({background:'', color:'black'});
        },


}

}

</script>
