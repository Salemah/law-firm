<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appoiinment;
use App\Models\DashboardSetting;
use App\Models\Slot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Response;
class AppoinmentController extends Controller
{
    //appointment.blade.php

    public function AppointmentSave(Request $request)
    {

        $request->validate([
            'slot_id' => 'required',
            'message' => 'required',
        ]);
        try {

            $slot = Slot::find($request->slot_id);
            // Get the current date
            $currentDate = Carbon::now();

            // Find the next occurrence of the specified day name
            $nextDate = $currentDate->next($slot->day);

            // If the next occurrence is today and it has already passed, get the occurrence for next week
            if ($nextDate->isPast()) {
                $nextDate = $currentDate->next($slot->day);
            }

            // Format the date as per your requirements





            $message =  new Appoiinment();
            $message->slot_id = $request->slot_id;
            $message->team_id = $request->team_id;
            $message->user_id= Auth::user()->id;
            $message->message = $request->message;
            $message->date= $nextDate->format('d-m-Y');
            $message->save();
            

            $user = User::find(Auth::user()->id);

          if($user){
            $dashboard = DashboardSetting::first();


                // Output the result
                // echo $formattedDate;
                $mailData = [
                    'title' => 'Mail from Arc',
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'username' => $user->username,
                    'body' => $request->message,
                    'body' => $request->message,
                    'facebook' => $dashboard->facebook,
                    'twitter' =>$dashboard->twitter,
                    'linkedin' => $dashboard->linkedin,
                    'slot' =>  Carbon::parse($slot->from_time)->format('g:i A'),
                    'team' =>  $slot->Team->name,
                    'day' =>  $slot->day,
                    'message' =>  $message->message,
                    'date' =>  $formattedDate,
                ];
                Mail::to($user->email)->send(new AppointmentMail($mailData));
          }
            return response()->json(['success'=>'Appointment Complete']);

            // return redirect()->back()->with('message', 'We Received Your Message . Thank You.');
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
            // return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
