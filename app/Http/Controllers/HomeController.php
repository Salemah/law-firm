<?php

namespace App\Http\Controllers;

use App\Models\DashboardSetting;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

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

            return view('frontend.home',compact('posts','teams','sliders'));
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
            $posts = Post::with('category')->where('status',1)->paginate(6);
            return view('frontend.post.all-post',compact('posts'));
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
            return view('frontend.post.show',compact('post','dashboardSettings'));
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

}
