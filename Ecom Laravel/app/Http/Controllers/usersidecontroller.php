<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Orderdetails;
use App\Models\Ordermaster;
use Session;

class usersidecontroller extends Controller
{
    public function index()
    {
        $productarray = Product::all();
        return view('user.index',compact('productarray'));

    }
   
    public function productlist()
    {
     $productarray = Product::all();
     return view('user.productlist',compact('productarray'));
    }
    
    public function viewproduct($id)
    {
        $productarray = Product::where('product_id',$id)->first();
        return view('user.viewproduct', compact('productarray'));

    }

    public function cartprocess(Request $request,$id)
    {
        $product_id = $id;
        $product_qty = $request->get('qty'); 

        $product = Product::find($product_id);

        // echo "Product ID " . $product_id;
        // echo "Product QTY" . $product_qty;

         $cart = session()->get('cart');

         if(!$cart)
         {
            $cart = [
            $id => [
                "name" => $product->product_name,
                "quantity" => $product_qty,
                "price" => $product->product_price,
                "image" => $product->product_image
            ]
                 ];

            session()->put('cart',$cart);

            return redirect('/checkout')->with('success','product has been added succesfully');
        }

    if(isset($cart[$id]))
    {
      $cart[$id]['quantity'] = $cart[$id]['quantity'] + $product_qty;
      session()->put('cart',$cart);
      return redirect('/checkout')->with('success','product has been Updated succesfully');

    }

            $cart[$id]=[
          "name" => $product->product_name,
          "quantity" => $product_qty,
          "price" => $product->product_price,
          "image" => $product->product_image
        ];
        session()->put('cart',$cart);

        return redirect('/checkout')->with('success','product has been added succesfully');
    }
   
    public function checkout()
    {
        return view('user.checkout');

    }

    public function removecart($id)
    {
        if ($id) {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
          
          unset($cart[$id]);
          session()->put('cart', $cart);
      } 
    }
         return view('user.checkout');
    }

    public function updatecart(Request $request, $id)
    {
        $id = $id;
        $qty = $request->qty;
        if($id and $qty)
        {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $qty;
            session()->put('cart', $cart);
            return redirect('/checkout')->with('success','Cart Updated succesfully');
        }
    }

    public function placeorder(Request $request)
 {
    $order_date = date('d-m-y');
    $order_status = 'pending';
    $user_id = '1';

    $ordermasterq = new Ordermaster([
        'order_date'=> $order_date,
        'order_status'=> $order_status,
        'user_id'=> $user_id,
    ]);

    $ordermasterq->save();

    $order_id = $ordermasterq->order_id;

    foreach(session('cart') as $id => $details)
    {
      $orderdetailsq = new Orderdetails([
          'order_id'=> $order_id,
          'prodcut_id' => $id,
          'product_qty' => $details['quantity'],
          'product_price' => $details['price']
      ]);

      $orderdetailsq->save();

      if($orderdetailsq)
      {
        Session::forget('cart');
      }

      return redirect('/thankyou')->with('success','cart updates successfully');
    }
 }

    public function about()
    {
        return view('user.about');

    }
    public function contact1()
    {
        return view('user.contact1');

    }
    
}
