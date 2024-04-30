


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
	
	

	
	
	
	
	
	    <body class="">
	
	
	
	
	

                             <div class="container">
                                <h6 class="bg-light text-center text-danger">{{ Session::get('success') }}</h6>

                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow border-0 rounded-lg mt-5">
                                    <div class="card-header bg-light"><h3 class="text-center font-weight-light my-4"><b>Online Store (Admin Panel)</h3></div>
                                    <div class="text-center text-primary "><b class=" font-italic  " >
                                      </b> </div>

                                    <div class="card-body bg-dark shadow">


                                        <form  method="post" action="{{ route('admin/login') }}">
                                            @csrf

                                            <div class="form-group"><label class="small text-light mb-1" for="inputEmailAddress">Email</label>
                                            
                                            <input class=" ml-5 px-5 my-2" type="email" name="email" id="inputEmailAddress" placeholder="Enter email address"
                                            value=""  /></div>
                                            
                                         @error('email')  <span class="text-danger font-italic">  {{$message}}</span> @enderror

                                                                                        
                                                                                        
                                            <div class="form-group"><label class=" text-light small mb-1" for="inputPassword">Password</label>
                                            
                                            <input class=" ml-4 my-2 px-5" name="password" id="inputPassword" type="password" placeholder="Enter password"
                                            value=""            /></div>
                                            
                                            @error('password')  <span class="text-danger font-italic">  {{$message}}</span> @enderror

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                
                                                <input class="custom-control-input  text-light" value="1" name="remember" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label text-light
                                                
                                                " for="rememberPasswordCheck">Remember password</label></div>
                                            
                                             
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">
                                            @if (Route::has('forgetPass')) 
                                            <a href="{{ route('password.request') }}" class="text">Forgot password ?</a> @endif
                                            
                                            <input type="submit"class="btn btn-dark text-light ml-auto font-weight-bold " href="" name="Login" value="Login" /></div>
                                        </form>

                                        </div> 
                                        </div> 
                                        </div> 
                                        </div> 
                                        </div> 


       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>
