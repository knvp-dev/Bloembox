<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use Mollie;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{

    /**
     * Create Mollie payment and redirect to paymentUrl
     *
     * @return redirect to paymentUrl
     **/

    public function create($payment_id){
        $payment = Payment::find($payment_id);
        
        $mollie_payment = Mollie::api()->payments()->create([
            "amount"      => $payment->amount / 100,
            "description" => "Betaling aankoop bloembox.be",
            "redirectUrl" => "http://e9cd65fd.ngrok.io/checkout/success/".$payment->order_id,
            'webhookUrl'  => "http://e9cd65fd.ngrok.io/checkout/payment/handle",
            "metadata"    => ["order_id" => $payment->order_id]
            ]);

        return redirect($mollie_payment->getPaymentUrl());

    }


    /**
     * Handle Mollie webhook POST call
     *
     **/
    
    public function handleResponse(Request $request){

        $mollie_payment = Mollie::api()->payments()->get($request->id);

        $order_id = $mollie_payment->metadata->order_id;

        $payment = Payment::where('order_id',$order_id)->first();
        $payment->mollie_payment_id = $mollie_payment->id;
        $payment->save();

        if($mollie_payment->isPaid())
        {
            $payment->updatePaymentStatus();
        }
    }
    
}
