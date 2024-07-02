<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'Delivered')->get()->count();
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        } else {
            $count = '';
        }
        
        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        } else {
            $count = '';
        }

        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;
        
        $data->save();
        toastr()->timeOut(1000)->success('Product has been added to cart');
        return redirect()->back();
    }

    public function my_cart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        } else {
            $count = '';
        }
        return view('home.cart', compact('count', 'cart'));
    }

    public function confirm_order(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_adress = $address;
            $order->phone = $phone;

            $order->user_id = $userId;
            $order->product_id = $carts->product_id;

            $order->save();
            
        }
        $cart_remove =  Cart::where('user_id', $userId)->get();
        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(1000)->success('Product has been order');
        return redirect()->back();

    }

    public function my_orders()
    {

        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->get()->count();
        $order = Order::where('user_id', $user)->get();
        return view('home.order', compact('count', 'order'));
    }

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment complete" 
        ]);
        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_adress = $address;
            $order->phone = $phone;

            $order->user_id = $userId;
            $order->product_id = $carts->product_id;

            $order->payment_status = 'Paid';
            $order->save();
            
        }
        $cart_remove =  Cart::where('user_id', $userId)->get();
        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(1000)->success('Product has been order');
        return redirect('my_cart');

    }

    public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        } else {
            $count = '';
        }
        
        return view('home.shop', compact('product', 'count'));
    }

}
