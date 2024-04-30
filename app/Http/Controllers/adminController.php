<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Categories;
use DB;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\admin;

class AdminController extends Controller
{
    //** Login attempt and Custom Authentication


 public function adminLogin(Request $request)
{       

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
     $credentials = $request->only('email','password','remember');
        
       // if(Auth::guard('admin')->attempt($credentials)){
           // $request->session()->regenerate();
            return redirect()->intended('admin');
        //}
        return redirect("admin/login")->with('success','Login details are not valid');

    }


    public function adminLogout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('admin/login');
}

    //** Login attempt and Custom Authentication



public function admin()

    {
        return redirect('admin/dashboard');
       
    }



    public function dashboard()

    {
        return view('admin.dash');
       // , compact('users'));
       
    }

 public function login()

    {
        return view('admin.login');
       // , compact('users'));
       
    }

public function profile()

    {
        return view('admin.profile');
       // , compact('users'));
       
    }





public function editprofile()

    {
        return view('admin.editprofile');
       // , compact('users'));
       
    }



    //SITE OPTIONS

     public function orders()

    {

        $orders=Orders::get();

        return view('admin.options.orders', compact('orders'));
       // , compact('users'));
       
    }


    public function ship_order($id){


    $data= array();
         $data['shipped'] = 1;
         Orders::where('id', $id)->update($data);
        return redirect('admin/orders')->with('success', "Order Shipped!");
    }


 public function cancel_order($id){
        
         Orders::where('id', $id)->delete();
        return redirect('admin/orders')->with('success', "Order Dismissed!");
    }




    public function addbrand()

    {
        return view('admin.options.addbrand');
       
    }

    public function savebrand(Request $brand)

    {   $brand->validate([
           'name'=> 'required|unique:brands,brand_name' ],

           [
            'name.required'=> 'Please Enter Brand Name!'     
           ]);


    	$data= array();
    	$data['brand_name'] = $brand->name;

        DB:: table('brands')->insert($data);
        return back()->with('success', "Brand Added!");
       // , compact('users'));
       
    }



 public function addcategory()

    {   return view('admin.options.addcat');
        return view('admin.options.addcat');
       // , compact('users'));
       
    }



      public function savecat(Request $cat)

    {     //return $cat;
          $cat->validate(
            [ 'catName'=> 'required|unique:categories,cat_name' ],
            [ 'catName.required'=> 'Please Enter Category Name!'     ]
        );

          /* Eloquent ORM
          $category=new Categories();
          $category->cat_name=$cat->name;
          $category->save(); */


    	$insert= array();
        $insert['cat_name']=$cat->catName;
        $insert['status']=$cat->status;
        DB:: table('categories')->insert($insert);
        return "Category Added!";
       // , compact('users'));
       
    }



 public function addproduct()

    {       
        $brand= DB:: table('brands')->get();
        $cat= DB:: table('categories')->get();

        return view('admin.options.addpro', compact('brand', 'cat'));
       
    }


     public function saveproduct(Request $pro)

    {  
          $pro->validate([
           'pro_name'=> 'required|unique:products,pro_name',
           //'cat_id'=> 'required',
           //'brand_id'=> 'required',
          // 'description'=> 'required',
           //'price'=> 'required'
           //'image.*'=> 'required|mimes:jpg,jpeg,png' 
            ],

           [
            'pro_name.required'=> 'Please Enter Product Name!'  ,
               //'cat_id.required'=> 'Please Select a Category!'  ,
                //  'brand_id.required'=> 'Please Select a Brand!'  
                  //'image.required'=> 'Please Select at least one Image!'  
            //'image.mimes'=> 'Format other that JPG,JPEG,PNG not accepted!'        
           ]);


        //SINGLE IMG
          //$image=$pro->file('image');
          //$uniqid=hexdec(uniqid());
          //$ext=strtolower($image->getClientOriginalExtension());
          //$create_name=$uniqid.'.'.$ext;
          //$loc='images/product/';
          //Move uploaded file
          //$image->move($loc, $create_name);
           //$final_img=$loc.$create_name;


        //GETTING form data
          $data=array();
          $data['pro_name']=$pro->pro_name;
          $data['cat_id']=$pro->cat_id;
          $data['brand_id']=$pro->brand_id;
          $data['description']=$pro->desc;
          $data['r_quantity']=$pro->qty;
          $data['status']=$pro->status;
          $data['price']=$this->clean($pro->price);
          //$data['image']="Not Available!";

          DB:: table('products')->insert($data);

     //GETTING IMAGES
          $single_img=$pro->file('image');  
         // if($image !='') {
          //foreach ($image as $single_img) { 
            # code... 
     
          $uniqid=hexdec(uniqid());
          $ext=strtolower($single_img->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $loc='images/product/';
          //Move uploaded file
          $single_img->move($loc, $create_name);
          $final_img=$loc.$create_name;
           //getting product id
           $pro_id=DB::table('products')->orderBy('id', 'DESC')->first(); 
           $pro_id=($pro_id->id);
           DB::table('images')->insert(array('image_name' => $final_img,
            'product_id'=>$pro_id ));

           //  } } 
        return response()->json(['success' => "Product Added!"]);
       
    }



    public function manbrand()

    {   $brands= DB:: table('brands')->get();
        return view('admin.options.manbrand', compact('brands'));
       
    }



     public function mancat()

    {    
    	 $cat= DB:: table('categories')->get();   
        return response()->json([ 'data' => $cat ]); //view('admin.options.mancat' , compact('cat'));
       
    }


     public function manpro()

    {
    	$product= DB:: table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.cat_name','brands.brand_name','images.image_name')
            ->get();

            $images= DB:: table('images')->get();

       return response()->json([ 'product' => $product, 'images' => $images  ]);
       
    }



     public function editcat($id)

    {
        $editcat= DB:: table('categories')->where('id',$id)->get();
        return response()->json(['data' => $editcat]);
       
    }



     public function editpro($id)

    {   
        $editpro=DB::table('products')->where('id',$id)->get();
        $images= DB:: table('images')->where('product_id',$id)->get();
        $brand= DB:: table('brands')->where('id',$editpro[0]->brand_id)->get();
        $cat= DB:: table('categories')->where('id',$editpro[0]->cat_id)->get();      
        return response()->json([ 'editpro' => $editpro, 'images' => $images, 'brand' => $brand, 'cat' => $cat  ]);
    }



    public function productStatus($id,$status)

    {   

        if($status==0) $newStatus=1;
        else $newStatus=0; 

        $data['status']=$newStatus;
        DB:: table('products')->where('id',$id)->update($data);
       return response()->json(['message' => 'Status Changed!']);
        //return redirect('admin/manage-product');
    }



     public function upcat(Request $cat,$id)

    {
         $data=array(); 
          $data['cat_name']=$cat->catName;
          $data['status']=$cat->status;

        DB:: table('categories')->where('id',$id)->update($data);
       return response()->json(['message' => 'Update Changed!']);
       
    }


     public function uppro(Request $pro,$id)

    {
         $pro->validate([
           'pro_name'=> 'required', //|unique:products,pro_name',
          // 'cat_id'=> 'required',
           //'brand_id'=> 'required',
          // 'description'=> 'required',
              'price'=> 'required'
           //'images.*'=> 'required|mimes:jpg,jpeg,png' 
            ],

           [
               'pro_name.required'=> 'Please Enter Product Name!'  ,
               //'cat_id.required'=> 'Please Select a Category!'  ,
                  //'brand_id.required'=> 'Please Select a Brand!'  
                  //'images.required'=> 'Please Select at least one Image!'  ,
            //'images.mimes'=> 'Format other that JPG,JPEG,PNG not accepted!'        
           ]);


                     //SINGLE IMG
         //  { $image=$pro->file('image');
          //$uniqid=hexdec(uniqid());
          //$ext=strtolower($image->getClientOriginalExtension());
          //$create_name=$uniqid.'.'.$ext;
          //$loc='images/product/';
          //Move uploaded file
          //$image->move($loc, $create_name);
           //$final_img=$loc.$create_name; }


           //GETTING form data
          $data=array();
          $data['pro_name']=$pro->pro_name;
          $data['cat_id']=$pro->cat_id;
          $data['brand_id']=$pro->brand_id;
          $data['description']=$pro->desc;
          $data['status']=$pro->status;
           $data['r_quantity']=$pro->qty;
          $data['price']=$this->clean($pro->price);
          //$data['image']="Not Available!";

        DB:: table('products')->where('id',$id)->update($data);
      

        //GETTING IMAGES
        $curr_id=DB::table('images')->where('product_id',$id)->first(); $curr_img_id=$curr_id->id;
           $old_img=DB::table('images')->where('product_id',$id)->first(); 
            
            $image=$pro->file('image'); 

          if($image){   $c=1;

        // foreach($old_img as $old_img){ 
         $img_loc=$old_img->image_name;
         if(file_exists($img_loc))  
         unlink($img_loc); 
        // }


        //  foreach ($image as $single_img) { 
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext;
          $loc='images/product/';
          //Move uploaded file
          $image->move($loc, $create_name);
           $final_img=$loc.$create_name;
           //getting product id
          // $pro_id=DB::table('products')->orderBy('id', 'DESC')->first(); $pro_id=($pro_id->id);

           if($c==1){
           DB::table('images')->where('product_id',$id)
           ->where('id', '=', $curr_img_id)->update(array('image_name' => $final_img,
            'product_id' => $id));
            }
            else{
           DB::table('images')->where('product_id',$id)
           ->where('id', '!=', $curr_img_id)->update(array('image_name' => $final_img,
            'product_id' => $id));
            }

            $c++;   // }
             }


         return response()->json(['message' => 'Update Changed!']);
       
    }



     public function delbrand($id)

    {

        DB::table('brands')->where('id',$id)->delete();
        return redirect('admin/manage-brand')->with('success', 'Brand Deleted!');
       
    }

     public function delcat($id)

    {   
        DB::table('categories')->where('id',$id)->delete();
        return response()->json([ 'status'=>200, 'message'=>'Suceess!' ]);
       
       
    }

     public function delcats(Request $req) 

    {    $ids=$req->ids;
         
        foreach($ids as $id) 
            DB::table('categories')->where('id',$id)->delete();

        return response()->json([ 'status'=>200, 'message'=>'Suceess!' ]);
       
       
    }


     public function delpro($id)

    {   

    /* $img=DB::table('images')->where('product_id',$id)->get(); $count=0;
            
        foreach($img as $img_loc){ 
         $img_loc=$img_loc->image_name;

         if(file_exists($img_loc))    
         unlink($img_loc); $count++;
     } */
        // DB::table('images')->where('product_id',$id)->delete();
         DB::table('products')->where('id',$id)->delete();
               

       return response()->json([ 'status'=>200, 'message'=>'Suceess!' ]);
       
    }



// Remove special chars
    function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


}
