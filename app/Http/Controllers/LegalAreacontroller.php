<?php

namespace App\Http\Controllers;

use App\Models\legalarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LegalAreacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $posts = Post::with('category')->get();
                $posts = DB::table('legalareas')
                    ->orderBy('legalareas.ID', 'DESC')
                    ->where('legalareas.deleted_at', null)
                    ->get();
                return DataTables::of($posts)
                    ->addIndexColumn()

                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.legalarea.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pages.leagal-area.index');
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
            return view('admin.pages.leagal-area.create');
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
        ]);
        try {

            $data = new legalarea();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/legalarea'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->title;

            $data->description = $request->description;
            $data->icon = $request->icon;

            $data->save();

            return redirect()->route('admin.legalarea.index')->with('message', 'Create successfull.');
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
            $post = legalarea::findOrFail($id);
            return view('admin.pages.leagal-area.edit', compact( 'post'));
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
        ]);
        try {

            $data = legalarea::findOrFail($id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/legalarea'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->title;

            $data->description = $request->description;
            $data->icon = $request->icon;
            $data->update();

            return redirect()->route('admin.legalarea.index')->with('message', 'Update successfull.');
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
                $post = legalarea::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Legal Area Deleted Successfully.',
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
