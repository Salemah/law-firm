<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use DataTables;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $sliders = Slider::get();

                return DataTables::of($sliders)
                    ->addIndexColumn()
                    ->addColumn('image', function ($slider) {
                        $url = asset('/image/slider/' . $slider->image);
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
                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.slider.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['image', 'status','action' ])
                    ->make(true);
            }
            return view('admin.pages.slider.index');
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
            return view('admin.pages.slider.create');
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
        ]);
        try {

            $data = new Slider();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/slider'), $filename);
                $data->image = $filename;
            }

            $data->title = $request->title;
            $data->details = $request->details;
            $data->status = $request->status;

            $data->save();

            return redirect()->route('admin.slider.index')->with('message', 'Create successfull.');
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
            $slider = Slider::findOrFail($id);
            return view('admin.pages.slider.edit',compact('slider'));
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
            'image' => 'required',
        ]);
        try {

            $data = Slider::findOrFail($id);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/slider'), $filename);
                $data->image = $filename;
            }

            $data->title = $request->title;
            $data->details = $request->details;
            $data->status = $request->status;

            $data->update();

            return redirect()->route('admin.slider.index')->with('message', 'Update successfull.');
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
                $post = Slider::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Slider Deleted Successfully.',
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
            $slider = Slider::findOrFail($id);
            $slider->status == 1 ? $slider->status = 0 : $slider->status = 1;

            $slider->update();

            if ($slider->status == 1) {
                return "active";
            } else {
                return "inactive";
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
