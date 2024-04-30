@extends('../layout')

@section('page')
 
 <div class="my-5 card w-50 px-4 m-auto" id="all_logins">
    <div class=" py-3 bg-white card font-weight-bold h4 card-header text-center">{{ __('Sign In') }}</div>


     <div class=" my-5 text-center User-Artist-Select">
            <div class="col-md-5"></div>                
            <button  id="art_log" onclick="artist_log()" class="w-25 btn btn-success font-weight-bold px-3 mr-2">{{ __('Login') }}</button>
            <button  id="usr_log"onclick="user_log()" class="w-25 btn btn-light px-3 font-weight-bold mr-2">{{ __('Create account') }}</button>
                                          </div>
 

 <div id="artist_log" class="card-body text-center py-0">

     <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input style="background:#f1f1f5;"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="background:#f1f1f5;"id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="row">
                                    <a style="color: #ee2f31;" class=" font-weight-bold btn btn-link" href="{{route('forgot','email')}}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button style="background:#ee2f31;" type="submit" class="my-4 btn w-75 text-light font-weight-bold d-block mx-auto">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form> 

                    
                    @if(Session::has('reset'))<p class="text-light font-weight-bold">{{Session::get('reset')}}   @php Session::forget('reset'); @endphp </p>@endif
                    

                   @if(Session::has('login_err'))
                   <div class="alert alert-danger" role="alert">
                                  <p class="">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p> 

                                 </div>  @endif

                </div>




  <!-- HIDDEN USER register -->
<div id="user_log" class="collapse card-body text-center py-0">

                      <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">  
                            <div class="col-md-12">
                                <input style="background:#f1f1f5;"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input style="background:#f1f1f5;"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="">
                                <input style="background:#f1f1f5;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="First Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                <input style="background:#f1f1f5;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Last Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                            <div class="">
                                <input style="background:#f1f1f5;"id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                              </div>

                              <div class="col-md-6">
                            <div class="">
                                 <input style="background:#f1f1f5;"id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                              </div>

                          </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button style="background:#ee2f31;" type="submit" class="my-4 btn w-75 text-light font-weight-bold d-block mx-auto">
                                    {{ __('Create Account') }}
                                </button>

                               
                            </div>

                            
                        </div>
                    </form>
                    
                    @if(Session::has('reset'))<p class="text-light font-weight-bold">{{Session::get('reset')}}  </p>
                      @php Session::forget('reset'); @endphp @endif
                    

                   @if(Session::has('login_err'))
                    <p class="text-danger ">{{Session::get('login_err')}}</p>@php Session::forget('login_err'); 
                    @endphp @endif
                        
                    

                </div>

            </div>



            <script type="text/javascript">
    $('#login').css('border-bottom', '2px solid red');
    $('#business_reg').hide();
    
    function login(){
    $('#register').css('border-bottom', 'none');    
    $('#login').css('border-bottom', '2px solid red');

    $('#all_logins').show();

    }

     function register(){ 
    $('#login').css('border-bottom', 'none');
    $('#register').css('border-bottom', '2px solid red');

   $('#all_logins').hide();
    $('#all_registers').show();
    
    }


</script>


<script type="text/javascript">
    function user_log(){
    $('#art_log').removeClass('btn-success');
    $('#usr_log').removeClass('btn-light');
    $('#usr_log').addClass('btn-success');

    $('#user_log').show();
    $('#artist_log').hide();
    }

     function artist_log(){ 
    $('#usr_log').removeClass('btn-success');
    $('#art_log').removeClass('btn-light');
    $('#art_log').addClass('btn-success');

    $('#artist_log').show();
    $('#user_log').hide();
    
    }


</script>


@endsection
