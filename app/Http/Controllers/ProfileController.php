<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }
    public function order()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('profile.order-list' , compact('orders'));
    }

    public function showDetails(Order $order)
    {
        return view('profile.order-details' , compact('order'));
    }

    public function payment(Order $order)
    {
           
            // $invoice = (new Invoice)->amount($order->price);
            $invoice = (new Invoice)->amount(1000);

           return ShetabitPayment::callbackUrl( route('payment.callback') )->purchase($invoice,function($driver, $transactionId) use ($order ,  $invoice) {

                $order->payments()->create([
                'resnumber' => $invoice->getUuid(),
                ]);

            })->pay()->render();
    }
}
