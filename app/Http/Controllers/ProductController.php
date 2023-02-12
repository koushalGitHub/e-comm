<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\OrderModel;
use Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    function index()
    {
        $data = ProductModel::all();
        return view('product', ['products' => $data]);
    }
    function details($id)
    {
        $data = ProductModel::find($id);
        return view('details', ['details' => $data]);
    }

    public function search(Request $req)
    {
        $searchTerm = $req->name;
   
        if ($searchTerm != '') {
            $data = ProductModel::where('name', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%")
                ->get();

            if ($data->count() > 0) {
                return view('search', ['products' => $data]);
            } else {
                return view('search')->with('error_message', 'No data found');
            }
        }else{
          
            return view('search')->with('error_message', 'No data found');
        }

    }

    function add_to_cart(Request $req)
    {
        
        if ($req->session()->has('user')) {
            $cart = new CartModel;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/home');
        } else {
            return redirect('/login');
        }

    }

    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');

        if ($request->session()->has('user')) {
            $cart = new CartModel;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $product_id;
            $cart->save();
           
        } else {
            return redirect('/login');
        }

    }





    static function cart_item()
    {
        $user_id = Session::get('user')['id'];
        return CartModel::where('user_id', $user_id)->count();
    }


    public function updateCartCount()
{
    $user_id = Session::get('user')['id'];
    $cartCount = CartModel::where('user_id', $user_id)->count();
    Session::put('cartCount', $cartCount);

    return response()->json($cartCount);
}

    function cartList()
    {
        $user_id = Session::get('user')['id'];
        ;
        $data = DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cartId')
            ->where('cart.user_id', $user_id)
            ->get();
        // return $data;
        return view('cartList', ['products' => $data]);
    }

    function removeCart($id)
    {
        CartModel::destroy($id);
        return redirect('cartList');
    }

    function orderNow()
    {
        $user_id = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cartId')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');
        // return $data;
        return view('orderNow', ['total' => $total]);
    }

    function orderPlace(Request $req)
    {
        $user_id = Session::get('user')['id'];
        $allCart = CartModel::where('user_id', $user_id)->get();
        foreach ($allCart as $cart) {
            $order = new OrderModel;
            $order->products_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $req->payment;
            $order->payment_status = 'pending';
            $order->address = $req->address;
            $order->save();
            CartModel::where('user_id', $user_id)->delete();
            return redirect('/home');
        }

    }


    function myOrders()
    {
        $user_id = Session::get('user')['id'];
        $order = DB::table('orders')
            ->join('products', 'orders.products_id', '=', 'products.id')
            ->select('products.*', 'orders.*')
            ->where('orders.user_id', $user_id)
            ->get();
        // return $total;
        return view('myOrder', ['order' => $order]);

    }

    function addProduct()
    {
        return view('addProduct');
    }


    public function store(Request $request)
    {
        $product = new ProductModel;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->price = $request->input('price');

        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->gallery = $filename;
        } else {
            return $request;
            $product->gallery = '';
        }

        $product->save();

        return redirect('/home')->with('success', 'Product added successfully');
    }




}

?>