<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentModel;
use Razorpay\Api\Api;
use Session;

class PaymentController extends Controller
{
    //
    function pay(){
        return view('rozarPay');
    }

   
    public function paymentForm1(Request $request)
    {
      
      $data = $request->all();
      $name = $data['name'];
      $price = $data['price'];
      print_r($data);
      die;
  
    
        return response()->json(['message' => 'Payment processed successfully']);
    }
    public function paymentForm(Request $request)
    {
      $data = $request->all();
      $name = $data['name'];
      $amount = $data['amount'];
      $razorpay_id = $data['payment_id'];
       $api_key =   'rzp_test_TXXix8YWV89uQj';
       $api_secret =  'zs6PNFKAAJYp61PlnoUjGLIA';       
       $api = new Api($api_key, $api_secret);
       $order = $api->order->create(array('receipt' => '123', 'amount' => $amount, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
       $orderId = $order['id'];
      
       $user_pay = new PaymentModel();
       $user_pay->name = $name;
       $user_pay->amount = $amount/100;
       $user_pay->razorpay_id = $razorpay_id;
       $user_pay->payment_done = true;
       $user_pay->payment_id = $orderId;
      //  print_r($user_pay);
      //  die;
       $user_pay->save();
       Session::put('orderId',$orderId);
       Session::put('amount', $amount); 
    }
}
