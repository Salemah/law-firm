<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Exception;
use DataTables;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $posts = Post::with('category')->get();
                $posts = DB::table('posts')
                                    ->orderBy('posts.ID','DESC')
                                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                                    ->select('posts.*', 'categories.name as category_by')
                                    ->where('posts.deleted_at',null)
                                    ->get();
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
                    ->addColumn('category', function ($post) {

                        return $post->category_by;
                    })

                    ->addColumn('action', function ($post) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.post.edit', $post->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $post->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['category','action', 'status' ])
                    ->make(true);
            }
            return view('admin.pages.post.index');
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
            $categories =  Category::where('status',1)->get();
            return view('admin.pages.post.create',compact('categories'));
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
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {

            $data = new Post();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/post'), $filename);
                $data->image = $filename;
            }

            $data->title = $request->title;
            $data->category_id = $request->category;
            $data->description = $request->description;
            $data->status = $request->status;

            $data->save();

            return redirect()->route('admin.post.index')->with('message', 'Create successfull.');
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
            $categories =  Category::where('status',1)->get();
            $post = Post::findOrFail($id);
            return view('admin.pages.post.edit',compact('categories','post'));
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
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {

            $data =Post::findOrFail($id);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/post'), $filename);
                $data->image = $filename;
            }

            $data->title = $request->title;
            $data->category_id = $request->category;
            $data->description = $request->description;
            $data->status = $request->status;

            $data->update();

            return redirect()->route('admin.post.index')->with('message', 'Update successfull.');
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
                $post = Post::findOrFail($id);
                if ($post) {
                    $post->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Post Deleted Successfully.',
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
            $post = Post::findOrFail($id);
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
