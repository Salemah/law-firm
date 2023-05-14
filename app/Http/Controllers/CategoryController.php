<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(  Request $request)
    {
        try{
            if ($request->ajax()) {
                $Category = Category::get();
                return DataTables::of($Category)
                    ->addIndexColumn()

                    ->addColumn('status', function ($Category) {
                        if ($Category->status == 1) {
                            $status = '<button type="submit" class="btn btn-sm btn-success mb-2 text-white" onclick="showStatusChangeAlert(' . $Category->id . ')">Active</button>';
                        } else {
                            $status = '<button type="submit" class="btn btn-sm btn-danger mb-2 text-white" onclick="showStatusChangeAlert(' . $Category->id . ')">Inactive</button>';
                        }
                        return $status;
                    })

                    ->addColumn('action', function ($Category) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.category.edit', $Category->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $Category->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action', 'status' ])
                    ->make(true);
            }
            return \view('admin.pages.category.index');

        }
        catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.pages.category.create');
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
            'name'            =>      'required|unique:categories,name',
            'status'            =>      'required',
        ]);

        try {
            $data                       =       new Category();
            $data->name                 =       $request->name;
            $data->status                 =       $request->status;
            $data->save();

            return redirect()->route('admin.category.index')
                    ->with('message', 'Category Created Successfully');
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
            $category = Category::findOrFail($id);
            return view('admin.pages.category.edit',compact('category'));
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
            'name'=>'required|unique:categories,name,'.$id.',id',
            'status'=>'required',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->name=$request->name;
            $category->status = $request->status;
            $category->save();

            return redirect()->route('admin.category.index')
                    ->with('message', 'Category Update Successfully');
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
                $category = Category::findOrFail($id);
                if ($category) {
                    $category->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Category Deleted Successfully.',
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

            $category = Category::findOrFail($id);
            $category->status == 1 ? $category->status = 0 : $category->status = 1;

            $category->update();

            if ($category->status == 1) {
                return "active";
            } else {
                return "inactive";
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
