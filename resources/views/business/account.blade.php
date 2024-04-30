@extends('business.layout')

@section('page')
  <div class="container px-0" id="">
        
         @if(Session::has('success'))
        <div class="w-50 m-auto alert font-weight-bold alert-info alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">{{Session::get('success')}}   @php Session::forget('success'); @endphp </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  @endif

        @if(Session::has('error'))
        <div class="w-50 m-auto alert font-weight-bold text-danger alert-warning alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">{{Session::get('error')}}   @php Session::forget('error'); @endphp </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  @endif

        
        <h4 class="bid_header px-3 w-100 text-left my-0 pb-3 py-2 font-weight-bold"> Account</h4> 


        @if($connected == 1)
        <div class="row w-75 mx-auto my-3">
         <div class="col-sm-12"> 
            <p class="text-center bg-light p-2 "><b>Fist name:</b> {{$user->fname}}</p>
            <p class="text-center bg-light p-2 "><b>Last name:</b> {{$user->lname}}</p>
            <p class="text-center bg-light p-2 "><b>Balance Available:</b> <span style="font-family:cursive;">{{$balanceA}}</span></p>
            <p class="text-center bg-light p-2 "><b>Balance Pending:</b> <span style="font-family:cursive;">{{$balanceP}}</span></p>
               <a href="{{route('connect.stripe',['id'=>$user_id])}}" class="btn-light border border-dark w-25 m-auto rounded text-center py-1" >View Stripe Account</a>

         </div>
        </div>

        @else
        <div class="row w-75 mx-auto my-3">
         <div class="col-sm-12"> 
            <p class="text-center bg-light p-2 "> You must onboard to Jitume Stripe platform to receive business milestone payments.</p>
               <a href="{{route('connect.stripe',['id'=>$user_id])}}" class="btn-light border border-dark w-25 m-auto rounded text-center py-1" >Connect to Stripe</a>

         </div>
        </div>

        @endif
                

            </div>


            <div class="clear"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

       <script type="text/javascript">
           $('#file-upload').change(function() {
              var i = $(this).prev('label').clone();
              var file = $('#file-upload')[0].files[0].name;
              $(this).prev('label').text(file);
            });

            $('#file-upload2').change(function() {
              var i = $(this).prev('label').clone();
              var file = $('#file-upload2')[0].files[0].name;
              $(this).prev('label').text(file);
            });

            $('#file-upload3').change(function() {
              var i = $(this).prev('label').clone();
              var file = $('#file-upload3')[0].files[0].name;
              $(this).prev('label').text(file);
            });

            $('#file-upload4').change(function() {
              var i = $(this).prev('label').clone();
              var file = $('#file-upload4')[0].files[0].name;
              $(this).prev('label').text(file);
            });

            $('#file-upload5').change(function() {
              var i = $(this).prev('label').clone();
              var file = $('#file-upload5')[0].files[0].name;
              $(this).prev('label').text(file);
            });
        </script>


  <script type="text/javascript">
  
    function bookForm(shift) {
      $('#choose').hide();
      $('#booking').show();
    }

    function paid_price() {
      $('#paid_price').show();  
    }
     function free_price() {
      $('#paid_price').hide(); 
    }
  </script>

@endsection



