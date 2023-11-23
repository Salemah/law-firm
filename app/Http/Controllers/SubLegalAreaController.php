<?php

namespace App\Http\Controllers;

use App\Models\legalarea;
use App\Models\SubLegalArea;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubLegalAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $posts = Post::with('category')->get();
                $posts = SubLegalArea::get();
                return DataTables::of($posts)
                    ->addIndexColumn()

                    ->addColumn('legalarea', function ($post) {
                        return $post->LegalArea->name;
                    })
                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.sublegalarea.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pages.sub-legal-area.index');
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
            $legalareas =  legalarea::get();
            return view('admin.pages.sub-legal-area.create',compact('legalareas'));
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
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'legal_area_id' => 'required',
        ]);
        try {

            $data = new SubLegalArea();
            $data->name = $request->title;
            $data->legal_area_id = $request->legal_area_id;
            $data->description = $request->description;
            $data->icon = $request->icon;

            $data->save();

            return redirect()->route('admin.sublegalarea.index')->with('message', 'Create successfull.');
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
            $legalareas =  legalarea::get();
            $post = SubLegalArea::findOrFail($id);
            return view('admin.pages.sub-legal-area.edit', compact('post', 'legalareas'));
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
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'legal_area_id' => 'required',
        ]);
        try {

            $data = SubLegalArea::findOrFail($id);


            $data->name = $request->title;
            $data->legal_area_id = $request->legal_area_id;

            $data->description = $request->description;
            $data->icon = $request->icon;
            $data->update();

            return redirect()->route('admin.sublegalarea.index')->with('message', 'Update successfull.');
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
                $post = SubLegalArea::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Sub Legal Area Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }
    //starts status change function
    // public function statusUpdate($id)
    // {
    //     try {
    //         $post = cased::findOrFail($id);
    //         $post->status == 1 ? $post->status = 0 : $post->status = 1;

    //         $post->update();

    //         if ($post->status == 1) {
    //             return "active";
    //         } else {
    //             return "inactive";
    //         }
    //     } catch (\Exception $exception) {
    //         return $exception->getMessage();
    //     }
    // }
}
