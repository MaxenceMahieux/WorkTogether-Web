<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() {
        $offers = Offer::all();
        return view('purchase', compact('offers'));
    }

}
