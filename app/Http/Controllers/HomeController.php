<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Mail\DemoMail;
use App\Models\AboutUs;
use App\Models\Appoiinment;
use App\Models\cased;
use App\Models\Category;
use App\Models\Client;
use App\Models\company;
use App\Models\contact;
use App\Models\DashboardSetting;
use App\Models\legalarea;
use App\Models\MakeUsUnique;
use App\Models\Post;
use App\Models\Question;
use App\Models\Slider;
use App\Models\Slot;
use App\Models\SubLegalArea;
use App\Models\Team;
use App\Models\User;
use App\Models\WelcomeSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = Post::with('category')->where('status',1)->latest()->paginate(8);

            $sliders = Slider::where('status',1)->get();
            $teams = Team::where('status',1)->get();
            $legalareas = legalarea::get();
            $questions = Question::take(3)->get();
            $clients = Client::get();
            $welcome = WelcomeSection::first();
            $companies =  company::get();
            return view('frontend.home',compact('welcome','clients','questions','posts', 'legalareas','teams','sliders', 'companies'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function index2()
    {
        try {
            $posts = Post::with('category')->where('status',1)->latest()->paginate(8);

            $sliders = Slider::where('status',1)->get();
            $teams = Team::where('status',1)->get();

            return view('frontend.oldhome',compact('posts','teams','sliders'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $posts = Post::with('category')->where('status',1)->paginate(12);
            return view('frontend.post.all-post',compact('posts'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function allPost()
    {
        try {
            $posts = Post::with('category')->where('status',1)->paginate(10);
            $categorys = Category::latest()->take(3)->get();
            $ltposts = Post::with('category')->where('status', 1)->latest()->take(3)->get();
            return view('frontend.post.all-post',compact('posts', 'ltposts', 'categorys'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function UserDashboard()
    {
        try {
            $appointments = Appoiinment::where('user_id',Auth::user()->id)->get();
            // $posts = Post::with('category')->where('status',1)->paginate(10);
            // $categorys = Category::latest()->take(3)->get();
            // $ltposts = Post::with('category')->where('status', 1)->latest()->take(3)->get();

            return view('frontend.user.dashboard',compact('appointments'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function SignInProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasAnyRole('admin')) {
                return redirect(route('dashboard'));
            } elseif (Auth::User()->hasAnyRole('team')) {
                return redirect(route('dashboard'));
            }  elseif (Auth::User()->hasanyrole('user') ) {

                return redirect()->route('user.dashboard');
            } else {
                // return redirect(route('my-accounts'));
            }
        }
        return redirect()->back()->with('failed', 'These credentials do not match our records.');
    }
    public function SignUpProcess(Request $request)
    {
        // dd(12345);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits:11|unique:users',

            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $massage = 'New User Created successfully';

        // $user->uuid = (string) Str::uuid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password != $request->password_confirmation) {
            return Redirect::back()->with('failed', 'Password & Re-type Password Did Not Match.');
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->type = 'user';
        $user->assignRole('user');
        $user->save();
        return redirect()->route('login')->with('message', 'Sign-up Successfully Completed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function postShow(string $id)
    {
        try {
            $post = Post::with('category')->findOrFail($id);
            $dashboardSettings =  DashboardSetting::first();
            $ids = explode(',', $post->category_id);
            $categories = Category::whereIn('id', $ids)->pluck('name')->toArray();
            $categorys = Category::latest()->take(3)->get();
            $posts = Post::with('category')->where('status', 1)->latest()->take(3)->get();
            return view('frontend.post.show',compact('categorys','post','posts', 'categories','dashboardSettings'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function contact()
    {
        try {
            $dashboardSettings =  DashboardSetting::first();
            return view('frontend.contact.contact',compact('dashboardSettings'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function cases()
    {
        try {
            $dashboardSettings =  DashboardSetting::first();
            $cases =  cased::paginate(12);
            $companies =  company::get();

            return view('frontend.post.cases',compact('dashboardSettings', 'cases', 'companies'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function casesDetails(Request $request)
    {
        try {
            $dashboardSettings =  DashboardSetting::first();
            $case =  cased::find($request->id);

            return view('frontend.post.case-details',compact('dashboardSettings', 'case'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function aboutus(Request $request)
    {
        try {
            $aboutus =  AboutUs::first();
            $uniques =  MakeUsUnique::take(3)->get();
            $companies =  company::get();
            $teams =  Team::get();
            return view('frontend.aboutus',compact('aboutus', 'uniques', 'companies', 'teams'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ourteam(Request $request)
    {
        try {
            $teams =  Team::get();

            return view('frontend.our-team',compact('teams'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ourservice(Request $request)
    {
        try {
            $legalareas =  legalarea::get();

            return view('frontend.legal-area',compact('legalareas'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ourservicesub(Request $request)
    {
        try {
            $legalareas =  SubLegalArea::where('legal_area_id', $request->id)->get();
            $legal =  legalarea::where('id', $request->id)->first();

            return view('frontend.sub-legal-area',compact('legalareas', 'legal'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ourteamAreaWise(Request $request)
    {
        try {
            $Teams =  Team::whereJsonContains('sub_legal_area_id', $request->id)->get();
            $sublegalarea =  SubLegalArea::with('LegalArea')->where('id', $request->id)->first();
            return view('frontend.team-legal-area-wise',compact('Teams', 'sublegalarea'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ViewShedule(Request $request)
    {
        try {
            $slots =  Slot::where('team_id', $request->id)->get();
            $team = Team::find($request->id);
            $orders = Slot::where('team_id', $request->id)->get()->groupBy(function ($data) {
                return $data->day;
            });;
            $appointments = Appoiinment::get();


            return view('frontend.slot',compact('slots', 'team', 'orders', 'appointments'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ContactMessageInsert(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        try {
            $message =  new contact();
            $message->name = $request->username;
            $message->email= $request->email;
            $message->phone = $request->phone;
            $message->description = $request->message;
            $message->save();
            $mailData = [
                'title' => 'Mail from Arc',
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'body' => $request->message,
            ];

            Mail::to('arc.law.contact@gmail.com')->send(new DemoMail($mailData));


            return redirect()->back()->with('message', 'We Received Your Message . Thank You.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function SlotData(Request $request)
    {
        //dd($request->all());
        $query = Slot::with('Team')->find($request->id);
        $time = Carbon::parse($query->from_time)->format('g:i A');


        // Get the current date
        $currentDate = Carbon::now();

        // Find the next occurrence of the specified day name
        $nextDate = $currentDate->next($query->day);

        // If the next occurrence is today and it has already passed, get the occurrence for next week
        if ($nextDate->isPast()) {
            $nextDate = $currentDate->next($query->day);
        }

        // Format the date as per your requirements
        // $formattedDate = $nextDate->format('d-m-Y');
        $formattedDate = Carbon::parse($request->aptDate)->format('d-m-Y');

        $appointment = Appoiinment::where('date', $formattedDate)->where('time', $query->from_time) ->first();

        if($appointment){
            return response()->json([
                'status' => 'error',
                'data' => $query,
                'time' => $time,
            ]);
        }
        if (!$query) {
            return response()->json([
                'status' => 'error',
                'message' => 'Not Found, Please Try Again...',
            ], 422);
        }

        return response()->json([
            'status' => 'success',
            'data' => $query,
            'time' => $time,
        ]);
    }
    public function SlotDataGet(Request $request)
    {
        // dd($request->all());
        // $query = Slot::with('Team')->find($request->id);
        // $time = Carbon::parse($query->from_time)->format('g:i A');


        // Get the current date
        $day =Carbon::parse($request->date)->dayName;

        $query = Slot::with('Team')->where('day', $day)->where('team_id', $request->teamId)->get();
$apt = Appoiinment::get();
        // dd($query);
        // $currentDate = Carbon::now();

        // // Find the next occurrence of the specified day name
        // $nextDate = $currentDate->next($query->day);

        // // If the next occurrence is today and it has already passed, get the occurrence for next week
        // if ($nextDate->isPast()) {
        //     $nextDate = $currentDate->next($query->day);
        // }

        // // Format the date as per your requirements
        // $formattedDate = $nextDate->format('d-m-Y');
        // $appointment = Appoiinment::where('date', $formattedDate)->where('time', $query->from_time) ->first();

        // if($appointment){
        //     return response()->json([
        //         'status' => 'error',
        //         'data' => $query,
        //         'time' => $time,
        //     ]);
        // }
        // if (!$query) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Not Found, Please Try Again...',
        //     ], 422);
        // }

        return response()->json([
            'status' => 'success',
            'data' => $query,
            'aptDate' => $request->date,
            'apts' => $apt,
        ]);
    }

}
