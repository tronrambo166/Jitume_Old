<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Services;
use App\Models\Shop;
use App\Models\Equipments;
use App\Models\User;
use App\Models\businessDocs;
use App\Models\Milestones;
use App\Models\Conversation;
use App\Models\BusinessBids;
use App\Models\AcceptedBids;
use App\Models\BusinessSubscriptions;

use Stripe\StripeClient;
use Response;
use Session; 
use Hash;
use Auth;
use Mail;
use DB;
use DateTime;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{

  public function test(){
    return response()->json(['data' => 'OKAY']);
  }

//private $auth_id;
   public function __construct(StripeClient $client)
    {   
        $this->Client = $client;
        $this->middleware('business');
  
    }

public function auth_id(){
  $auth_email = Session::get('business_email');
  $auth= User::where('email',$auth_email)->first();
  return $auth->id;
}

public function logoutB(){
  Session::forget('service_login');
  return redirect('home');
}


public function account(){
$user = User::where('id',Auth::id())->first();
if($user->connect_id)
$connected = 1;
else $connected = 0;

if($user->connect_id){
$balanceA= $this->Client->balance->retrieve(null,
  ['stripe_account'=>$user->connect_id])->available[0]->amount;
$balanceA = '$'.(float)($balanceA/100);

$balanceP= $this->Client->balance->retrieve(null,
  ['stripe_account'=>$user->connect_id])->pending[0]->amount;
//echo '<pre>'; print_r($balance2); echo '<pre>';exit;
$balanceP = '$'.(float)($balanceP/100);
}
else $balanceA = $balanceP ='N/A';
$user_id = $user->id;
return view('business.account', compact('user', 'balanceA','balanceP', 'connected', 'user_id'));
}


public function business(){
$business = listing::where('user_id',Auth::id())->get();
$services = Services::where('shop_id',Auth::id())->get();
return view('business.index',compact('business','services'));
}

public function add_listing(){
$user = User::where('id',Auth::id())->first();
if($user->completed_onboarding)
$connected = 1;
else $connected = 0;

$user_id = Auth::id();
return view('business.add-listing', compact('connected','user_id'));

}

public function applyForShow(){
return view('business.applyForShow');
}

public function home(){
if(Session::has('c_to_action') && Session::get('c_to_action') == true){
  Session::forget('c_to_action');
  return redirect('business/bBQhdsfE_WWe4Q-_f7ieh7Hdhf2E_');
}

else if(Session::has('c_to_actionS') && Session::get('c_to_actionS') == true){
  Session::forget('c_to_actionS');
  return redirect('business/bBQhdsfE_WWe4Q-_f7ieh7Hdhf2F_');
}
else if(Session::has('c_to_action_Service') && Session::get('c_to_action_Service') == true){
  Session::forget('c_to_action_Service');
  return redirect('/');
}

$investor ='';
$business = listing::where('user_id',Auth::id())->get();
$services = Services::where('shop_id',Auth::id())->get();
$investor_ck = User::where('id',Auth::id())->first();

if($investor_ck == null){
if(Session::has('investor_email')){   
$mail = Session::get('investor_email');
$investor_ck = User::where('email',$mail)->first();
if ($investor_ck->investor == 1) $investor = true;
else $investor = false;

} }
else{
if ($investor_ck->investor == 1) $investor = true;
else $investor = false;
} 

//Investments
$results = []; $t_share = 0;
if ($investor_ck->investor == 1) {
$convs = Conversation::where('investor_id',Auth::id())->get();
foreach($convs as $conv){
  $miles = AcceptedBids::where('investor_id',Auth::id())
  ->where('business_id',$conv->listing_id)->get();
  foreach($miles as $share)
    $t_share = $t_share+$share->representation;

  $my_listing =listing::where('id',$conv->listing_id)->first();
  if($my_listing){
  $my_listing->myShare = $t_share;
  $results[] = $my_listing;
}
//echo '<pre>'; print_r($results); echo '<pre>';exit;
}
}
//Investments
return view('business.index',compact('business','investor','results','services'));
}


public function listings(){
$listings = Listing::where('user_id',Auth::id())->latest()->get();

// foreach($listings as $list){
//   $mile = Milestones::where('listing_id',$list->id)
//   ->where('status','In Progress')->first();
//   if($mile) $list->active = true;else $list->active = false;
// }
return view('business.listings',compact('listings'));
}


public function save_listing(Request $request){
$title = $request->title;
$contact = $request->contact;
$category = $request->category;
$details = $request->details;
$location = $request->location;
$investment_needed = $request->investment_needed;
$share = $request->share;
$contact_mail = $request->contact_mail;
$reason = $request->reason;
$y_turnover = $request->y_turnover;
$investors_fee = $request->investors_fee;
$id_no = $request->id_no;
$tax_pin = $request->tax_pin;
$lat = $request->lat;
$lng = $request->lng;

$yeary_fin_statement = $request->yeary_fin_statement;
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
            Session::put('error','For pin, Only pdf & docx are allowed!');
            return redirect()->back();
          } }


 $yeary_fin_statement=$request->file('yeary_fin_statement');
 if($yeary_fin_statement) {        
          $ext=strtolower($yeary_fin_statement->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For financial statement, Only pdf & docx are allowed!');           
            return redirect()->back();
          } }


 $document=$request->file('document');
 if($document) {        
          $ext=strtolower($document->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For supportive document, Only pdf & docx are allowed!');          
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

     $listing = Listing::create([
            'name' => $title,
            'user_id' => $user_id,
            'contact' => $contact,
            'contact_mail' => $contact_mail,
            'category' => $category,
            'details' => $details,
            'location' => $location,
            'lat' => $lat,
            'lng' => $lng,
            'investment_needed' => $investment_needed,
            'share' => $share,
            'reason' => $reason,
            'y_turnover' => $y_turnover,
            'y_turnover' => $y_turnover,
            'id_no' => $id_no,
            'tax_pin' => $tax_pin,
            'investors_fee' => $investors_fee          
           ]); 
           $listing = $listing->id;      

try{
//FILES
 if($image) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $loc='images/listing/';
          //Move uploaded file
          $image->move($loc, $create_name);
          $final_img=$loc.$create_name;
             }
          else $final_img='';


 $loc='files/business/'.$listing.'/';

 if($yeary_fin_statement) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($yeary_fin_statement->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          //$loc='files/business/'.$listing.'/';
          //Move uploaded file
          $yeary_fin_statement->move($loc, $create_name);
          $final_statement=$loc.$create_name;
             }else $final_statement='';


 if($pin) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($pin->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          //$loc='files/business/'.$listing.'/';
          //Move uploaded file
          $pin->move($loc, $create_name);
          $final_pin=$loc.$create_name;
             }else $final_pin='';


 if($identification) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($identification->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          //$loc='files/business/'.$listing.'/';
          //Move uploaded file
          $identification->move($loc, $create_name);
          $final_identification=$loc.$create_name;
             }else $final_identification='';


 if($document) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($document->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          //$loc='files/business/'.$listing.'/';
          //Move uploaded file
          $document->move($loc, $create_name);
          $final_document=$loc.$create_name;
             }else $final_document='';
             


 if($video) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($video->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          //$loc='files/business/'.$listing.'/';
          //Move uploaded file
          $video->move($loc, $create_name);
          $final_video=$loc.$create_name;
             }else $final_video=$request->link;                     
      

//FILES END

Listing::where('id',$listing)->update([          
            'image' => $final_img,            
            'pin' => $final_pin,  
            'identification' => $final_identification,         
            'document' => $final_document,
            'video' => $final_video,
            'yeary_fin_statement' => $final_statement         
           ]);       

        Session::put('success','Business added!');
        return redirect()->back();
}
catch (\Exception $e) {

    Session::put('loginFailed',$e->getMessage());
    return redirect()->back(); 
}
}

public function up_listing(Request $request){
$user_id = Auth::id();
$id = $request->id;
$listing = $request->id;
$data = $request->except(['_token','link']);
$current = Listing::where('id',$id)->first();

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
          $loc='images/listing/';
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
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          $loc='files/business/'.$listing.'/';
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
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          $loc='files/business/'.$listing.'/';
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
            Session::put('error','For business document, Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          $loc='files/business/'.$listing.'/';
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
          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          $loc='files/business/'.$listing.'/';
          //Move uploaded file
          $video->move($loc, $create_name);
          $final_video=$loc.$create_name;
          $data['video'] = $final_video;
          if($old_video!=null) unlink($old_video);
             }                     

          

//FILES
if(isset($request->link)) $data['video'] = $request->link;
Listing::where('id',$id)->update($data);       
Session::put('success_update','Business Updated!');
return redirect()->back();

}


public function delete_listing($id){

// $milestone = Listing::where('id',$id)->first();
// if($milestone->document!= null && file_exists($milestone->document)) 
//   unlink($milestone->document);  
  
$loc = public_path('files/business/'.$id);
File::deleteDirectory($loc);

$locM = public_path('files/milestones/'.$id);
File::deleteDirectory($locM);

$milestones = Listing::where('id',$id)->delete();
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


//MILESTONES
public function activate_milestone($id){
  $thisMile = Milestones::where('listing_id',$id)->first();

  if(!$thisMile){
    Session::put('failed','A business must have at least 1 milestone to be activated!');
            return redirect()->back();
  }
  
  $milestones = Milestones::where('id',$thisMile->id)
  ->update([
  'status' => 'In Progress'
  ]);
   Listing::where('id',$id)->update(['active' => 1]);

  Session::put('success','The business is activated and ready to accept investment!');
  return redirect()->back();
}

public function delete_milestone($id){
$milestones = Milestones::where('id',$id)->delete();
return redirect()->back();
}

public function add_milestones(){
$milestones = Milestones::where('user_id',Auth::id())->latest()->get();
$business = listing::where('user_id',Auth::id())->get();
return view('business.add_milestones',compact('business','milestones'));
}

public function getMilestones($id){
    if(Auth::check())
        $investor_id = Auth::id();
    else {
        if(Session::has('investor_email')){   
        $mail = Session::get('investor_email');
        $investor = User::where('email',$mail)->first();
        $investor_id = $investor->id;
      }
      else $investor_id = null;
    }

 $milestones = Milestones::where('listing_id',$id)->get(); $done = 0;
  $c=0;$d=0; $progress=0;$share=0; $amount_covered = 0; $running = 0;

 if($milestones->count() !=0 ){
  foreach($milestones as $mile){
  if($mile->investor_id == $investor_id)
    $mile->access = true;
  //Status Determine
  if($mile->status == 'In Progress') 
  $running = 1;

  if($mile->status == 'Done') { 
  $done++; 
 }

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

//Covered
$accepted = AcceptedBids::where('business_id',$id)->get();
foreach($accepted as $acc){
$amount_covered = $amount_covered+$acc->amount;
}
//Covered

$total_mile = count($milestones);

$list = Listing::where('id',$id)->first();
$share = ($list->share)/100;
$amount_required = $list->investment_needed - $amount_covered;
$progress = ($amount_covered/$list->investment_needed)*100;

return response()->json([ 'data' => $milestones, 'progress' => $progress,
'share' => $share, 'amount_required' => $amount_required,'running' => $running ]);
}

else
return response()->json([ 'data' => 'Failed!', 'progress' => 0, 'length' => 0 ]);

 }

 public function download_milestone_doc($id, $mile_id){
    
    $doc = Milestones::where('id',$mile_id)->first();
    $file=$doc->document;
    $headers = array('Content-Type'=> 'application/pdf');
    return Response::download($file, 'milestone.pdf', $headers);
    return response()->json(['data'=>'success']);

    }



public function milestones($id){
if($id == 'all'){
  $listing = listing::where('user_id', Auth::id())->latest()->first();
  if($listing !=null){
  $milestones = Milestones::where('user_id', Auth::id())->get();
 }
  else $milestones = [];
  $business_name = 'Select Business';//$listing->name;
}
else{
  $milestones = Milestones::where('listing_id', $id)->get();
  $listing = listing::where('id', $id)->first();
  $business_name = $listing->name;
}

$business = listing::where('user_id',Auth::id())->get();
return view('business.milestones',compact('milestones','business', 'business_name'));
}



public function save_milestone(Request $request){
$title = $request->title;
$business_id = $request->business_id;
$amount = $request->amount;
$user_id = Auth::id();
$status = 'To Do';

$time_type = $request->time_type;
$n_o_days = $request->n_o_days;
if($time_type == 'Weeks')
$n_o_days = 7*$n_o_days;
if($time_type == 'Months')
$n_o_days = 30*$n_o_days;

//$mile = Milestones::where('listing_id',$business_id)->latest()->first();
//if($mile  &&  ($mile->status ==  'Created' || $mile->status ==  'In Progress'))
//$status = 'On Hold';if($mile  && $mile->status ==  'Done') $status = 'In Progress';

$this_listing = Listing::where('id',$business_id)->first();
$inv_need = $this_listing->investment_needed;
$share = round(( round($amount)/round($inv_need) )*$this_listing->share, 2);

$mile_shares = Milestones::where('listing_id',$business_id)->get();
$total_share_amount = 0;
foreach($mile_shares as $single){
$total_share_amount = $total_share_amount+$single->amount;
}
$total_share_amount = $total_share_amount+$amount;
if($total_share_amount>$inv_need){
Session::put('failed','The amount exceeds the total investment needed!');
        return redirect()->back();
}

 $single_img=$request->file('file');
 
          $uniqid=hexdec(uniqid());
          $ext=strtolower($single_img->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','Only pdf & docx are allowed!');
            return redirect()->back();
          }

          $create_name=$uniqid.'.'.$ext;

          if (!file_exists('files/milestones/'.$business_id)) 
          mkdir('files/milestones/'.$business_id, 0777, true);

          $loc='files/milestones/'.$business_id.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           

Milestones::create([
            'user_id' => $user_id,
            'title' => $title,
            'listing_id' => $business_id,
            'amount' => $amount,
            'document' => $final_file,
      			'n_o_days' => $n_o_days,
            'status' => $status,
            'share'  => $share           
           ]);       

        Session::put('success','Milestone added!');
        return redirect()->back();

}


public function mile_status(Request $request){
try{
  $mile_id = $request->id;
  $thisMile = Milestones::where('id',$mile_id)->first();
  $listing_id = $thisMile->listing_id;
  $milestones = Milestones::where('id',$mile_id)
  ->update([
  'status' => $request->status
  ]);

  if($request->status == 'Done'){
    // Release this milestone payment from Escrow
    // Release this milestone payment from Escrow

    $bids = AcceptedBids::where('business_id',$listing_id)->get();
    $nextMileAgree = AcceptedBids::where('business_id',$listing_id)
    ->where('next_mile_agree',1)->update(['next_mile_agree' => 0]);

    foreach($bids as $bid){
        $investor = User::where('id',$bid->investor_id)->first();
        $investor_mail = $investor->email;

        $list = listing::where('id',$bid->business_id)->first();
        $info=[ 'business_name'=>$list->name, 'mile_name'=>$thisMile->title,
        'bid_id' => $bid->id ];
        $user['to'] =  $investor_mail; //'tottenham266@gmail.com';
        //Email
        Mail::send('bids.milecompletion_alert', $info, function($msg) use ($user){
             $msg->to($user['to']);
             $msg->subject('Milestone completion alert!');
         });
      //Email
         
    }
      
  }
}
catch(\Exception $e){
  Session::put('failed',$e->getMessage());
  return redirect()->back();
 }

//$next_mile = Milestones::where('listing_id',$thisMile->listing_id)->where('status','To Do')->first();
//if($next_mile && $next_mile->id > $request->id)
//Milestones::where('id',$next_mile->id)->update(['status' => 'In Progress' ]);

return redirect()->back();
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
          Milestones::where('id',$id)->update(['image' => $final_img ]); 
             }

Milestones::where('id',$id)->update([
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

public function milestoneCommits($amount,$business_id,$percent){
  try{

   if(Auth::check())
        $investor_id = Auth::id();
    else {
        if(Session::has('investor_email')){   
        $mail = Session::get('investor_email');
        $investor = User::where('email',$mail)->first();
        $investor_id = $investor->id;
      }
    }

    $type = 'Monetery';
    $bids = BusinessBids::create([
      'date' => date('Y-m-d'),
      'investor_id' => $investor_id,
      'business_id' => $business_id,
      'type' => $type,
      'amount' => $amount,
      'representation' => $percent
    ]);

if($bids)
  return response()->json(['success' => 'Success!']);
}

catch(\Exception $e){
  return response()->json(['failed' =>  $e->getMessage()]);
}

}


//END MILESTONES
public function remove_bids($id){
  $bid = BusinessBids::where('id',$id)->first();

try {
  //Refund
         $this->Client->refunds->create(['charge' => $bid->stripe_charge_id ]);
  //Refund
         
  $bid_remove = BusinessBids::where('id',$id)->delete();       
  Session::put('success','Removed!');
  return redirect()->back();
  }
 catch(\Exception $e){
  Session::put('failed',$e->getMessage());
  return redirect()->back();
 }

}

public function my_bids(){
  if(Auth::check())
      $investor = User::where('id', Auth::id())->first();
  else {
      if(Session::has('investor_email')){   
      $mail = Session::get('investor_email');
      $investor = User::where('email',$mail)->first();
    }
  }

$res = BusinessBids::where('investor_id',Auth::id())->get();
$bids = array();
try{
foreach($res as $r){
  $inv = User::where('id',$r->investor_id)->first();
  $business = listing::where('id',$r->business_id)->first();

  if($business && $inv){
  $r->investor = $inv->fname.' '.$inv->lname;
  $r->business = $business->name;

  //Business details
  $r->category = $business->category;
  $r->details = $business->details;
  $r->location = $business->location;
  $r->share = $business->share;
  $r->investment_needed = $business->investment_needed;
  //Business details
  //$r->photos = explode(',',$r->photos);
  
  $bids[] = $r;
  }
} 
return view('business.investor_bids',compact('bids'));
}
 catch(\Exception $e){
  Session::put('failed',$e->getMessage());
  return redirect()->back();
 }
}

public function business_bids(){
  if(Auth::check())
      $investor = User::where('id', Auth::id())->first();
  else {
      if(Session::has('investor_email')){   
      $mail = Session::get('investor_email');
      $investor = User::where('email',$mail)->first();
    }
  }

$res = BusinessBids::where('owner_id', Auth::id())->latest()->get();
$bids = array();
try{
foreach($res as $r){
  $inv = User::where('id',$r->investor_id)->first();
  $business = listing::where('id',$r->business_id)->first();

  if($business && $inv){
  $r->investor = $inv->fname.' '.$inv->lname;
  $r->business = $business->name;

  //Investor details
  $r->investor_name = $inv->fname.' '.$inv->mname.' '.$inv->lname;
  $r->inv_range = $inv->inv_range;
  $r->interested_cats = $inv->interested_cats;
  $r->past_investment = $inv->past_investment;
  $r->website = $inv->website;
  $r->email = $inv->email;
  //Investor details
  $r->photos = explode(',',$r->photos);
  $bids[] = $r;
  }
} 

$remove_new = BusinessBids::where('owner_id', Auth::id())
->update(['new'=>0]);

return view('business.bids',compact('bids'));
}
 catch(\Exception $e){
  Session::put('failed',$e->getMessage());
  return redirect()->back();
 }
}


public function assetEquip_download($id, $type){
    
   try {
      if($type == 'photos'){
        $id = str_replace('__','/',$id);
      //$bid = BusinessBids::where('id',$id)->first();
      if($id !=''){
      if(file_exists($id))
      return Response::download($id);
      else {
        Session::put('failed','No file was found!');
        return redirect()->back();
      }
      }
      }

      if($type == 'legal_doc'){
      $bid = BusinessBids::where('id',$id)->first();
      $document=$bid->legal_doc;
      if($document !=''){
      $headers = array('Content-Type'=> 'application/pdf');
      return Response::download($document, 'legal_doc.pdf', $headers);
       }
      }

      if($type == 'optional_doc'){
      $bid = BusinessBids::where('id',$id)->first();
      $document=$bid->optional_doc;
      if($document !=''){
      $headers = array('Content-Type'=> 'application/pdf');
      return Response::download($document, 'legal_doc.pdf', $headers);
       }
       else{
        Session::put('failed','No file was found!');
        return redirect()->back();
      }
      }
      

  } catch (Exception $e) {
      Session::put('failed',$e->getMessage());
      return redirect()->back();
    } 
    


    }


//SUBSCRIBE//
    public function isSubscribed($listing_id){
    $results = array();
    $investor_id = Auth::id();
    $count = 0;
    $subs = BusinessSubscriptions::where('investor_id',$investor_id)
    ->where('active',1)->orderBy('id','DESC')->first();

    if($subs){

    //Get Stripe Subscription
    $stripe = new \Stripe\StripeClient('sk_test_51JFWrpJkjwNxIm6zcIxSq9meJlasHB3MpxJYepYx1RuQnVYpk0zmoXSXz22qS62PK5pryX4ptYGCHaudKePMfGyH00sO7Jwion');

    try{
    $stripe_sub = $stripe->subscriptions->retrieve(
              $subs->stripe_sub_id, []
        ); //return $stripe_sub;
    }
    catch(\Exception $e){
      $count = 0;
      $results['subscribed'] = 0;
      return response()->json([ 'data' => $results, 'count' => $count] );
    }

      $expire_date = date('Y-m-d',$stripe_sub->current_period_end);
      //Get Stripe Subscription
      $count = 1;
      $results['subscribed'] = 1;

      $results['sub_id'] = $subs->id;
      $results['trial'] = $subs->trial;
      //expire
        $start_date = new DateTime(date('Y-m-d'));
        $days = $start_date->diff(new DateTime($expire_date));
        $days_left = $days->d;
        $mon_left = $days->m;
        $results['expire'] = $days_left;
        if($days_left == 0 && $mon_left == 1)
          $results['expire'] = 30;
      //expire

         if($days_left <= 0 && $mon_left == 0){
           Conversation::where('listing_id',$listing_id)->where('investor_id',$investor_id)->update(['active' => 0]);
           $results['subscribed'] = 0;
         }

      $results['token_left'] = $subs->token_remaining;
      $results['range'] = $subs->chosen_range;
      $results['plan'] = $subs->plan;

    }
    return response()->json([ 'data' => $results, 'count' => $count] );
}


public function add_docs(Request $request){
//$name = $request->name;
  //return $request->all();
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
            return redirect('business');
          }

          $create_name=$uniqid.'.'.$ext;

          if (!file_exists('files/business/'.$listing)) 
          mkdir('files/business/'.$listing, 0777, true);

          $loc='files/business/'.$listing.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           
           businessDocs::create([
            'user_id' => $user_id,
            'business_id' => $listing,
            'file' => $final_file         
           ]);

             } 

        Session::put('success','Documents added!');
        return redirect('business');

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
            return redirect('business');
          }

          $create_name=$uniqid.'.'.$ext;
          if (!file_exists('files/business/'.$user_id)) 
          mkdir('files/business/'.$user_id, 0777, true);

          $loc='files/business/'.$user_id.'/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_file=$loc.$create_name;
           
           businessDocs::create([
            'user_id' => $user_id,
            'business_id' => $listing,
            'file' => $final_file,
            'media' => 1
          
           ]);

        Session::put('success','Media added!');
        return redirect('business');

}


public function embed_business_video(Request $request){
$link = $request->link;
$listing = $request->listing;
$user_id = Auth::id();

           businessDocs::create([
            'user_id' => $user_id,
            'business_id' => $listing,
            'file' => $link,
            'media' => 1        
           ]);

        Session::put('success','Media Embedded!');
        return redirect('business');

}

//Rating
public function ratingListing($id, $rating){
$user_id = Auth::id();
$listing = Listing::where('id',$id)->first();
$new_rating = $rating + $listing->rating;
$rating_count = 1 + $listing->rating_count;
//$new_rating = $new_rating/$rating_count;
        $listing = Listing::where('id',$id)->update([
        'rating' => $new_rating,
        'rating_count' => $rating_count,
       ]);

        return response()->json(['success' => 'Success!']);

}


public function unlockBySubs($listing_id,$sub_id,$plan){
$subscription = BusinessSubscriptions::where('id',$sub_id)->first();
if($plan == 'gold'){
  $listing = Listing::where('id',$listing_id)->first();
  if($subscription->chosen_range == $listing->y_turnover){
    Conversation::create([
        'investor_id' => Auth::id(),
        'listing_id' => $listing_id,
        'price' => 'Subscription'
    ]);
  }
  else {
    return response()
    ->json(['error' => 'The business is not in your range!']);
  }
}

else if($plan == 'token'){
  BusinessSubscriptions::where('id',$sub_id)->
  update(['token_remaining' => $subscription->token_remaining-1 ]);
  Conversation::create([
        'investor_id' => Auth::id(),
        'listing_id' => $listing_id,
        'price' => 'Subscription'
    ]);
  
}

else{
  Conversation::create([
        'investor_id' => Auth::id(),
        'listing_id' => $listing_id,
        'price' => 'Subscription'
    ]);
}

        return response()->json(['success' => 'Success']);

}



public function FindProjectManagers($bid_id){
$results = array();
$this_bid = AcceptedBids::where('bid_id',$bid_id)->first();
if(!$this_bid) return response()->json(['data'=>false, 'error:'=>'Bid does not exist!']);
$this_business = Listing::where('id',$this_bid->business_id)->first();

if($this_business){
$business_loc = $this_business->location;

$lat = (float)$this_business->lat;
$lng = (float)$this_business->lng;
$services = $this->findNearestServices($lat,$lng,100);
return response()->json(['services' => $services]);
}
else return response()->json(['data'=>false, 'error:'=>'Business does not exist!']);

}


public function releaseEquipment($business_id, $manager_id){
//if(!$this_bid) return response()->json(['error:'=>'Bid does not exist!']);
$b = Listing::where('id',$business_id)->first();
$b_name = $b->name;
$b_owner = User::where('id',$b->user_id)->first();
$manager = User::where('id',$manager_id)->first();
$investor = User::where('id',Auth::id())->first();

$b_owner_name = $b_owner->fname.' '.$b_owner->lname;
$manager_name = $manager->fname.' '.$manager->lname;
$investor_name = $investor->fname.' '.$investor->lname;

//Mail to B Owner
$info=['manager_name'=>$manager_name, 'contact'=>$manager->email,
'b_name' => $b_name, 'investor_name' => $investor_name];
        $user['to'] = $b_owner->email;
        $mail1 = Mail::send('bids.owner_manager_alert', $info, function($msg) use ($user){
             $msg->to($user['to']);
             $msg->subject('Project Manger Assigned!');
         });

//Mail to Project Manger
$info=['investor_name'=>$investor_name, 'contact'=>$investor->email,
'b_owner_name'=>$b_owner_name,'contact2'=>$b_owner->email,'b_name' => $b_name];
        $user['to'] = $manager->email;
      $mail2 =  Mail::send('bids.manager_eqp_alert', $info, function($msg) use ($user){
             $msg->to($user['to']);
             $msg->subject('Equipment release!');
         });

if($mail1 && $mail2)
return response()->json(['status' => 'success']);
else
return response()->json(['status' => 'failed']);
}



public function findNearestServices($latitude, $longitude, $radius = 100)
    {
        $listings = Services::selectRaw("* ,
                         ( 3956 * acos( cos( radians(?) ) *
                           cos( radians( lat ) )
                           * cos( radians( lng ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( lat ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->where('category', '=', '0')
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        foreach($listings as $list){
        if(strlen($list->location) > 30)
        $list->location = substr($list->location,0,30).'...';

        $user = User::where('id', $list->shop_id)->first();
        if($user){
        $list->manager = $user->fname.' '.$user->lname;
        $list->contact = $user->email;
      }
        }

        return $listings;
    } 

//Class Bracket
}
