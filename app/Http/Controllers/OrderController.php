<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

  public function include()
  {
    if (!auth()->user()) {
      return  0;
    } else {
      return Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->count();
    }
  }
  public function index()
  {
    $itemsincart = $this->include();
    $orders = Order::where('user_id', auth()->user()->id)->get();

    foreach ($orders as $order) {
      $cartids = explode(',', $order->cart_id);
      $carts = [];
      foreach ($cartids as $cartid) {
        $cart = Cart::find($cartid);
        array_push($carts, $cart);
      }
      $order->carts = $carts;
    }
    return view('myorder', compact('orders', 'itemsincart'));
  }



  public function store(Request $request)
  {

     $data = $request->validate([
      'phone' => 'required',
      'person_name' => 'required',
      'shipping_address' => 'required',
      'payment_method' => 'required',
    ]); 

    $data['user_id'] = auth()->user()->id;
    $data['order_date'] = date('Y-m-d');
    $data['status'] = 'Pending';
    $cartids = Cart::where('user_id', auth()->user()->id)->where('is_ordered',false)->get();
    // $data['cart_id']=implode(',',$carts);
    $totalamount = 0;
    foreach ($cartids as $cartid) {
      $totalamount += $cartid->product->price * $cartid->qty;
    }

    //  dd($totalamount);
    $data['amount'] = $totalamount;
    $ids = $cartids->pluck('id')->toArray();
    $data['cart_id'] = implode(',', $ids);
    Order::create($data);

    Cart::whereIn('id', $ids)->update(['is_ordered' => true]);

    //mail when  order is place
    $data = [
      'name' => auth()->user()->name,
      'mailmessage' => 'New Order has been placed',
    ];
    Mail::send('email.email', $data, function ($message) {
      $message->to(auth()->user()->email)
        ->subject(" New Order Placed");
    });


    return back()->with('success', 'Your Order has placed Sucessfully');
  }



  //  }


  // public function details(){
  //   $orders= Order::all();
  //   return view('order.details',compact('orders'));
  // }


  public function details()
  {
    $orders = Order::all();
    return view('order.details', compact('orders'));
  }


  public function orderdetails($orderid)
  {

    $order = Order::find($orderid);

    $carts = Cart::whereIn('id', explode(',', $order->cart_id))->get();

    return view('order.orderdetails', compact('carts', 'order'));
  }


  public function status($id, $status)
  {
    $order = Order::find($id);
    $order->status = $status;
    $order->save();
    $user = User::find($order->user_id);
    if ($status == 'Processing') {
      //Find the carts of this order.
      $carts = $order->cart_id;
      //explode
      $carts = explode(',', $carts);
      foreach ($carts as $cart) {
        //get product for each cart
        $cc = Cart::find($cart);
        $prd = Product::find($cc->product_id);
        $prd->stock -= $cc->qty;
        $prd->save();
      }
      $data = [
        'name' => $user->name,
        'mailmessage' => 'Your order is in processing',
      ];
      Mail::send('email.email', $data, function ($message) use ($user) {
        $message->to($user->email)->subject(' Order status changed');
      });
    }

    //send mail to user informing the status change of order
    //for processing

    //for completed
    if ($status == 'Completed') {
      $data = [
        'name' => $user->name,
        'mailmessage' => 'Your order is completed',
      ];
      Mail::send('email.email', $data, function ($message) use ($user) {
        $message->to($user->email)->subject('Order status changed');
      });
    }


    //for Cancelled
    if ($status == 'Cancelled') {
      $data = [
        'name' => $user->name,
        'mailmessage' => 'Your order is Cancelled',
      ];
      Mail::send('email.cancel', $data, function ($message) use ($user) {
        $message->to($user->email)->subject('Order status changed');
      });
    }


    return redirect(route('order.details'))->with('success', 'Status change to ' . $status);
  }





  //  public function ordersdetails(){
  //   $itemincart= $this->include();

  //   $orders= Order::where('user_id',auth()->user()->id)->get();
  //   foreach($orders as $order){
  //       $cartids=explode(',',$order->cart_id);
  //       $carts=[];
  //       foreach($cartids as $cartid){
  //           $cart=Cart::find($cartid);
  //           array_push($carts,$cart);
  //       }
  //       $order->carts=$carts;
  //       return view('order.orderdetails',compact('orders','itemsincart'));
  //   }


  // }


  public function delete($id)
  {
    $cart = Cart::find($id);
    $user = User::find($cart->user_id);
    $cart->delete();

    //Mail when order is cancled
    $data = [
      'name' => $user->name,
      'mailmessage' => 'Your Order has been Deleted',
    ];
    Mail::send('email.cancel', $data, function ($message) use ($user) {
      $message->to($user->email)->subject(' Order Deleted');
    });
    return back()->with('success', 'Order deleted Sucessfully!');
  }
}
