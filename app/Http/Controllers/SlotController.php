<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $Category = Slot::get();
                return DataTables::of($Category)
                    ->addIndexColumn()
                    ->addColumn('name', function ($Category) {
                        return $Category->Team->name;
                    })
                    ->addColumn('from_time', function ($Category) {
                        return Carbon::parse($Category->from_time)->format('g:i A');
                    })



                    ->addColumn('action', function ($Category) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.slot.edit', $Category->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $Category->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action',])
                    ->make(true);
            }
            return \view('admin.pages.slot.index');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $teams = Team::get();
            return view('admin.pages.slot.create', compact('teams'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_id'            =>      'required',
            // 'user_id'            =>      'required',
            // 'day'            =>      'required',
            // 'from_time'            =>      'required',
            // 'user_id'            =>      'required',
        ]);

        try {
            // $data                       =       new Slot();
            // $data->team_id                 =       $request->team_id;
            // $data->user_id                =       $request->user_id;
            // $data->day                =       $request->day;
            // $data->from_time                =       $request->from_time;
            // $data->save();
            if(count($request->from_time_saturday)>1){

                foreach ($request->from_time_saturday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Saturday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_sunday) >1){
                foreach ($request->from_time_sunday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Sunday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_monday) >1){
                foreach ($request->from_time_monday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Monday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_tuesday) >1){
                foreach ($request->from_time_tuesday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Tuesday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_wednesday) >1){
                foreach ($request->from_time_wednesday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Wednesday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_thursday) >1){
                foreach ($request->from_time_thursday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'Thursday';
                $List->from_time = $day;
                $List->save();
                }
            }
            if(count($request->from_time_friday) >1){
                foreach ($request->from_time_friday as $key => $day) {
                $List = new Slot();
                $List->team_id = $request->team_id;
                $user = Team::find($request->team_id);
                $List->user_id = $user->user_id;
                $List->day = 'friday';
                $List->from_time = $day;
                $List->save();
                }
            }
            // foreach ($request->days as $key => $day) {

            //     $List = new Slot();
            //     $List->team_id =$request->team_id;
            //     $user = Team::find($request->team_id);
            //     $List->user_id = $user->user_id;
            //     $List->day = $day;
            //     $List->from_time = $request->from_time[$key];
            //     $List->save();
            // }

            return redirect()->route('admin.slot.index')
                ->with('message', ' Created Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
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
        try {
            $category = Slot::findOrFail($id);
            return view('admin.pages.slot.edit', compact('category'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'team_id'            =>      'required',
            'user_id'            =>      'required',
            'day'            =>      'required',
            'from_time'            =>      'required',
            // 'user_id'            =>      'required',
        ]);

        try {
            $data = Slot::findOrFail($id);
            $data->team_id                 =       $request->team_id;
            $data->user_id                =       $request->user_id;
            $data->day                =       $request->day;
            $data->from_time                =       $request->from_time;
            $data->update();

            return redirect()->route('admin.slot.index')
                ->with('message', 'Slot Update Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->ajax()) {
            try {
                $category = Slot::findOrFail($id);
                if ($category) {
                    $category->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Slot Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }

}
