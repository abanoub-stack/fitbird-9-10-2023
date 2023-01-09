<?php

namespace App\Http\Controllers;

use App\Models\HistoryPayment;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $histories = HistoryPayment::paginate(10);
        return view('payment-history.history', [
            'histories' => $histories,
        ]);
    }

}
