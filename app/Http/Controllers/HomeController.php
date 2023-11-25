<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
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
use App\Models\WelcomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            return view('frontend.home',compact('welcome','clients','questions','posts', 'legalareas','teams','sliders'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
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
            $orders = Slot::orderBy('created_at')->get()->groupBy(function ($data) {
                return $data->day;
            });;


            return view('frontend.slot',compact('slots', 'team', 'orders'));
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

            return redirect()->back()->with('message', 'successfull.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
