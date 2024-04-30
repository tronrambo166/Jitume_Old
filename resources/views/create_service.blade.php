@extends('layout')

@section('page')
    <div class="container" id="">
        
        <h3 class="text-center font-weight-bold bg-light"><b class="h5 text-success" > {{ Session:: get('success') }}</b> </h3>
        <div class="row pt-4 w-75 m-auto">
           
                <div class="col-sm-12">
                  

            <form action="{{route('create-service-post')}}"  method="post" enctype="multipart/form-data">
            @csrf   
                            
                            
                <div class="row form-group">
                    <label class="h3 mb-4" for="name">
                                <strong>Service Info</strong></label>
                    <div class="col-sm-6"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Service Name</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <input required="" style="background:#f1f1f5;" class=" form-control border border-none rounded form-group" type="text" name="s_name" id="title" placeholder="Service Name"  /> 
                    </div>
                        </div>
                    </div>

                    <div class="col-sm-6"> 
                        <div class="row">
                            <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Phone</strong></label></div>
                    
                    <div class="col-sm-7"> 
                    <input required="" type="text" class="form-control" placeholder="Phone" name="phone" value="">                     
                    </div>
                        </div>
                    </div>
                    
                </div>


                   <div class="row form-group">
                    
                    <div class="col-sm-6"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h6" for="name">
                                <strong>Business Description</strong></label></div>
                    
                 <div class="col-sm-7"> 
                    <textarea required="" style="background:#f1f1f5;" class=" form-control border border-none rounded form-group"  name="s_details" id="title"  > Details... </textarea>
                    </div>

                        </div>
                    </div>
                    <div>

                    <div class="row">

                    <div class="col-sm-12 my-4"> 

                        <div class="row ">
                            <div class="col-sm-3 mt-1"><label class="h6" for="name">
                                <strong>Service Category</strong></label>
                            </div>
                    
<div class="col-sm-8"> 
               
  <div class="row rz-buttons rz-no-select rz--style-v1">
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Bouncing Castles">
 <span class="rz-transition small">Bouncing Castles</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Catering">
 <span class="rz-transition small">Catering</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Clowns">
 <span class="rz-transition small">Clowns</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Dancers">
 <span class="rz-transition small">Dancers</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Deejay">
 <span class="rz-transition small">Deejay</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Emcee">
 <span class="rz-transition small">Emcee</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Entertainers">
 <span class="rz-transition small">Entertainers</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Event Chairs">
 <span class="rz-transition small">Event Chairs</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Event Licensing">
 <span class="rz-transition small">Event Licensing</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Face Painting">
 <span class="rz-transition small">Face Painting</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Generators">
 <span class="rz-transition small">Generators</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Influencer">
 <span class="rz-transition small">Influencer</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Interior Decorations">
 <span class="rz-transition small">Interior Decorations</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Lighting">
 <span class="rz-transition small">Lighting</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Location Manager">
 <span class="rz-transition small">Location Manager</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Make up artist">
 <span class="rz-transition small">Make up artist</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Mobile Toilets">
 <span class="rz-transition small">Mobile Toilets</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Performance Stage">
 <span class="rz-transition small">Performance Stage</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Photography">
 <span class="rz-transition small">Photography</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Security">
 <span class="rz-transition small">Security</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Soft Drinks">
 <span class="rz-transition small">Soft Drinks</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Sound System">
 <span class="rz-transition small">Sound System</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Stylist">
 <span class="rz-transition small">Stylist</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Tents">
 <span class="rz-transition small">Tents</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Venue Provider">
 <span class="rz-transition small">Venue Provider</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Visual Display, Lighting">
 <span class="rz-transition small">Visual Display & Lighting</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Visual Displays">
 <span class="rz-transition small">Visual Displays</span>
 </div>
  <div class="rz-btn col-sm-3">
 <input type="checkbox" name="service_cats[]" value="Wines and Spirits">
 <span class="rz-transition small">Wines and Spirits</span>
 </div>
 </div>

                    </div>
                        </div>
                    </div>
                    
                </div>



                   <div class="row my-5 row form-group">

                    <div class="col-sm-12 my-4"> 
                        <div class="row">
                           <div class="col-sm-4 mt-1"><label class="h3" for="name">
                                <strong>Service Gallery</strong></label>
                               </div>
                    
                    <div class="col-sm-7"> 
                    <div class="upload-btn-wrapper">
                      <button class="btnUp2">Upload <i class="ml-2 fa fa-arrow-up"></i></button>
                      <input required="" multiple type="file" name="s_posters[]" />
                    </div>
                    </div>
                        </div>
                    </div> 


                    <div class="col-sm-12 my-4"> 
                        <label class="h3" for="name">
                                <strong>Business Location</strong></label>

                        <div class="row">
                           <div class="col-sm-2 mt-1"><label class="h6" for="name">
                                <strong>Location</strong></label>
                               </div>
                    
                    <div class="col-sm-7"> 
                    <input id="searchbox" required="" onkeyup="suggest(this.value);" style="height: 42px;" class=" form-control d-inline" type="text" name="s_loction" value="" placeholder="Enter a location...">
                    </div>
                        </div>

                         <div class="row" style="">
                                <div id="result_list" class="" style="display: none;left: 166px;width:41%; z-index: 1000;height: 600px;position: absolute;">
                                    
                                </div>
                            </div>
                    </div> 


                    <div class="col-sm-12 " id="service_price">
                        <label class="h3" for="name">
                                <strong>Business Location</strong></label>

                        <div class="col-sm-6 p-0 my-2">
                            <div class="row">
                            <div class="col-sm-5">
                            <small class="font-weight-bold" style="font-size: 15px;">Per Day Price (USD)</small> 
                            </div>
                            <div class="col-sm-7">
                            <input required="" class="form-control rounded border border-none d-inline" type="number" placeholder="Price" name="s_per_day"></div> </div>
                            </div>

                            <div class="col-sm-6 p-0 my-2">
                            <div class="row">
                            <div class="col-sm-5">
                            <small class="font-weight-bold" style="font-size: 15px;">Per Hour Price (USD)</small> 
                            </div>
                            <div class="col-sm-7">
                            <input  class="form-control rounded border border-none d-inline" type="number" placeholder="Price" name="s_per_hour" required=""></div> </div>
                            </div>

                    </div>


                    <div class="col-sm-12">
                    <label class="h3" for="name">
                                <strong>Reservation</strong></label> 

                        <div class="rz-grid">

 
             <div class="rz-form-group rz-field rz-col-12 rz-field-ready" data-type="checkbox" data-storage="request" data-disabled="no" data-heading="Allow instant booking" data-id="instant">
                <div class="rz-heading row">

                    <label class="rz-checkbox rz-no-select">
                     <input name="instant_book" type="checkbox" value="0">
                     <span class="rz-transition"></span>
                     <em>Allow instant booking?</em>
                    </label>
                    </div>
                    </div>

                     
                     
                 <div class="row rz-heading">

                    <div class="col-sm-6 rz-number-type-stepper" data-type="stepper">

                    <label class=" mb-0 font-weight-bold">
                     Maximum number of guests allowed
                      </label>

                      <div class="rz-stepper rz--v2">
                     <input class="form-control"  type="number" name="max_guests" value="1">
                     
                     </div>
                     
                     </div>



                    <div class="col-sm-6 rz-number-type-stepper" data-type="stepper">

                    <label class=" mb-0 font-weight-bold">
                     Minimum number of guests allowed
                      </label>

                      <div class="rz-stepper rz--v2">
                     <input class="form-control" type="number" name="min_guests" value="1" min="1" step="1" data-format="<strong>%s</strong>">
                     
                     </div>
                     
                     </div>

                   
                    </div>

   
                    </div>
                    </div>

                     
 
 <div class="row rz-form-group my-4">
    <div class="col-sm-5 rz-heading">

   <label class="font-weight-bold">
   Booking Start Time
   </label>

 <select required=""class="form-control" name="reservation_start" class="">
  <option class="form-control" value="">Select</option>
  <option value="3600">1:00 am</option>
  <option value="7200">2:00 am</option>
  <option value="10800">3:00 am</option>
  <option value="14400">4:00 am</option>
  <option value="18000">5:00 am</option>
  <option value="21600">6:00 am</option>
  <option value="25200">7:00 am</option>
  <option value="28800">8:00 am</option>
  <option value="32400">9:00 am</option>
  <option value="36000">10:00 am</option>
  <option value="39600">11:00 am</option>
  <option value="43200">12:00 pm</option>
  <option value="46800">1:00 pm</option>
  <option value="50400">2:00 pm</option>
  <option value="54000">3:00 pm</option>
  <option value="57600">4:00 pm</option>
  <option value="61200">5:00 pm</option>
  <option value="64800">6:00 pm</option>
  <option value="68400">7:00 pm</option>
  <option value="72000">8:00 pm</option>
  <option value="75600">9:00 pm</option>
  <option value="79200">10:00 pm</option>
  <option value="82800">11:00 pm</option>
  <option value="86400">12:00 am</option>
  </select>
</div>


    <div class="col-sm-5 rz-heading">

   <label class="font-weight-bold">
   Booking End Time
   </label>

 <select required="" class="form-control" name="reservation_end" class="">
  <option class="form-control" value="">Select</option>
  <option value="3600">1:00 am</option>
  <option value="7200">2:00 am</option>
  <option value="10800">3:00 am</option>
  <option value="14400">4:00 am</option>
  <option value="18000">5:00 am</option>
  <option value="21600">6:00 am</option>
  <option value="25200">7:00 am</option>
  <option value="28800">8:00 am</option>
  <option value="32400">9:00 am</option>
  <option value="36000">10:00 am</option>
  <option value="39600">11:00 am</option>
  <option value="43200">12:00 pm</option>
  <option value="46800">1:00 pm</option>
  <option value="50400">2:00 pm</option>
  <option value="54000">3:00 pm</option>
  <option value="57600">4:00 pm</option>
  <option value="61200">5:00 pm</option>
  <option value="64800">6:00 pm</option>
  <option value="68400">7:00 pm</option>
  <option value="72000">8:00 pm</option>
  <option value="75600">9:00 pm</option>
  <option value="79200">10:00 pm</option>
  <option value="82800">11:00 pm</option>
  <option value="86400">12:00 am</option>
  </select>
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



