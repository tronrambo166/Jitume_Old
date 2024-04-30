@extends('layout')

@section('page')
    <div class="container" id="">
        
        <h3 class="text-center font-weight-bold bg-light"><b class="h5 text-success" > {{ Session:: get('success') }}</b> </h3>
        <div class="row pt-4 w-75 m-auto">
           
                <div class="col-sm-12">
                  

            <form action="{{route('create-event-post')}}"  method="post" enctype="multipart/form-data">
            @csrf   
                            
                            
                <div class="row form-group">
                    <label class="h3 mb-4" for="name">
                                <strong>Event Info</strong></label>
                    <div class="col-sm-6"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Event Name</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <input required="" style="background:#f1f1f5;" class=" form-control border border-none rounded form-group" type="text" name="name" id="title" placeholder="Event Name"  /> 
                    </div>
                        </div>
                    </div>

                    <div class="col-sm-6"> 
                        <div class="row">
                            <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Public or Private</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <input required="" type="radio" name="type" value="private">

                     <label class="h6 font-weight-bold">Private</label> <br>
                     <input required="" class="h4" type="radio" name="type" value="public">

                     <label class="h6 font-weight-bold">Public</label>
                    </div>
                        </div>
                    </div>
                    
                </div>


                   <div class="row form-group">
                    
                    <div class="col-sm-6"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Event Type</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <select required="" style="background:#f1f1f5;" class="form-control" name="event_type" class="">
                      <option class="form-control" value="">Select</option>
                      <option class="form-control" value="Appearance or Signing">Appearance or Signing</option>
                      <option value="Camp, Trip, or Retreat">Camp, Trip, or Retreat</option>
                      <option value="Class, Training, or Workshop">Class, Training, or Workshop</option>
                      <option value="Concert or Performance">Concert or Performance</option>
                      <option value="Conference">Conference</option>
                      <option value="Conference">Conference</option>
                      <option value="Dinner or Gala">Dinner or Gala</option>
                      <option value="Festival or Fair">Festival or Fair</option>
                      <option value="Game or Competition">Game or Competition</option>
                      <option value="Meeting or Networking Event">Meeting or Networking Event</option>
                      <option value="Party or Social Gathering">Party or Social Gathering</option>
                      <option value="Race or Endurance Event">Race or Endurance Event</option>
                      <option value="Rally">Rally</option>
                      <option value="Screening">Screening</option>
                      <option value="Seminar or Talk">Seminar or Talk</option>
                      <option value="Tour">Tour</option>
                      <option value="Tournament">Tournament</option>
                      <option value="Tradeshow, Consumer Show, or Expo">Tradeshow, Consumer Show, or Expo</option>
                      </select>
                    </div>
                        </div>
                    </div>
                    <div>

                    <div class="row">

                    <div class="col-sm-6 my-4"> 
                        <div class="row ">
                            <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Event Category</strong></label></div>
                    
                    <div class="col-sm-7"> 
                     <select required="" style="background:#f1f1f5;" class="form-control" name="category" class="">
                      <option class="form-control font-weight-bold" value=""><b>Select</b></option>
                      <option value="Auto, Boat &amp; Air">Auto, Boat &amp; Air</option>
                      <option value="Business &amp; Professional">Business &amp; Professional</option>
                      <option value="Charity &amp; Causes">Charity &amp; Causes</option>
                      <option value="Community &amp; Culture">Community &amp; Culture</option>
                      <option value="Family and Education">Family and Education</option>
                      <option value="Fashion and Beauty">Fashion and Beauty</option>
                      <option value="Film, Media &amp; Entertainment">Film, Media &amp; Entertainment</option>
                      <option value="Food and Drink">Food and Drink</option>
                      <option value="Government &amp; Politics">Government &amp; Politics</option>
                      <option value="Health &amp; Wellness">Health &amp; Wellness</option>
                      <option value="Hobbies &amp; Special Interest">Hobbies &amp; Special Interest</option>
                      <option value="Home &amp; Lifestyle">Home &amp; Lifestyle</option>
                      <option value="Music">Music</option>
                      <option value="Performing &amp; Visual Arts">Performing &amp; Visual Arts</option>
                      <option value="Religion &amp; Spirituality">Religion &amp; Spirituality</option>
                      <option value="School Activities">School Activities</option>
                      <option value="Science &amp; Technology">Science &amp; Technology</option>
                      <option value="Seasonal &amp; Holiday">Seasonal &amp; Holiday</option>
                      <option value="Sports &amp; Fitness">Sports &amp; Fitness</option>
                      <option value="Travel &amp; Outdoor">Travel &amp; Outdoor</option>
                      </select>
                    </div>
                        </div>
                    </div>
                    
                </div>



                   <div class="row my-5 row form-group">
                    <label class="h3 mb-4" for="name">
                                <strong>Special Event Details</strong></label>
                    
                    <div class="col-sm-6"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>When the event is scheduled?</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <p><input required="" name="s_day" class="w-100 rounded my-1 py-1 pl-2 font-weight-bold border border-dark"  type="text" placeholder ="Start Date" id="datepicker3" value=""></p>

                    <p><input required="" name="e_day" class="w-100 rounded my-1 py-1 pl-2 font-weight-bold border border-dark"  type="text" placeholder ="End Date" id="datepicker4" value=""></p>

                    </div>
                        </div>
                    </div>

                    <div class="col-sm-6"> 
                        <div class="row">
                            <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Event Price Category</strong></label></div>
                  <div class="col-sm-7"> 
                    <input required="" onclick="free_price();" type="radio" name="isFree" value="yes">

                     <label class="h6 font-weight-bold">Free</label> <br>
                     <input required="" onclick="paid_price();" class="h4" type="radio" name="isFree" value="no">

                    <label class="h6 font-weight-bold">Paid</label>

                    <div class="row collapse" id="paid_price">
                        <div class="col-sm-6 p-0 my-2"><small style="font-size: 11px;">Per Day</small> <input style="width: 62%;" class=" rounded border border-none d-inline" type="number" placeholder="Price" name="per_day"></div>

                         <div class="col-sm-6 p-0"><small style="font-size: 11px;">Per Hour</small> <input style="width: 62%;" class=" rounded border border-none d-inline" type="number" placeholder="Price" name="per_hour"></div>

                    </div>

                    </div>
                        </div>
                    </div>


                    <div class="col-sm-12 mt-4"> 
                        <div class="row">
                           <div class="col-sm-2 mt-1"><label class="h6" for="details">
                                <strong>Event Details</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <textarea required="" style="background:#f1f1f5;" class=" form-control border border-none rounded form-group"  name="details" id="title"  > Details... </textarea>
                    </div>
                        </div>
                    </div> 

                    <div class="col-sm-12 my-4"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h2" for="name">
                                <strong>Event Materials</strong></label>
                                <p class="py-0 my-0 font-weight-bold">(upload event posters)</p></div>
                    
                    <div class="col-sm-7"> 
                    <div class="upload-btn-wrapper">
                      <button class="btnUp">Upload <i class="ml-2 fa fa-arrow-up"></i></button>
                      <input required="" multiple type="file" name="posters[]" />
                    </div>
                    </div>
                        </div>
                    </div> 


                    <div class="col-sm-12 my-4"> 
                        <label class="h2" for="name">
                                <strong>Location</strong></label>

                        <div class="row">
                           <div class="col-sm-2 mt-1"><label class="h6" for="name">
                                <strong>Location</strong></label>
                               </div>
                    
                    <div class="col-sm-7"> 
                    <textarea required="" style="background:#f1f1f5;" class=" form-control border border-none rounded form-group"  name="address" id="title"  > Location... </textarea>
                    </div>
                        </div>
                    </div> 


                    
                </div>

                 <div class="row my-4"> 
                    <button style="background:#0eaf5d;" class="w-75 m-3 btn text-white font-weight-bold">Publish Event</button></div>


            </form>

                    </div>
                     </div>
                      </div>

                  
               

            <div class="clear"></div>
        

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



