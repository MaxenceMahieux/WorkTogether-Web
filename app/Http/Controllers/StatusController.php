<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
        $allstatusinfo = Statu::all();
        return response()->json($allstatusinfo);
    }
}
