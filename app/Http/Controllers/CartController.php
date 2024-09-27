<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()) {
            $itemsincart = 0;
        } else {
            $itemsincart = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->count();
        }


        $categories = Category::orderBy('priority')->get();
        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
        $product = Product::all();
        foreach ($carts as $cart) {
            $prd = Product::find($cart->product_id);
            //product stock is less than cart ko qty 
            if ($prd->stock < $cart->qty) {
                $cc = Cart::find($cart->id);
                //make cart qty equal to product stock
                //product ko stock jati xa teti naii cart maa available hunu paryo.
                $cc->qty = $prd->stock;
                $cc->save();
            }
        }
        return view('viewcart', compact('carts', 'categories', 'itemsincart', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'qty' => 'required',
            'product_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        //check if already exist
        $check = Cart::where('product_id', $data['product_id'])->where('user_id', $data['user_id'])->where('is_ordered', false)->count();
        if ($check > 0) {
            return back()->with('success', 'Item already in Cart');
        }

        Cart::create($data);
        return back()->with('success', 'Item added to Cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Cart $cart)
    // {
    //     $data = $request->validate([
    //         'qty' => 'required',
    //     ]);
    //    // $data['user_id']=auth()->user()->id;
    //     $cart->qty = $data['qty'];
    //   // $cart= Cart::find($id);
    //     //$cart->update($data);
    //     $cart->save();

    //     return back()->with('success', 'Cart item updated successfully');
    // }


    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $data = $request->validate([
            'qty' => 'required',

        ]);


        $cart->update($data);
        return back()->with('success', 'Cart updated successfully!');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return Redirect(route('cart.index'))->with('success', 'Item Deleted Sucessfully!');;
    }


    /*         public function checkout()
        {
           
            if(!auth()->user())
            {
             $itemsincart = 0;
            }
            else{
                $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
            }
            $categories = Category::orderBy('priority')->get();
           
            return view('checkout',compact('categories','itemsincart'));
        } */


    public function checkout()
    {
        $itemsInCart = [];
        $originalCartTotal = 0;
        if (auth()->user()) {
            $itemsincart = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->count();
            $itemsInCart = Cart::where('user_id', auth()->user()->id)
                ->where('is_ordered', false)
                ->with('product') // Make sure to eager load the related product data
                ->get();

            foreach ($itemsInCart as $item) {
                $originalCartTotal += $item->product->price * $item->qty;
            }
        }

        $categories = Category::orderBy('priority')->get();

        return view('checkout', compact('categories', 'itemsincart', 'itemsInCart', 'originalCartTotal'));
    }
    
}


// public function cart(){
//     $itemincart= $this->include();
//     $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
//     foreach($carts as $cart)
//     {
//         $prd = Product::find($cart->product_id);
//         //product stock is less than cart ko qty 
//         if($prd->stock < $cart->qty)
//         {
//             $cc = Cart::find($cart->id);
//             //make cart qty equal to product stock
//             //product ko stock jati xa teti naii cart maa available hunu paryo.
//             $cc->qty = $prd->stock;
//             $cc->save();
//         }
//     }
//     $product=Product::all();
//     $categories= Category::orderBy('priority')->get();
//     return view('frontend.cart',compact('categories','carts','itemincart','product'));
// }