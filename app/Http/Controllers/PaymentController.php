<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function khaltiverify(Request $request)
    {
       
        $args = http_build_query(array(
            'token' => 'QUao9cqFzxPgvWJNi9aKac',
            'amount'  => 1000
          ));
          
          $url = "https://khalti.com/api/v2/payment/verify/";
          
          # Make the call using API.
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
          $headers = ['Authorization: Key test_secret_key_a6f91f7de8f442c7bc1bead8e527e06b'];
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
          // Response
          $response = curl_exec($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);

          if($status_code==200){
            return response()->json($request);
          }
        }

        public function khalti()
        {
            return view('khalti')
        ;}




}
