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
use DataTables;

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
            $formattedDate = $nextDate->format('d-m-Y');



            $message =  new Appoiinment();
            $message->slot_id = $request->slot_id;
            $message->team_id = $request->team_idd;
            $message->user_id = Auth::user()->id;
            $message->message = $request->message;
            $message->date = $request->aptDate;
            $message->time = $slot->from_time;
            $message->status = 'Pending';
            $message->payment = null;
            $message->save();


            $user = User::find(Auth::user()->id);

            if ($user) {
                $dashboard = DashboardSetting::first();


                // Output the result
                // echo $formattedDate;
                $mailData = [
                    'title' => 'Mail from Arc',
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'username' => $user->username,
                    'body' => $request->message,
                    'meet' => $slot->Team->meet,
                    'facebook' => $dashboard->facebook,
                    'twitter' => $dashboard->twitter,
                    'linkedin' => $dashboard->linkedin,
                    'slot' =>  Carbon::parse($slot->from_time)->format('g:i A'),
                    'team' =>  $slot->Team->name,
                    'day' =>  $slot->day,
                    'message' =>  $message->message,
                    'date' =>  $request->aptDate,

                ];
                Mail::to($user->email)->send(new AppointmentMail($mailData));
            }
            return response()->json(['success' => 'Appointment Complete']);

            // return redirect()->back()->with('message', 'We Received Your Message . Thank You.');
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
            // return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function myAppointmentData(Request $request)
    {

        $banks = Appoiinment::latest()->get();

        return DataTables::of($banks)
            ->addIndexColumn()
            ->addColumn('name', function ($banks) {

                return $banks->Team->name;
            })
            ->addColumn('time', function ($banks) {
                return Carbon::parse($banks->Slot->from_time)->format('g:i A');
            })
            ->addColumn('date', function ($banks) {
                return Carbon::parse($banks->date)->format('d/m/y');
            })
            ->addColumn('meet', function ($banks) {
            if ($banks->payment){
                return '<a class="btn btn-sm btn-info "  href="' . $banks->Team->meet . '" style="cursor:pointer" title="Google Meet"><i class="fas fa-link"></i></a>';
            }
            else{
                return '<a class="btn btn-sm btn-info disabled"  href="' . $banks->Team->meet . '" disabled style="cursor:pointer" title="Google Meet"><i class="fas fa-link"></i></a>';
            }

            })
            ->addColumn('payment', function ($banks) {
                if ($banks->payment) {
                    return '<span>Paid</span>';
                } else {
                    return ' <strong style="color: red">DUE</strong>';
                }
            })
            ->addColumn('action', function ($banks) {
                //  <a class="btn btn-sm btn-success text-white " style="cursor:pointer"
                //         href="#" title="Edit"><i class="fa fa-edit"></i></a>
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">


                        <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $banks->id . ')" title="Delete"><i class="fas fa-trash"></i></a>
                            </div>';
            })
            ->rawColumns(['action', 'meet', 'payment'])
            ->make(true);
    }
    public function myAppointmentDelete(Request $request)
    {
        if ($request->ajax()) {
            try {
                Appoiinment::findOrFail($request->id)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Appointment Deleted Successfully.',
                ]);
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }
}
