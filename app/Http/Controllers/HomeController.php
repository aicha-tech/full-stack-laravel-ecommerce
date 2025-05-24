<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{   public function index()
    {
        if(Auth::id()){
            $id= Auth::user()->id;

      
                $count=cart::where('user_id','=',$id)->count();
          
        }
          else{
               $count=0;
         }
        $product=Product::paginate(3);
        return view('home.userpage',compact('product','count')); 
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $order=order::all();
            $product=product::count();
            $order_num=order::count();
            $usercust=Auth::user()->usertype;
            if($usercust=='1'){
                $usercust=user::count();
            }
            $delivred=order::where('delivery_status','=',"deliverd")->count();
            $processing=order::where('delivery_status','=',"processing")->count();
            return view('admin.home',compact('order','product','order_num','usercust','delivred','processing'));
        }
        else{
                 if(Auth::id()){
                      $id= Auth::user()->id;
        
                
                          $count=cart::where('user_id','=',$id)->count();
                    
                  }
                    else{
                         $count=0;
                   }
            $product=Product::paginate(2);
       
            return view('home.userpage',compact('product','count')); 
        }
    }




    public function product_details($p){
        if(Auth::id()){
            $id= Auth::user()->id;

      
                $count=cart::where('user_id','=',$id)->count();
          
        }
          else{
               $count=0;
         }
        $product=Product::find($p);
        return view('home.product_details',compact('product','count'));
    }


    public function add_cart(Request $request, $id)
{
    if (Auth::id()) {
        $user = Auth::user();
        $product = Product::find($id);

        // Check if product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Validate quantity
        $quantity = intval($request->input('quantity', 1)); // Default to 1 if not provided
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Create new cart item
        $cart = new Cart;
        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->adresse;
        $cart->user_id = $user->id;
        $cart->Product_title = $product->title;

        // Calculate price based on discount_price or price
        if ($product->discount_price != null) {
            $cart->price = floatval($product->discount_price) * $quantity;
        } else {
            $cart->price = floatval($product->price) * $quantity;
        }

        $cart->Product_id = $product->id;
        $cart->image = $product->image;
        $cart->quantity = $quantity;
        $cart->save();

        return redirect()->back()->with('message', 'Product added to cart successfully');
    } else {
        return redirect('login');
    }
}
    
    public function product_view(){
        if(Auth::id()){
            $id= Auth::user()->id;

      
                $count=cart::where('user_id','=',$id)->count();
          
        }
          else{
               $count=0;
         }
         $product=Product::paginate(3);
        return view('home.product_view',compact('product','count'));
    }


    public function show_cart(){
        if(Auth::id()){
        $id= Auth::user()->id;

        $cart=cart::where('user_id','=',$id)->get();
        $count=cart::where('user_id','=',$id)->count();

        return view('home.showcart',compact('cart'),compact('count'));
    }
    else{
               return redirect('login');

    }
}
public function remove_product($id){
$data=cart::find($id);
        $data->delete(); 
        return redirect()->back()->with('message','product deleted successfully');
}

public function cashout(Request $request){
    if($request->paiment=="delivery"){
        $user=Auth :: user();
        $userid=$user->id;
        $data=cart :: where('user_id','=',$userid)->get();
        foreach($data as$data)
        {
            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;

            $order->price=$data->price;
            
            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->Product_id;
            
            $order->payment_status='cash on delivery';
            
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();




        }



        return redirect()->back()->with('message','We have receivedyour Order.We will connect with you soon ...');
    }
   
    else{
        return view('home.stripe');
    }

}

public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com." 
    ]);
  
    Session::flash('success', 'Payment successful!');
          
    return back();
}

public function order_user(){
    if(Auth::id()){
        $id= Auth::user()->id;

  
            $count=cart::where('user_id','=',$id)->count();
      
    }
      else{
           $count=0;
     }
     $order=order::all();
     return view('home.order',compact('count','order'));

}
  public function cancel_order($id){
    $data=order::find($id);
        $data->delete(); 
        return redirect()->back()->with('message','order deleted successfully');

  }

}



