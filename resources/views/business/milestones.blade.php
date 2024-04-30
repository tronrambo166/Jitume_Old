@extends('business.layout')

@section('page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container px-0" id="">
        
        

<div class="card-header w-100">
<h3 class="bid_header px-5 w-100 text-left my-0 pb-3 py-2 font-weight-bold">Milestones </h3> 

 <div class="mx-5 my-2 mx-auto d-block">
  <div class="dropdown show d-block ml-auto mt-3 d-block" style="width:15%;">
                  <a class="mile border btn py-1 dropdown-toggle ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset($business_name)) {{$business_name}} @else Select Business @endif
                  </a>
                 <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuLink">
                    <li style="list-style-type: none;" class="text-center nav-item py-0 px-0 text-secondary">
                          @foreach($business as $b)
                <a style="font-size:13px;" class="dropdown-item" href="{{route('milestones', $b->id) }}">{{$b->name}}</a>
                 @endforeach

                    </li>
                    
                  </div>
                </div> 


</div>

      
         <!-- <div class="w-50 d-inline-block float-right">
          <select onchange="BusinessMilestones(this.value);" class="w-50" required  name="business_id" class="w-100 rounded border border-dark p-2 ">

            @foreach($business as $b)
            <option value="{{$b->id}}" class="form-control" >{{$b->name}}</option> @endforeach

           </select> 
            </div> -->

  

            </div>


 <div class="row px-5 m-auto">

            
    <table class="eq table" id="">
    <thead class="table_head border">
        <tr>
            <th>Milestone Name </th>
            <th>Business </th>
            <th>Amount</th>
            <th width="30%">Status</th>
            <th  class="text-center">Action</th>        
        </tr>

    </thead>
    

    
    <tbody> @php $c=1; @endphp
        @foreach($milestones as $ev)
        <tr onclick="bg_change({{$ev->id}});" id="{{$ev->id}}">
            <td>{{$ev->title }}</td>
                <td> @foreach($business as $b)
                     @if($ev->listing_id == $b->id)
                       {{$b->name}}
                       @endif @endforeach
               </td>
                    <td>{{$ev->amount }}</td>

        <td>
        <form action="{{route('mile_status')}}" method="post" class="form-inline">@csrf

            @if($ev->status == 'In Progress')
            <select  name="status" style="width:50%;" class="border py-1 text-center border-none d-inline rounded px-1 ">  
            <option hidden value="In Progress" class="form-control" >In Progress</option>    
            <option value="To Do" class="form-control" >To Do</option>
            <option value="Done" class="form-control" >Done</option>                
           </select>
           @elseif($ev->status == 'To Do')
            <select  name="status" style="width:50%;" class=" d-inline rounded  px-1 ">     
            <option selected hidden value="To Do" class="form-control" >To Do</option> 
             <option value="In Progress" class="form-control" >In Progress</option>
            <option value="Done" class="form-control" >Done</option>                
           </select>
           @else
           <input readonly type='text' name="status" value="{{$ev->status}}" class="btn btn-light py-0 w-50"></input>
           @endif
          

           <input type="submit" value="Set" class="ml-2 mb-0 d-inline buttonEq2 w-25 py-0">

            <input hidden type="number" name="id" value="{{$ev->id}}">
           </form> 
        </td>

            <td class="text-center">
            
            <div class="dropdown show d-inline-block">
                  <a class="py-0 btn border dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action 
                  </a>
                 <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuLink">

            <a onclick="return confirm('Are you sure?');" href="{{route('delete_milestone',$ev->id)}}" class="btn dropdown-item rounded btn-light py-0 my-1">Delete</a>
            </div>  
            

            </td>
        </tr>

    @endforeach
    </tbody> 
    
    
</table>
               

                </div>

                </div>

               

            </div>


            <div class="clear"></div>
            <div class="clearfix py-5"></div>

        </div>
        </div>


@endsection



