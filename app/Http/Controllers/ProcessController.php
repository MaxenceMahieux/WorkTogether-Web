<?php

namespace App\Http\Controllers;

use App\Models\Bay;
use App\Models\Order;
use App\Models\Rack;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function store(Request $request)
    {

        $racks_duration = $request["custom_duration"];
        $racks_numbers = $request["purchase_option"];

        $discount = 0;
        $price = 100;

        switch ($racks_numbers) {
            case 1:
                $price = 100;
                $discount = 0;
                break;
            case 10:
                $price = 900;
                $discount = 10;
                break;
            case 21:
                $price = 1680;
                $discount = 20;
                break;
            case 42:
                $price = 2940;
                $discount = 30;
                break;
            default:
                break;
        }
        if ($racks_duration < 12) {
            $discount += 20;
        }

        echo ($racks_numbers);
        for ($i = 0; $i < $racks_numbers; $i++) {
            $racksNonUtilises = Rack::whereNull('end_date')
                ->orWhere('end_date', '<', Carbon::now())
                ->get();

            if ($racksNonUtilises->isNotEmpty()) {
                $rackAssigner = $racksNonUtilises->first();

                $rackAssigner->user_id = Auth::user()->id;
                $rackAssigner->end_date = Carbon::now()->addMonths($racks_duration);
                $rackAssigner->save();

                $process = new Order();
                $process->user_id = Auth::user()->id;
                $process->rack_id = $rackAssigner->rack_id;
                $process->bay_id = $rackAssigner->bay_id;
                $process->price = $price;
                $process->discount = $discount;
                $process->start_date = Carbon::now();
                $process->end_date = Carbon::now()->addMonths($racks_duration);
                $process->save();


                echo ($rackAssigner);
            } else {
                exit("Il n'y a plus de places disponibles");
            }
        }

        $allracksinfo = Rack::Where('user_id', '==', Auth::user()->id);

        return view('dashboard.dashboard', compact('allracksinfo'));
    }
}
