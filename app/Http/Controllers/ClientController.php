<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $posts = Post::with('category')->get();
                $posts = Client::get();
                return DataTables::of($posts)
                    ->addIndexColumn()

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
                                  <a href="' . route('admin.client.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('admin.pages.client.index');
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

            return view('admin.pages.client.create');
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
            'status' => 'required',
            'description' => 'required',
        ]);
        try {

            $data = new Client();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/client'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->name;

            $data->description = $request->description;

            $data->status = $request->status;

            $data->save();

            return redirect()->route('admin.client.index')->with('message', 'Create successfull.');
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

            $post = Client::findOrFail($id);
            return view('admin.pages.client.edit', compact( 'post'));
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
           
            'status' => 'required',
            'description' => 'required',
        ]);
        try {

            $data = Client::findOrFail($id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/client'), $filename);
                $data->image = $filename;
            }

            $data->name = $request->name;

            $data->description = $request->description;

            $data->status = $request->status;
            $data->update();

            return redirect()->route('admin.client.index')->with('message', 'Update successfull.');
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
                $post = Client::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Client Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }
    //starts status change function
    public function statusUpdate($id)
    {
        try {
            $post = Client::findOrFail($id);
            $post->status == 1 ? $post->status = 0 : $post->status = 1;

            $post->update();

            if ($post->status == 1) {
                return "active";
            } else {
                return "inactive";
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
