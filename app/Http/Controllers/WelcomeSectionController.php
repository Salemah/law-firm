<?php

namespace App\Http\Controllers;

use App\Models\WelcomeSection;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WelcomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $sliders = WelcomeSection::get();

                return DataTables::of($sliders)
                    ->addIndexColumn()
                    ->addColumn('image', function ($slider) {
                        $url = asset('/image/welcome/' . $slider->image);
                        return '<img src="' . $url . '" border="0" width="40"  align="center" />';
                    })

                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.welcomesection.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
            return view('admin.pages.welcomesection.index');
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
            return view('admin.pages.welcomesection.create');
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
            'title' => 'required',
            'description' => 'required',

        ]);
        try {

            $data = new WelcomeSection();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/welcome'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->title;
            $data->description = $request->description;
            $data->point = $request->points;

            $data->save();

            return redirect()->route('admin.welcomesection.index')->with('message', 'Create successfull.');
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
            $slider = WelcomeSection::findOrFail($id);
            return view('admin.pages.welcomesection.edit', compact('slider'));
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
            'title' => 'required','description' => 'required',

        ]);
        try {

            $data = WelcomeSection::findOrFail($id);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/welcome'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->title;
            $data->description = $request->description;
            $data->point = $request->points;

            $data->update();

            return redirect()->route('admin.welcomesection.index')->with('message', 'Update successfull.');
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
                $post = WelcomeSection::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Section Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }

}
