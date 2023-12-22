<?php

namespace App\Http\Controllers;

use App\Models\Appoiinment;
use App\Models\User;
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
    public function editProfile(Request $request)
    {
        try {

            $user = User::find(Auth::user()->id);

            return view('frontend.user.profile', compact('user'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function myProfile(Request $request)
    {
        try {

            $user = User::find(Auth::user()->id);

            return view('frontend.user.my.profile', compact('user'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function UserUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name,'. Auth::user()->id.',id',
            'email' =>
            'required|unique:users,email,' . Auth::user()->id . ',id',
            'phone' =>
            'required|numeric|digits:11|unique:users,phone,' . Auth::user()->id . ',id',
            // 'password' => 'required',
            // 'password_confirmation' => 'required',

        ]);
        try {

            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            return redirect()->back()->with('message', 'Profile Update Successful');
            // return view('frontend.user.profile', compact('user'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
