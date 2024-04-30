<!DOCTYPE HTML>
<head>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <title>JITUME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
   <style type="text/css"> 
   .btn-success{background:#72c537;color:white;}</style>
    
    
    
    <link href="slider/dist/nouislider.css" rel="stylesheet">
    <script src="slider/dist/nouislider.js"></script>
    
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

   <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>

     <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- {{-- Vue component files --}}
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/http-vue-loader"></script>
  {{-- Vue component files --}} -->
  
</head>

 @if(Session::has('login_err'))
        <div class="w-50 m-auto alert alert-danger alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  @endif



 <div  class="modal show my-5" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width: 620px;border-radius: 2px;">

 
      <div class="modal-body">
        <div class="row justify-content-center py-0 mb-5">
          <div class="px-0">
          <h5 class="text-secondary font-weight-bold text-center btn btn-light w-100 m-auto">Please choose the account type!</h5>
          </div>  

        <div class="px-0 w-100 py-2">
        <div class="card " id="">

         <!-- TYPES -->    
            <input hidden type="number" value="" id="type"/>
            <div id="types" class=" card-header w-100">

            <button  id="user"onclick="user()" class="w-25 btn  font-weight-bold px-3 mr-2">{{ __('Investor') }}</button>  
            
            <button  id="business" onclick="business()" class="font-weight-bold w-25 btn px-3 mr-2">{{ __("Business") }}</button>

             <button  id="service" onclick="service()" class="font-weight-bold w-25 btn px-3 mr-2">{{ __("Service") }}</button>
            </div>
            <!-- TYPES -->


            <!-- HIDDEN Investor REG -->

                <div id="investor_reg" class=" collapse card-body">
                    <form method="POST" action="{{route('registerI')}}" enctype="multipart/form-data">
                        @csrf    

                        <div class="row mb-1">
                            <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Upload Id/Passport') }}<span title="Required" class="text-danger">*</span></label>

                            <div class="col-md-6">
                            <div class="upload-btn-wrapper ml-2">
                              <button class="btnUp_listing mr-2"> Id / Passport
                              <img src="images/up.svg" width="24px"> </button>
                              <input required="" type="file" name="id_passport" />
                            </div>

                               
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Upload Pin') }}<span title="Required" class="text-danger"></span></label>

                            <div class="col-md-6">
                            <div class="upload-btn-wrapper ml-2">
                              <button class="btnUp_listing mr-2"> Pin
                              <img src="images/up.svg" width="24px"> </button>
                              <input  type="file" name="pin" />
                            </div>

                               
                            </div>
                        </div>
          
                        <div class="row mb-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="mt-3 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Create account') }}
                                </button>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center mb-0 mt-2">Or
                                </p>
                            </div>

                            <div class="col-md-12 ">
                                <a href="{{route('skip')}}" class="mt-0 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Skip') }}
                                </a>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center w-75 mx-auto my-2">To create regular Jitume account and donate/puchase business services
                                </p>
                            </div>

                            </div>
                    </form>
                </div>
<!-- HIDDEN Investor REG -->


       <!-- HIDDEN Business REG -->

                <div id="business_reg" class=" collapse card-body">
                    <form method="POST" action="{{route('registerB')}}" enctype="multipart/form-data">
                        @csrf    
          
                       
                        <div class="row mb-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="mt-3 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Create account') }}
                                </button>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center mb-0 mt-2">Or
                                </p>
                            </div>

                            <div class="col-md-12 ">
                                <a href="{{route('skip')}}" class="mt-0 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Skip') }}
                                </a>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center w-75 mx-auto my-2">To create regular Jitume account and donate/puchase business services
                                </p>
                            </div>

                            </div>
                    </form>
                </div>
                <!-- HIDDEN Business REG -->


                <!-- HIDDEN SERVICE REG -->

                <div id="serv_reg" class=" collapse card-body">
                    <form method="POST" action="{{route('registerS')}}" enctype="multipart/form-data">
                        @csrf    
                     
                        <div class="row mb-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="mt-3 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Create account') }}
                                </button>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center mb-0 mt-2">Or
                                </p>
                            </div>

                            <div class="col-md-12 ">
                                <a href="{{route('skip')}}" class="mt-0 w-25 d-block mx-auto btn px-2 create">
                                    {{ __('Skip') }}
                                </a>
                            </div>

                            <div class="col-md-12 ">
                                <p  class="text-center w-75 mx-auto my-2">To create regular Jitume account and donate/puchase business services
                                </p>
                            </div>

                            </div>

                              
                    </form>

                </div>
                <!-- HIDDEN SERVICE REG -->

      </div>

      </div>
      </div>
      </div>

      </div>
      </div>
      </div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
       

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">

    function user(){

    $('#user').css({'background-color' : '#72c537'});
    $('#business').css({'background-color' : ''});
    $('#service').css({'background-color' : ''});

    investor_reg
     $('#investor_reg').show();
     $('#user_reg').hide();
     $('#business_reg').hide();
     $('#serv_reg').hide();
    }

    

     function business(){
    $('#business').css({'background-color' : '#72c537'});
    $('#user').css({'background-color' : ''});
    $('#service').css({'background-color' : ''});

    $('#investor_reg').hide();
    $('#user_reg').hide();
    $('#business_reg').show();
    $('#serv_reg').hide();
    
    }

    function service(){
    $('#service').css({'background-color' : '#72c537'});
     $('#business').css({'background-color' : ''});
    $('#user').css({'background-color' : ''});

    $('#investor_reg').hide();
    $('#user_reg').hide();
    $('#business_reg').hide();
    $('#serv_reg').show();
    
    }


</script>
