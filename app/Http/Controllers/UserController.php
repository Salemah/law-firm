<?php

namespace App\Http\Controllers;

use App\Models\Appoiinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function myAppointment()
    {
        try {

            $appointments = Appoiinment::where('user_id',Auth::user()->id)->get();

            return view('frontend.user.appointment', compact('appointments'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
