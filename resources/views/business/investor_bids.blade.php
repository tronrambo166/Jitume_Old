@extends('business.layout')

@section('page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container px-0" id="" style="background:white;">
        
        @if(Session::has('success_update'))
        <div class="w-50 m-auto alert font-weight-bold alert-success alert-dismissible fade show" role="alert">
          <p class="font-weight-bold">{{Session::get('success_update')}}   @php Session::forget('success_update'); @endphp </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  @endif

<style type="text/css">
    .showFormB input, .showFormB select {
    border-top: 1px solid #7c7c7c;
    border-left: 1px solid #c3c3c3;
    border-right: 1px solid #c3c3c3;
    border-bottom: 1px solid #ddd;
    background: #fff;
    height: 28px;
}

</style>

@if(count($bids)==0)
<div class="p-3"> 
             <div class="w-50 m-auto d-block">
                 <img width="120px" src="../images/randomIcons/no_data.png">
                 <p class="text-left ml-2 font-weight-bold">No Data Found!</p>
             </div>
          </div>

 @else
    
 <form action="{{route('bidsAccepted')}}" method="post">  @csrf  
    <div class="row m-auto px-5">  
    <h3 class=" px-0 bid_header text-left my-0 pb-3 py-2 font-weight-bold"> My Bids</h3>      
     <table class="eq table" id="">
    <thead class="table_head border">
        <tr>
            <th>Date </th>
            <th>Investor </th>
            <th>Business</th>
            <th>Type </th>  
            <th>Amount </th> 
            <th>Representaion % </th>
            <th></th>        
        </tr>

    </thead>
    

    
    <tbody>
        @foreach($bids as $ev)
        <tr onclick="bg_change({{$ev->id}});" id="{{$ev->id}}">
            <!-- <td><input onchange="check();" type="checkbox" name="bid_ids[]" value="{{$ev->id}}"></td> -->
            <td>{{$ev->date }}</td>
                <td>
                {{$ev->investor }}
                </td>

                    <td>
                        <a  data-target="#detailsModal{{$ev->id}}" data-toggle="modal" class="bid_btns bg-light rounded ">{{$ev->business}}</a>
                        </td>

                        <td>
                        {{$ev->type }}
                        </td>

                        <td>{{$ev->amount }}</td>
                        <td>{{$ev->representation }}</td>
                        <td>
                            <a onclick="return confirm('Are you sure?');" class="btn-light rounded py-1 text-center small" href="{{route('remove_bids',$ev->id)}}" >Remove</a>
                        </td>
   
        </tr>



<!-- Table temp end -->

<!-- Details MODAL -->
  <div  class="detailsModal modal fade" id="detailsModal{{$ev->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

         <div class="card-header w-100">
           
        </div>

        </div>
    
    
      <div class="modal-body">
                <div class="px-3 card-header w-100">             
            <!-- <input hidden type="number" class="form-control"  name="amount" value=""> -->                     

                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Business Name: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->business}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Category: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->category}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Details: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->details}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Location: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->location}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Investment Needed: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->investment_needed}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


                <div class="row my-1 row form-group">
                    <div class="col-sm-12 my-1"> 
                    <div class="row">
                           <div class="col-sm-10"><label class="h4" for="name">
                                <h5 class=""> <b> Share Offers: </b> </h5></label>
                               </div>
                    
                    <div class="col-sm-12"> 
                        <div class="upload-btn-wrapper">
                        <p>{{$ev->share}}</p>
                        </div>
                    </div>

                    </div>
                    </div> 
                </div>


         </div>

        </div>

        <div class="modal-footer">

        <div class="card-header w-100 text-center">
            <form action="stripe" method="get">
       
                 <input type="text" hidden id="price" name="price" :value="form.investors_fee">
                  <input type="number" hidden id="listing_id" name="listing_id" :value="form.listing_id">


        <button type="button" class=" btn border border-dark w-25 d-inline px-3 font-weight-bold m-0 " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Ok</span>
        </button>

            </form>
        
         </div>

      </div>

        </div>
        </div>
        </div>


<!-- Details MODAL -->






         @endforeach
      
    
    </tbody> 
    
    
</table>
               

</div>
</form>
   @endif

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script type="text/javascript">
  function accept() {
            alert('Please select a bid!');
    }

    function check() {
    var checked  = '';
    [...document.querySelectorAll('input[name="bid_ids[]"]:checked')]
   .forEach((cb) => checked = checked+cb.value+',');

        var ids = checked;
        if(ids != '')
        {
        $('#fakeBtn').hide();
        $('#fakeBtnR').hide();
        $('#realBtn').show();
        $('#realBtnR').show();   
        }
        else{
        $('#fakeBtn').show();
        $('#fakeBtnR').show();
        $('#realBtn').hide();
        $('#realBtnR').hide();
        }
    }

    function confirm() {
        $.confirm({
                        title: 'Are you sure?',
                        content: 'Are you sure to remove?',
                        buttons: {
                           confirm: function () {},
                            cancel: function () {
                                $.alert('Canceled!');
                            },
                        }
                    });
    }
</script>
                


@endsection



