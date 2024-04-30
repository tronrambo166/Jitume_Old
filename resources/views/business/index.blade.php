@extends('business.layout')
@php //echo 'Dashboard is under maintanance!'; exit; @endphp

@section('page')
 <div class="container px-0 h-100">
    <div class="bid_header"></div>
  
  @if(Session::has('file_error'))
  <p class="d-block mx-auto btn btn btn-light text-danger font-weight-bold text-center">
      {{Session::get('file_error')}} @php Session::forget('file_error'); @endphp</p>@endif

   @if(isset($investor) && $investor == true ) 
   <div class="row m-auto">  
   <h3 class="bid_header my-0 text-left pb-3 py-2 font-weight-bold"> My Investments</h3>       
     <table class="eq table" id="">
    <thead class="table_head border">
        <tr>
            <th>Name </th>
            <th>Category </th>
            <th style="width: 10%;">Value Needed</th>
            <th>Details </th>  
            <th>Contact </th> 
            <th style="width: 11%;">Business Share </th> 
            <th style="width: 11%;">My Share </th>
            <th>Image </th> 
            <th width="20%" class="text-center">Action</th>        
        </tr>

    </thead>
    

    
    <tbody>
        @foreach($results as $ev) @php $coded_id = base64_encode($ev->id); $coded_id = base64_encode($coded_id); @endphp
        <tr class="invest_heading" onclick="bg_change({{$ev->id}});" id="{{$ev->id}}">
            <td>{{$ev->name }}</td>
                <td>{{$ev->category }}</td>
                    <td>{{$ev->investment_needed }}</td>
                        <td>{{$ev->details }}</td>
                        <td>{{$ev->contact }}</td>
                        <td>{{$ev->share }}%</td>
                        <td>{{$ev->myShare }}%</td>
                        <td><img width="100px" height="60px" src="../{{$ev->image}}"></td>
   
            <td class="text-center">
                
            <a style="border-radius: 4px;" href="./../#/business-milestone/{{$coded_id}}" class="btn btn-outline-success border border-dark small px-3 py-1  my-1 d-inline-block py-0">View Milestone</a >
            

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


@else
 
 @if($services->count())       
<div class="row m-auto">
     <h3 class="bid_header text-left my-0 pb-3 py-2 font-weight-bold"> My Services</h3> 

    <table class="eq table" id="d_table" style="border-collapse:collapse;">
    <thead  class="table_head border">
        <tr>
            <th>Name </th>
            <th>Category </th>
            <th>Price </th>  
            <th>Details </th> 
            <th>Location </th> 
            <th>Image </th> 
            <th width="20%" class="text-center">Action</th>        
        </tr>

    </thead>
       
    <tbody>
        @foreach($services as $ev) @php $coded_id = base64_encode($ev->id); $coded_id = base64_encode($coded_id); @endphp
        <tr onclick="bg_change({{$ev->id}});" id="{{$ev->id}}">
            <td>{{$ev->name }}</td>
                <td>{{$ev->category }}</td>
                    <td>{{$ev->price }}</td>
                        <td>{{$ev->details }}</td>
                        <td>{{$ev->location }}</td>
                        <td><img class="rounded" width="72px" height="40px" src="../{{$ev->image}}"></td>
   
            <td class="text-center">

            <a style="border-radius: 4px;font-size: 12px;font-weight: 500; background: white;" href="./../#/service-milestone/{{$coded_id}}" class="btn border text-success small px-3 py-1  my-1  d-inline-block py-0">View Milestone</a >
            

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@else

    <div class="p-3">
       <h3 class="text-left my-0 pb-3 py-2 font-weight-bold"> My Services</h3> 

       <div class="w-50 m-auto d-block">
           <img width="120px" src="../images/randomIcons/no-service.png">
           <p class="text-left ml-4 font-weight-bold">No Services</p>
       </div>

       <div class="mb-5 pb-3">
        <li style="list-style-type: none;" class="w-50 nav-item py-1 mx-auto text-secondary ">
                        <a href="{{route('add-services')}}" style="border-radius: 5px;border: 1px solid green;text-decoration: none;" class="px-3 ml-1 btn searchListing py-1" href="">Add Service</a>
                    </li> 
        </div>
    </div>


@endif


@if($business->count())       
<div class="row mx-auto pt-3">
     <h3 class="bid_header text-left my-0 pb-3 pt-3 font-weight-bold"> My Businesses</h3> 

    <table class="eq table" id="d_table2">
    <thead class="table_head border">
        <tr>
            <th>Name </th>
            <th>Category </th>
            <th>Required</th>
            <th>Details </th>  
            <th>Contact </th> 
            <th>Share </th> 
            <th>Image </th> 
            <th width="20%" class="text-center">Action</th>        
        </tr>

    </thead>
    

    
    <tbody>
        @foreach($business as $ev) @php $coded_id = base64_encode($ev->id); $coded_id = base64_encode($coded_id); @endphp
        <tr onclick="bg_changeB({{$ev->id}});" id="b{{$ev->id}}">
            <td>{{$ev->name }}</td>
                <td>{{$ev->category }}</td>
                    <td>{{$ev->investment_needed }}</td>
                        <td>{{$ev->details }}</td>
                        <td>{{$ev->contact }}</td>
                        <td>{{$ev->share }}</td>
                        <td><img class="rounded" width="72px" height="40px" src="../{{$ev->image}}"></td>
   
            <td class="text-center">
            <a style="border-radius: 4px;font-size: 12px;font-weight: 500;background: white;" href="./../#/business-milestone/{{$coded_id}}" class="text-success btn small px-3 py-1  my-1  d-inline-block py-0 border">View Milestone</a >
            
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@else
    <div class="pt-3">
       <h3 class="text-left my-0 pb-3 py-2 font-weight-bold"> My Businesses</h3> 

       <div class="w-50 m-auto d-block">
           <img width="120px" src="../images/randomIcons/no-listing.png">
           <p class="text-left ml-4 font-weight-bold">No Business</p>
       </div>

       <div class="mb-5 pb-3">
        <li style="list-style-type: none;" class="w-50 nav-item py-1 mx-auto text-secondary ">
                        <a href="{{route('add-listing')}}" style="border-radius: 5px;border: 1px solid green;text-decoration: none;" class="px-3 ml-1 btn searchListing py-1" href="">Add Business</a>
                    </li> 
        </div>

    </div>
@endif



<!--   <div class="h-75 w-75 m-auto d-flex align-items-center justify-content-center">
        <div class="mb-5 pb-3 w-50 text-center mx-auto"><li style="list-style-type: none;" class="nav-item py-1 px-3 text-secondary ">
                        <a href="{{route('add-listing')}}" style="border-radius: 5px;border: 1px solid green;text-decoration: none;" class="px-5 btn btn-outline-success font-weight-bold" href="">Add Business</a>
                    </li> </div>

                    <div class="mb-5 pb-3 w-50 text-center mx-auto"><li style="list-style-type: none;" class="nav-item py-1 px-3 text-secondary ">
                        <a href="{{route('add-services')}}" style="border-radius: 5px;border: 1px solid green;text-decoration: none;" class="px-5 btn btn-outline-success font-weight-bold" href="">Add Service</a>
                    </li> </div>
    </div> -->

    @endif
<div class="clearfix my-4"></div>





    <!-- ADD DOC MODAL -->
  <div  class="modal fade" id="multiple_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <div class="card-header w-100">
           <h3>Add Documents</h3>
        </div>       

        <button type="button" class="m-0 close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">
        <form action=""  method="post" enctype="multipart/form-data">
                                @csrf
                                        
                             <!--   <div class="row ">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Document Name</label>
                                            <input required="" name="eq_name" type="text"  class="form-control">
                                        </div>
                                    </div> -->


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
            <select required=""  name="listing" class="border-none form-control">
            <option hidden class="form-control" >Select Business</option>

            @foreach($business as $b)
            <option value="{{$b->id}}" class="form-control" >{{$b->name}}</option> @endforeach

           </select>
                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-6 my-3">
                                        <div class="form-group">
                                            <label>Files</label>
                                            <input required=""  type="file" multiple name="files[]" class="form-control" >
                                        </div>
                                    </div>

                                   
                           
                                </div>
                                <input type="submit" class="w-50 m-auto my-4 btn btn-primary btn-block" value="Save" />
                            </form>

    </div>
    </div>
    </div>
    </div>
      <!--  ADD MODAL -->



         <!--SUPPORTIVE  ADD MODAL -->
  <div  class="modal fade" id="support_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <div class="card-header w-100">
           <h3>Add Documents</h3>
        </div>       

        <button type="button" class="m-0 close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">
        <form action="{{route('add_docs')}}"  method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="text" value="yes" name="supportive">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
            <select required=""  name="listing" class="border-none form-control">
            <option hidden class="form-control" >Select Business</option>

            @foreach($business as $b)
            <option value="{{$b->id}}" class="form-control" >{{$b->name}}</option> @endforeach

           </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 my-3">
                                        <div class="form-group">
                                            <label>Files</label>
                                            <input required=""  type="file" multiple name="files[]" class="form-control" >
                                        </div>
                                    </div>

                                   
                           
                                </div>
                                <input type="submit" class="w-50 m-auto my-4 btn btn-primary btn-block" value="Save" />
                            </form>

    </div>
    </div>
    </div>
    </div>
      <!-- ADD MODAL -->




      <!-- ADD VIDEO -->
  <div  class="modal fade" id="add_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <div class="card-header w-100">
           <h3>Upload Media/Video</h3>
        </div>       

        <button type="button" class="m-0 close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">
        <form action=""  method="post" enctype="multipart/form-data">
                                @csrf
                                        
                             <!--   <div class="row ">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Document Name</label>
                                            <input required="" name="eq_name" type="text"  class="form-control">
                                        </div>
                                    </div> -->


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
            <select required=""  name="listing" class="border-none form-control">
            <option hidden class="form-control" >Select Business</option>

            @foreach($business as $b)
            <option value="{{$b->id}}" class="form-control" >{{$b->name}}</option> @endforeach

           </select>
                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-6 my-3">
                                        <div class="form-group">
                                            <label>Files</label>
                                            <input required=""  type="file" multiple name="files" class="form-control" >
                                        </div>
                                    </div>

                                   
                           
                                </div>
                                <input type="submit" class="w-50 m-auto my-4 btn btn-primary btn-block" value="Save" />
                            </form>

    </div>
    </div>
    </div>
    </div>
      <!--  ADD VIDEO -->


    </div>

<script type="text/javascript">
    function bg_change(id) {
        //$('#'+id).addClass('bg_light');
        $('#'+id).addClass('background','#e5eef5b8');
     }
     function bg_changeB(id) {
        //$('#b'+id).addClass('bg_light');
        $('#'+id).css('background','#e5eef5b8');
     }

    window.onload(){
      $('#d_table').removeClass('dataTable ')
    }
</script>

@endsection
