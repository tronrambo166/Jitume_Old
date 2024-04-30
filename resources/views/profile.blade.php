@extends('layout')
@section('page')
    <div class=" w-75 m-auto px-5 container" id="">
        
         
        <div class="heading">
                    <h3 class="my-4 bg-light text-center text-dark">Profile</h3> 
                </div>
                

        <div class="row pt-4 w-75 m-auto">
           
       <div id="user_log" class="card-body text-center py-0">

                      <form method="POST" action="{{ route('up_profile') }}">
                        @csrf


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="">
                                <input style="background:#f1f1f5;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ $user->fname }}" required autocomplete="name" autofocus placeholder="First Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                <input style="background:#f1f1f5;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ $user->lname }}" required autocomplete="name" autofocus placeholder="Last Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            
                        </div>

                        <div class="row mb-3">  
                            <div class="col-md-12">
                                <input style="background:#f1f1f5;"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input style="background:#f1f1f5;"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email"placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="row mb-3">
                            <div class="col-md-12">
                            <div class="">
                                <input value="{{ $user->password }}" style="background:#f1f1f5;"id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ $user->password }}"
                                required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                              </div>

                              <div class="col-md-12">
                            <div class="">
                            <h4 class="text-left mt-3 font-weight-bold">Change Password:</h4> 
                                 <input style="background:#f1f1f5;"id="password-confirm" type="password" class="form-control" name="password" autocomplete="new-password" placeholder="new password">

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
                                <button style="background:#ee2f31;" type="submit" class="my-4 btn w-75 text-light font-weight-bold d-block mx-auto py-2">
                                    {{ __('Update') }}
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


            <div class="clear"></div>
        </div>


@endsection



