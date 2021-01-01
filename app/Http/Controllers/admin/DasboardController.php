<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Http\Request;
use App\Transaction;

// mangil dasboard
class DasboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dasboard', [
            'travel_package' => TravelPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ]);
    }
}
