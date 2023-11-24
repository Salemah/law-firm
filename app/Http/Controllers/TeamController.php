<?php

namespace App\Http\Controllers;

use App\Models\legalarea;
use App\Models\SubLegalArea;
use App\Models\Team;
use Illuminate\Http\Request;
use DataTables;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $teams = Team::get();

                return DataTables::of($teams)
                    ->addIndexColumn()
                    ->addColumn('image', function ($team) {
                        $url = asset('/image/team/' . $team->image);
                        return '<img src="' . $url . '" border="0" width="40"  align="center" />';
                    })
                    ->addColumn('status', function ($post) {
                        if ($post->status == 1) {
                            $status = '<button type="submit" class="btn btn-sm btn-success mb-2 text-white" onclick="showStatusChangeAlert(' . $post->id . ')">Active</button>';
                        } else {
                            $status = '<button type="submit" class="btn btn-sm btn-danger mb-2 text-white" onclick="showStatusChangeAlert(' . $post->id . ')">Inactive</button>';
                        }
                        return $status;
                    })
                    ->addColumn('details', function ($post) {

                        return $post->details;
                    })
                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.team.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['details','image', 'status','action' ])
                    ->make(true);
            }
            return view('admin.pages.team.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $legalareas = legalarea::get();
            return view('admin.pages.team.create',compact('legalareas'));
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
            'image' => 'required',
            'name' => 'required',
        ]);
        try {

            $data = new Team();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/team'), $filename);
                $data->image = $filename;
            }

            $data->positions = $request->positions;
            $data->legal_area_id = json_encode( $request->legal_area_id);
            $data->sub_legal_area_id= json_encode( $request->sub_legal_area_id);
            $data->fees= $request->fees;
            $data->name = $request->name;
            $data->details = $request->details;
            $data->status = $request->status;

            $data->save();

            return redirect()->route('admin.team.index')->with('message', 'Create successfull.');
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
            $team =  Team::findOrFail($id);
            $legalareas = legalarea::get();
            $sublegalareas = SubLegalArea::get();
            return view('admin.pages.team.edit',compact('team', 'legalareas', 'sublegalareas'));
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
            'name' => 'required',
        ]);
        try {


            $data = Team::findOrFail($id);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/team'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->name;
            $data->positions = $request->positions;
            $data->legal_area_id = json_encode( $request->legal_area_id);
            $data->sub_legal_area_id = json_encode( $request->sub_legal_area_id);
            $data->fees = $request->fees;
            $data->details = $request->details;
            $data->status = $request->status;

            $data->update();

            return redirect()->route('admin.team.index')->with('message', 'Create successfull.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if ($request->ajax()) {
            try {
                $post = Team::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Team Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }
    public function statusUpdate($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->status == 1 ? $team->status = 0 : $team->status = 1;

            $team->update();

            if ($team->status == 1) {
                return "active";
            } else {
                return "inactive";
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function SubLegalAreaSearch(Request $request)
    {
        $result = SubLegalArea::query()
            ->where('legal_area_id', "$request->legal_area_id")
            ->where('name', 'LIKE', "%{$request->search}%")
            ->get(['name', 'id']);

        return $result;
    }

}
