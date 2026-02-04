<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'answers' => 'required|array',
            'address' => 'required|string|max:255',
            'feedback' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:15',
        ]);
        Order::create([
            'user_id' => Auth::id(),
            'service_name' => $request->service_name,
            'answers' => json_encode($request->answers),
            'address' => $request->address,
            'feedback' => $request->feedback,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('payment.paymentDisplay')->with('success', 'Service created successfully!');
    }
    public function paymentDisplay()
    {
        $payments = Payment::all();
        return view('payment.paymentDisplay', compact('payments'));
    }
    public function userOrder() {
        $orders = Order::with('Worker')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.userOrder', compact('orders'));
    }
}
