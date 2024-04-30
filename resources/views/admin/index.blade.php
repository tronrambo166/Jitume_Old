




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>

		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		
       
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


	
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

		<style>
	


.info{ background:darkblue;}		
		
		</style>
		
		
   </head>
   
   
	
	
	
	
    <body class="" style="background:url(../images/body_bg3.jpg) repeat" >
	
	
	
	
        <nav class="sb-topnav navbar navbar-expand navbar-dark info">
            <a  class=" text-danger ml-2 disabled font-weight-bold">Cpanel / </a> <a class="navbar-brand" href=""> Dashboard</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"></button
            ><!-- User's Name-->
           
		   <div class="navbar ml-auto">
		   
		   <h4 class=" profile h5 text-light font-weight-bold font-italic text-right" >Welcome, 
		  </h4>
		   
		   
            <!-- Navbar-->
            <ul class="navbar-nav  ml-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mb-1 fa-2x fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('admin/logout') }}" method="post"> @csrf
                        	<button class="btn btn-light" type="submit"><b>Logout</b></button>

                        </form>
                    </div>
                </li>
            </ul>
		   
		   </div>
		   
		   
        </nav>
		
		
			
			
            <div class="" id="layoutSidenav_content">
                
                    <div  class="admin container">
					<div class="row">
					<div class="col-3">
					
					<div class="list-group menu  mt-3">
					<a href="" class="list-group-item bg-info text-dark font-weight-bold disabled font-italic ">Site Options</a>
					
					
					
					<a href=" {{ route('orders') }}" 
					class=" list-group-item">Orders</a>
					
					
					<a href="#brand" data-toggle="collapse"
					class=" list-group-item ">Brands Section</a>
					
					<div id="brand"class="collapse ml-4
					@if(Route::is('addbrand') || Route::is('manbrand')) show @endif  ">
					<a href="{{ route('addbrand') }}" 
					class=" list-group-item bg-dark">Add New Brand</a>
					
					<a href="{{ route('manbrand') }}" 
					class=" list-group-item bg-dark">All Brands</a>
					</div>
					
					
					
					
					<a href="#cat" data-toggle="collapse"
					class=" list-group-item">Categories</a>
					
					<div id="cat"class="collapse ml-4
					@if(Route::is('addcategory') || Route::is('mancat')) show @endif   ">
					<router-link to="add-category" 
					class=" bg-light  list-group-item">Add a Category</router-link>
					
					<router-link to="manage-category" 
					class="bg-light  list-group-item">Manage Categories</router-link>
					</div>
					
					
					
					<a href="#pro" data-toggle="collapse"
					class=" list-group-item">Products</a>
				
					<div id="pro"class="collapse ml-4
					@if(Route::is('addcategory') || Route::is('addpro')) show @endif   ">
					<router-link to="add-product" 
					class=" bg-light  list-group-item">Add a Product</router-link>
					
					<router-link to="manage-product" 
					class="bg-light  list-group-item">Manage Products</router-link>
					</div>
					
					
					
					</div>
					
					
					
					
					
					
					
					</div>
					
					
					
					<div class="col-9">                       
					  
					  <router-view></router-view> 
					 <!--  @yield('admin-pages') -->
					   
					 
					   
					   
                        </div>
                    </div>
					</div>
					
					
					
					
					
					
					
					
					
					
					
                
				
				
				
				</div>
				
				<div class="py-5"></div>
				
                <footer class="py-4 bg-light mt-auto  fixed-bottom mt-5">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-dark font-weight-bold m-auto">Copyright &copy; Tottenham 2019, All rights reserved.</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div></div>
        
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

       <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
      
		
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

		 {{-- <script src="{{asset('../../js/ajax.js')}}"> </script> --}}

         <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

		
		
		<script type="text/javascript">
		
		$(document).ready(function() {
  $('#summernote').summernote();
});
		
		</script>
		
		<script type="text/javascript">
		
		
		$(document).ready( function () {
			
			$('.menucontainer').click(function(event){
  event.stopPropagation();
});
			
			
    $('#myTable').DataTable();
} );
		
		</script>
		
    </body>
</html>
