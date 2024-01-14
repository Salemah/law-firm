<?php

namespace App\Http\Controllers;

use App\Models\Appoiinment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $posts = Post::with('category')->get();
                $apts = Appoiinment::get();
                if (!Auth::user()->hasAnyRole('admin') || Auth::user()->hasAnyRole('superadmin')) {
                    $apts->where('appointments.team_id', Auth::user()->id);
                }
                return DataTables::of($apts)
                    ->addIndexColumn()
                    ->addColumn('time', function ($apt) {
                        return Carbon::parse($apt->Slot->from_time)->format('g:i A');
                    })
                    ->addColumn('name', function ($apt) {
                        return $apt->Client->name;
                    })
                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                 
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pages.appointment.index');
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
        //
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
}
