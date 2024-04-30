<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Services;
use App\Models\Shop;
use App\Models\Equipments;
use App\Models\Smilestones;
use App\Models\serviceDocs;
use App\Models\serviceBook;
use App\Models\ServiceMileStatus;
use App\Models\ServiceMessages; 
use App\Models\User;
use DateTime;
use Session; 
use Hash;
use Auth;
use Mail;
use DB;
use Exception;
use Response;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{

public function __construct()
    {
        $this->middleware('business');
    }

public function auth_id(){
  $auth_email = Session::get('service_email');
  $auth= User::where('email',$auth_email)->first();
  return $auth->id;
}

public function logoutS(){
  Session::forget('service_login');
  return redirect('home');
}


public function services(){
$listings = Services::where('shop_id',Auth::id())->latest()->get();
return view('services.listings',compact('listings'));
}

public function add_listing(){
$user = User::where('id',Auth::id())->first();
if($user->completed_onboarding)
$connected = 1;
else $connected = 0;

$user_id = Auth::id();
return view('services.add-listing', compact('connected','user_id'));

}

public function home(){
$services = Services::where('shop_id',Auth::id())->get();
return view('services.index',compact('services'));
}

public function listings(){
$listings = Services::where('shop_id',Auth::id())->latest()->get();
return view('services.listings',compact('listings'));
}


public function save_listing(Request $request){ 

$title = $request->title;
$category = $request->category; 
$details = $request->details;
$price = $request->price;
$location = $request->location;
$lat = $request->lat;
$lng = $request->lng;

$pin = $request->pin;
$identification = $request->identification;
$document = $request->document;
$video = $request->video;
$user_id = Auth::id();


//File Type Check!
$image=$request->file('image');
if($image) {
          $ext=strtolower($image->getClientOriginalExtension());
          if($ext!='jpg' && $ext!= 'png' && $ext!='jpeg' && $ext!= 'svg'&& $ext!='gif')
          {
            Session::put('error','For Cover, Only images are allowed!');
            return redirect()->back();
          } }

  $pin=$request->file('pin');
  if($pin) {
          $ext=strtolower($pin->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For pin, Only pdf & docx are allowed!');
            return redirect()->back();
          } }

 $identification=$request->file('identification');
 if($identification) {        
          $ext=strtolower($identification->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For identification, Only pdf & docx are allowed!');           
            return redirect()->back();
          } }


 $document=$request->file('document');
 if($document) {        
          $ext=strtolower($document->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For service document, Only pdf & docx are allowed!');          
            return redirect()->back();
          } }


$video=$request->file('video');
 if($video) {     
          $ext=strtolower($video->getClientOriginalExtension());
          if($ext!='mpg' && $ext!= 'mpeg' && $ext!='webm' && $ext!= 'mp4' 
            && $ext!='avi' && $ext!= 'wmv')
          { 
            Session::put('error','For video, Only mpg || mpeg || webm || mp4 
            avi || wmv are allowed!');          
            return redirect()->back();
          } }



//File Type Check END!

try{
$listing = Services::create([
            'name' => $title,
            'shop_id' => $user_id,
            'price' => $price,
            'category' => $category,
            'details' => $details,
            'location' => $location,
            'lat' => $lat,
            'lng' => $lng
          ]);         
  $listing = $listing->id;     

//FILES 
 if($image) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $loc='images/services/';
          //Move uploaded file
          $image->move($loc, $create_name);
          $final_img=$loc.$create_name;
             }
          else $final_img='';


 $loc='files/services/'.$listing.'/';

 if($pin) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($pin->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          //$loc='files/services/'.$listing.'/';
          //Move uploaded file
          $pin->move($loc, $create_name);
          $final_pin=$loc.$create_name;
             }else $final_pin='';


 $identification=$request->file('identification');
 if($identification) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($identification->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          //$loc='files/services/'.$listing.'/';
          //Move uploaded file
          $identification->move($loc, $create_name);
          $final_identification=$loc.$create_name;
             }else $final_identification='';


 $document=$request->file('document');
 if($document) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($document->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          //$loc='files/services/'.$listing.'/';
          //Move uploaded file
          $document->move($loc, $create_name);
          $final_document=$loc.$create_name;
             }else $final_document='';
             


 $video=$request->file('video');
 if($video) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($video->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          //$loc='files/services/'.$listing.'/';
          //Move uploaded file
          $video->move($loc, $create_name);
          $final_video=$loc.$create_name;
             }else $final_video=$request->link;                     

          

//FILES End
Services::where('id',$listing)->update([
            'image' => $final_img,
            'pin' => $final_pin,
            'identification' => $final_identification,
            'document' => $final_document,
            'video' => $final_video           
           ]); 


  // <!-- Asset Service -->
  if($category == '0')
  {
  //$cover = 'images/services/assetDefault.png';   
  $mile = Smilestones::create([
              'user_id' => $user_id,
              'title' => 'Transaction Assessment, Management & Transfer',
              'listing_id' => $listing,
              'amount' => $price,
              'n_o_days' => 365,
              'status' => 'To Do'       
             ]);   
    }      
// <!-- Asset Service -->

  }
  catch(\Exception $e){
  Session::put('failed', $e->getMessage()); ;
}
        Session::put('success','Service added!');
        return redirect()->back();

}

public function up_listing(Request $request){
$user_id = Auth::id();
$id = $request->id;

$listing = $request->id;
$data = $request->except(['_token','link']);
$current = Services::where('id',$id)->first();

$old_cover = $current->image;
$old_pin = $current->pin;
$old_identification = $current->identification;
$old_video = $current->video;
$old_document = $current->document;

 //FILES
 $image=$request->file('image');
 if($image) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          if($ext!='jpg' && $ext!= 'png' && $ext!='jpeg' && $ext!= 'svg'&& $ext!='gif')
          {
            Session::put('error','For Cover, Only images are allowed!');
            return redirect()->back();
          }
          $create_name=$uniqid.'.'.$ext;
          $loc='images/services/';
          //Move uploaded file
          $image->move($loc, $create_name);
          $final_img=$loc.$create_name;
          $data['image'] = $final_img;
          if($old_cover!=null) unlink($old_cover);
             }

 $pin=$request->file('pin');
 if($pin) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($pin->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For pin, Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          $loc='files/services/'.$listing.'/';
          //Move uploaded file
          $pin->move($loc, $create_name);
          $final_pin=$loc.$create_name;
          $data['pin'] = $final_pin;
          if($old_pin!=null) unlink($old_pin);
             }


 $identification=$request->file('identification');
 if($identification) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($identification->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For identification, Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          $loc='files/services/'.$listing.'/';
          //Move uploaded file
          $identification->move($loc, $create_name);
          $final_identification=$loc.$create_name;
          $data['identification'] = $final_identification;
          if($old_identification!=null) unlink($old_identification);
             }


 $document=$request->file('document');
 if($document) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($document->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For services document, Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          $loc='files/services/'.$listing.'/';
          //Move uploaded file
          $document->move($loc, $create_name);
          $final_document=$loc.$create_name;
          $data['document'] = $final_document;
          if($old_document!=null) unlink($old_document);
             }
             


 $video=$request->file('video');
 if($video) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($video->getClientOriginalExtension());
          if($ext!='mpg' && $ext!= 'mpeg' && $ext!='webm' && $ext!= 'mp4' 
            && $ext!='avi' && $ext!= 'wmv')
          { 
            Session::put('error','For video, Only mpg || mpeg || webm || mp4 
            avi || wmv are allowed!');
             
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$listing)) 
          mkdir('files/services/'.$listing, 0777, true);

          $loc='files/services/'.$listing.'/';
          //Move uploaded file
          $video->move($loc, $create_name);
          $final_video=$loc.$create_name;
          $data['video'] = $final_video;
          if($old_video!=null) unlink($old_video);
             }                     

          

//FILES
if(isset($request->link)) $data['video'] = $request->link;
Services::where('id',$id)->update($data);   

        Session::put('success','Service Updated!');
        return redirect()->back();

}


public function delete_service($id){

//$milestone = Services::where('id',$id)->first();
// if($milestone->document!= null && file_exists($milestone->document)) 
//   unlink($milestone->document);

$loc = public_path('files/services/'.$id);
File::deleteDirectory($loc);

$locM = public_path('files/Smilestones/'.$id);
File::deleteDirectory($locM);

$milestones = Services::where('id',$id)->delete();
return redirect()->back();
}


public function add_eqp(Request $request){
$listing_id = $request->id;
$eq_name = $request->eq_name;
$value = $request->value;
$amount = $request->amount;
$details = $request->details;
$user_id = Auth::id();

Equipments::create([
            'eq_name' => $eq_name,
            'value' => $value,
            'amount' => $amount,
            'details' => $details,
            'listing_id' => $listing_id  
           ]);       
        Session::put('success','Equipment added!');
        return redirect()->back();
}

public function add_docs(Request $request){
//$name = $request->name;
$listing = $request->listing;
$user_id = Auth::id();

          $files=$request->file('files'); //print_r($files);
 
          foreach ($files as $single_img) { 
            # code...
          $uniqid=hexdec(uniqid());
          $ext=strtolower($single_img->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('file_error','Only pdf & docx are allowed!');
            return redirect('services');
          }

          $create_name=$uniqid.'.'.$ext;

          if (!file_exists('files/services/'.$user_id)) 
          mkdir('files/services/'.$user_id, 0777, true);

          $loc='files/services/'.$user_id.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           
           serviceDocs::create([
            'user_id' => $user_id,
            'service_id' => $listing,
            'file' => $final_file         
           ]);

             } 

        Session::put('success','Documents added!');
        return redirect('services');

}


public function add_video(Request $request){
//$name = $request->name;
$listing = $request->listing;
$user_id = Auth::id();


          $single_img=$request->file('files'); //print_r($files);
 
          $uniqid=hexdec(uniqid());
          $ext=strtolower($single_img->getClientOriginalExtension());
          if($ext!='mpg' && $ext!= 'mpeg' && $ext!='webm' && $ext!= 'mp4' 
            && $ext!='avi' && $ext!= 'wmv')
          {
            Session::put('file_error','Only mpg || mpeg || webm || mp4 
            avi || wmv are allowed!');
            return redirect('services');
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/services/'.$user_id)) 
          mkdir('files/services/'.$user_id, 0777, true);

          $loc='files/services/'.$user_id.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           
           serviceDocs::create([
            'user_id' => $user_id,
            'service_id' => $listing,
            'file' => $final_file,
            'media' => 1
          
           ]);

        Session::put('success','Media added!');
        return redirect('services');

}


public function embed_service_videos(Request $request){
$link = $request->link;
$listing = $request->listing;
$user_id = Auth::id();

           serviceDocs::create([
            'user_id' => $user_id,
            'service_id' => $listing,
            'file' => $link,
            'media' => 1        
           ]);

        Session::put('success','Media Embedded!');
        return redirect('services');

}


//MILESTONES
public function delete_milestone($id){
$milestones = Smilestones::where('id',$id)->delete();
return redirect()->back();
}

public function add_milestones(){
$milestones = Smilestones::where('user_id',Auth::id())->latest()->get();
$business = Services::where('shop_id',Auth::id())->get();
return view('services.add_milestones',compact('business','milestones'));
}

public function getMilestones($id){ 

  //Booking check
  $booking = serviceBook::where('service_id',$id)
  ->where('booker_id', Auth::id())
  ->where('status', 'Confirmed')->first();
  if($booking) $booked = 1; else $booked = 0;

  if($booked){
    $milestones = ServiceMileStatus::where('service_id',$id)
    ->where('booker_id', Auth::id())->get(); 
  }
  else{
    $milestones = Smilestones::where('listing_id',$id)->get();
  }
  
 $c=0;$d=0;$test='';

try{
  foreach($milestones as $mile){
  if($mile->status == 'Done') $d++; 

  //SETTING Time Diffrence
$time_due_date = date( "Y-m-d H:i:s", strtotime($mile->created_at.' +'.$mile->n_o_days.' days 0 hours 0 minutes'));
$start_date = new DateTime(date("Y-m-d H:i:s"));
$since_start = $start_date->diff(new DateTime($time_due_date));

$time_left = $since_start->d.' days, '.$since_start->h.' hours, '. $since_start->i.' minutes';
$mile->time_left = $time_left;

$time_now = date("Y-m-d H:i:s");
if($time_now > $time_due_date)
  $mile->time_left = 'L A T E !';

} 

if($d == count($milestones) && count($milestones)!=0)
{
  $done_msg = 'Milestone completed! Service Delivered!';
}
else $done_msg = null;

}
catch(\Exception $e){
  return response()->json([ 'data' => $e->getMessage() ]);
}

return response()->json([ 'data' => $milestones, 'done_msg' => $done_msg,
'booked' => $booked ]);

 }

 public function download_milestone_doc($id, $mile_id){
    
    $doc = Smilestones::where('id',$mile_id)->first();
    $file=$doc->document;
    $headers = array('Content-Type'=> 'application/pdf');
    return Response::download($file, 'milestone.pdf', $headers);
    return response()->json(['data'=>'success']);

    }



public function milestones($id){
if($id == 'all'){
  $listing = Services::where('shop_id', Auth::id())->latest()->first();
  if($listing != null){
  $milestones = null; //Smilestones::where('user_id', Auth::id())->get();
 }
  else $milestones = [];
  $business_name = 'Select Service';//$listing->name;
}
// else{
//   $milestones = Smilestones::where('listing_id', $id)->get();
//   $listing = Services::where('id', $id)->first();
//   $business_name = $listing->name;
// }

$business = Services::where('shop_id',Auth::id())->get();
return view('services.milestones',compact('milestones','business', 'business_name'));
}

public function findMilestones(Request $request){

  $service_id = $request->service_id;
  $booker_id = $request->booker_id;
  //Optional
  $service = Services::where('id',$service_id)->first();
  if($service)
  $s_name = $service->name;
  else $s_name = '';

  $booker = User::where('id',$booker_id)->first();
  if($booker)
  $booker_name = $booker->fname.' '.$booker->lname;
  else $booker_name = '';
  //Optional

  $milestones = ServiceMileStatus::where('service_id', $service_id)
  ->where('booker_id', $booker_id)->get();
 
  $business = Services::where('shop_id',Auth::id())->get();
  return view('services.milestones',compact('milestones','business','s_name', 'booker_name'));
}



public function booker_milestones(){
  $booker_id = Auth::id();
  $book = serviceBook::where('booker_id', $booker_id)->first();
  $results = [];
  $milestones = Smilestones::where('listing_id', $book->service_id)->
  where('status', 'In Progress')->get();
 
 foreach($milestones as $miles){
  $listing = Services::where('id', $miles->listing_id)->first();

  if($listing){
  $miles->service = $listing->name;
  $results[] = $miles;
  }
}

return view('services.booker-milestones',compact('results'));
}


public function getBookers($s_id){
  $results = [];
  $book = serviceBook::where('service_id', $s_id)
  ->where('status', 'Confirmed')->get();
  foreach($book as $b){
    $booker = User::where('id',$b->booker_id)->first();
    $results[] = $booker;
  }
return response()->json(['data' => $results]);
}




public function save_milestone(Request $request){
$title = $request->title;
$business_id = $request->business_id;
$amount = $request->amount;
$user_id = Auth::id();
$status = 'To Do';

$hasMile = Smilestones::where('listing_id',$business_id)->first();
if($hasMile)
  $active = 0; else $active = 1;

$time_type = $request->time_type;
$n_o_days = $request->n_o_days;
if($time_type == 'Weeks')
$n_o_days = 7*$n_o_days;
if($time_type == 'Months')
$n_o_days = 30*$n_o_days;

//Amount check
$serv = Services::where('id', $business_id)->first();

$mile_shares = Smilestones::where('listing_id',$business_id)->get();
$total_share_amount = 0;
foreach($mile_shares as $single){
$total_share_amount = $total_share_amount+$single->amount;
}
$total_share_amount = $total_share_amount+$amount;
if($total_share_amount>$serv->price){
Session::put('error','The amount exceeds the total service price!');
        return redirect()->back();
}
//Amount

$mile = Smilestones::where('listing_id',$business_id)->where('status','Created')->first();

if(isset($mile->status) &&  $mile->status ==  'Created')
$status = 'On Hold';

try{
 $single_img=$request->file('file');
 
          $uniqid=hexdec(uniqid());
          $ext=strtolower($single_img->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;

          if (!file_exists('files/Smilestones/'.$business_id)) 
          mkdir('files/Smilestones/'.$business_id, 0777, true);

          $loc='files/Smilestones/'.$business_id.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           

Smilestones::create([
            'user_id' => $user_id,
            'title' => $title,
            'listing_id' => $business_id,
            'amount' => $amount,
            'document' => $final_file,
            'n_o_days' => $n_o_days,
            'status' => $status       
           ]);       
}
catch(\Exception $e){
  Session::put('failed', $e->getMessage()); ;
}
        Session::put('success','Milestone added!');
        return redirect()->back();

}


public function mile_status(Request $request){

if($request->status == '') return redirect('business/s_milestones-all');

$milestones = ServiceMileStatus::where('id',$request->id)
->update([
'status' => $request->status,
'active' => 0
]);

//MAIL
    $mile = ServiceMileStatus::where('id',$request->id)->first();
    $notLastMile = ServiceMileStatus::where('service_id',$mile->service_id)
    ->where('booker_id',$mile->booker_id)->where('status','To Do')->first();
  
    if($notLastMile)

      $filename = 'milestoneS.milestone_mail_done';
    else
      $filename = 'milestoneS.service_done_mail';

    try{
       
        $business = Services::where('id',$mile->service_id)->first();
        $booking = serviceBook::where('service_id',$mile->service_id)
        ->where('booker_id',$mile->booker_id)->latest()->first();

        $owner = User::where('id', $booking->service_owner_id)->first();
        $customer = User::where('id',$mile->booker_id)->first();

        $info=[  'name'=>$mile->title,  'amount'=>$mile->amount, 'business'=>$business->name, 's_id' => $business->id,'booker_id' => $mile->booker_id, 'owner' => $owner->fname. ' '.$owner->lname ]; 

        $user['to'] = $customer->email;//'sohaankane@gmail.com';

         Mail::send($filename, $info, function($msg) use ($user){
             $msg->to($user['to']);
             $msg->subject('Milestone Done!');
         });  
//Mail

    if(!$notLastMile)
      $booking = serviceBook::where('service_id',$mile->service_id)
        ->where('booker_id',$mile->booker_id)->orderBy("id", "DESC")->delete();
 }
      catch(\Exception $e){
      return redirect('business/bBQhdsfE_WWe4Q-_f7ieh7Hdhf4F_-all')->with('failed', $e->getMessage());
    }
Session::put('success', 'Status Changed!');
return redirect('business/bBQhdsfE_WWe4Q-_f7ieh7Hdhf4F_-all'); //->back();
}


public function up_milestone(Request $request){
$title = $request->title;
$contact = $request->contact;
$category = $request->category;
$details = $request->details;
$location = $request->location;
$investment_needed = $request->investment_needed;
$share = $request->share;
//$contact_mail = $request->contact_mail;
$user_id = Auth::id();
$id = $request->id;

 $image=$request->file('image');
 if($image) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $loc='images/listing/';
          //Move uploaded file
          $image->move($loc, $create_name);
          $final_img=$loc.$create_name;
          Smilestones::where('id',$id)->update(['image' => $final_img ]); 
             }

Smilestones::where('id',$id)->update([
            'name' => $title,
            'contact' => $contact,
            'category' => $category,
            'details' => $details,
            'location' => $location,
            'investment_needed' => $investment_needed,
            'share' => $share     
           ]);       

        Session::put('success','Business Updated!');
        return redirect()->back();

}

//END MILESTONES
public function my_booking(){ 
$booking = serviceBook::where('booker_id',Auth::id())->get();
$results = [];
foreach($booking as $book)
{
  $service =Services::where('id',$book->service_id)->first();
  if($service){
  $book->location = $service->location;
  $book->service = $service->name;
  $book->category = $service->category;
  $results[] = $book;
}
}
return view('services.my_booking',compact('results'));
}


public function service_messages(){ 
$results = [];
$messages = ServiceMessages::where('to_id',Auth::id())->latest()->get();
foreach($messages as $book)
{
  $service =Services::where('id',$book->service_id)->first();
  $sender =User::where('id',$book->from_id)->first();

  if($service && $sender){
  $book->service = $service->name;
  $book->sender = $sender->fname.' '.$sender->lname;
  $book->website = $sender->website;
  $book->email = $sender->email;
  $results[] = $book;
  }

}

$remove_new = ServiceMessages::where('to_id',Auth::id())->update(['new'=>0]);

return view('services.messages',compact('results'));
}


public function service_booking(){ 
$results = [];
$booking = serviceBook::where('service_owner_id',Auth::id())
->where('status', 'Pending')->latest()->get();
foreach($booking as $book)
{
  $service =Services::where('id',$book->service_id)->first();
  $customer =User::where('id',$book->booker_id)->first();

  if($service && $customer){
  $book->location = $service->location;
  $book->service = $service->name;
  $book->category = $service->category;
  //$book->s_id = $service->id;

  //customer
  $book->customer_name = $customer->fname.' '.$customer->lname;
  $book->website = $customer->website;
  $book->email = $customer->email;
  $results[] = $book;
  }
}

$remove_new = serviceBook::where('service_owner_id',Auth::id())
->update(['new'=>0]);

return view('services.service_booking',compact('results'));
}

public function serviceBook(Request $request){ 

  try{
   if(Auth::check())
        $booker_id = Auth::id();
    else {
        return response()->json(['failed' => 'You must sign in to book!']);
    }
    $owner = Services::where('id',$request->service_id)->first();

    $booking = serviceBook::create([
      'date' => $request->date,
      'booker_id' => $booker_id,
      'service_id' => $request->service_id,
      'service_owner_id' => $owner->shop_id,
      'note' => $request->note,
      'business_bid_id' => $request->business_bid_id
    ]); 
    if($booking)
    return response()->json(['success' => 'Booking Success! Go to dashboard to see status']);
    }

    catch(\Exception $e){
      return response()->json(['failed' => $e->getMessage()]);
    }
}


public function serviceMsg(Request $request){ 

  try{
   if(Auth::check())
        $booker_id = Auth::id();
    else {
        return response()->json(['failed' => 'You must sign in to book!']);
    }
    $owner = Services::where('id',$request->service_id)->first();

    $message = ServiceMessages::create([
      'booker_id' => $booker_id,
      'service_id' => $request->service_id,
      'service_owner_id' => $owner->shop_id,
      'msg' => $request->msg,
      'to_id' => $owner->shop_id,
      'from_id' => $booker_id
    ]); 
    if($message)
    return response()->json(['success' => 'Message Sent!']);
    }

    catch(\Exception $e){
      return response()->json(['failed' => $e->getMessage()]);
    }
}

public function serviceReply(Request $request){ 

  try{
    //$owner = Services::where('id',$request->service_id)->first();
    $msg = ServiceMessages::where('id',$request->msg_id)->first();

    if($msg->booker_id == Auth::id()){
      $to_id = $msg->service_owner_id;
      $from_id = $msg->booker_id;
    }
    else{
      $to_id = $msg->booker_id;
      $from_id = $msg->service_owner_id;
    }

    $message = ServiceMessages::create([
      'booker_id' => $msg->booker_id,
      'service_id' => $request->service_id,
      'service_owner_id' => $msg->service_owner_id,
      'msg' => $request->msg,
      'to_id' => $to_id,
      'from_id' => $from_id
    ]); 
    if($message)
    return redirect()->back()->with('success', 'Message Sent!');
    }

    catch(\Exception $e){
      return redirect()->back()->with('failed', $e->getMessage());
    }
}


//Rating
public function ratingService($id, $rating){
$user_id = Auth::id();
$listing = Services::where('id',$id)->first();
$new_rating = $rating + $listing->rating;
$rating_count = 1 + $listing->rating_count;
//$new_rating = $new_rating/$rating_count;
        $listing = Services::where('id',$id)->update([
        'rating' => $new_rating,
        'rating_count' => $rating_count,
       ]);

        return response()->json(['success' => 'Success!']);

}


//CLASS

}
