<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $allracksinfo = Rack::where('user_id', Auth::user()->id)->get();
        return view('dashboard.dashboard', compact('allracksinfo'));
    }

    public function edit($id) {
        $info = Rack::where('id', $id)->get();
        return view('dashboard.editrack', compact('info','id'));
    }

    public function update(Request $request, $id) {
        $info = Rack::findOrFail($id);

        $info->rack_name = $request->input("info");
        $info->rack_color = $request->input("color");
        $info->save();
        return redirect()->back();
    }
}
