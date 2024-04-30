<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 

// INVESTOR
if(isset($data['investor']) && $data['investor'] == 1)
{
//Session
 Session::put('old_fname',$data['fname']);
 Session::put('old_lname',$data['lname']);
 Session::put('old_mname',$data['mname']);
 Session::put('old_email',$data['email']);
 Session::put('old_id_no',$data['id_no']);
 Session::put('old_tax_pin',$data['tax_pin']);
 Session::put('old_past_investment',$data['past_investment']);
 Session::put('old_website',$data['website']);
//Session

$investor = 1; 
$user = User::where('email',$data['email'])->first();
    if($user!=''){ 
    Session::put('login_err','User already exists!');
     return redirect('/');
     } 

 $inv_range = $data['inv_range'];
 $interested_cats = $data['interested_cats'];  
 $past_investment = $data['past_investment'];
 $website = $data['website'];
 $id_no = $data['id_no'];
 $tax_pin = $data['tax_pin']; 


 //File Type Check!
$passport=$data['id_passport'];
if($passport) {
          $ext=strtolower($passport->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For Passport, Only pdf & docx are allowed!');
            return redirect()->back();
          } }


if(isset($data['pin'])){
 $pin=$data['pin'];
          $ext=strtolower($pin->getClientOriginalExtension());
          if($ext!='pdf' && $ext!= 'docx')
          {
            Session::put('error','For pin, Only pdf & docx are allowed!');
            return redirect()->back();
          } }

//File Type Check END!

 $user = User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'pin' => $final_pin,
            //'id_passport' => $final_passport,
            'investor' => $investor,
            'id_no' => $id_no,
            'tax_pin' => $tax_pin,
            'inv_range' =>  json_encode($inv_range),
            'interested_cats' =>  json_encode($interested_cats), 
            'past_investment' => $past_investment,
            'website' => $website         
           ]);   

//Upload
$inv_id = $user->id;

 try {

 if (!file_exists('files/investor/'.$inv_id)) 
          mkdir('files/investor/'.$inv_id, 0777, true);
          $loc='files/investor/'.$inv_id.'/';

 if(isset($pin) && $pin !=null) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($pin->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;    
          //Move uploaded file
          $pin->move($loc, $create_name);
          $final_pin=$loc.$create_name;
             } else $final_pin=null;

    if($passport) {
          $uniqid=hexdec(uniqid());
          $ext=strtolower($passport->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $passport->move($loc, $create_name);
          $final_passport=$loc.$create_name;
             }else $final_passport=''; 
//Upload END


        Session::put('investor_email', $user->email);    
        Session::put('investor_auth',true);

        if($data['c_to_listing_reg'] == 'True')
           Session::put('c_to_action_Service', true);

            User::where('id',$inv_id)->update([
            'pin' => $final_pin,
            'id_passport' => $final_passport              
           ]);  
           return $user;            


    } catch (\Exception $e) {
       return $e->getMessage();
        Session::put('login_err',$e->getMessage());
         //return redirect('/'); 
    }

}
// INVESTOR


        if($data['c_to_action'] == 'True')
            Session::put('c_to_action', true);
        else if($data['c_to_action'] == 'TrueS')
            Session::put('c_to_actionS', true);
        else if($data['c_to_action'] == 'loginFromService')
            Session::put('c_to_action_Service', true);

        $dob = $data['month'].'-'.$data['day'].'-'.$data['year'];

        return User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'dob' => $dob,
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
        ]);
    }
}
