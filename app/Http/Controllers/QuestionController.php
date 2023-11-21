<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $Category = Question::get();
                return DataTables::of($Category)
                    ->addIndexColumn()


                    ->addColumn('action', function ($Category) {
                        return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                  <a href="' . route('admin.question.edit', $Category->id) . '" class="btn btn-sm btn-success text-white" style="cursor:pointer" title="Edit"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm(' . $Category->id . ')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>';
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('admin.pages.question.index');
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
            return view('admin.pages.question.create');
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
            'question'            =>      'required',
            'answer'            =>      'required',
        ]);

        try {
            $data                       =       new Question();
            $data->question                 =       $request->question;
            $data->answer                 =       $request->answer;
            $data->save();

            return redirect()->route('admin.question.index')
                ->with('message', 'Question Created Successfully');
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
            $question = Question::findOrFail($id);
            return view('admin.pages.question.edit', compact('question'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['question'            =>      'required',
            'answer'            =>      'required',
        ]);

        try {
            $data = Question::findOrFail($id);
            $data->question                 =       $request->question;
            $data->answer                 =       $request->answer;
            $data->save();

            return redirect()->route('admin.question.index')
                ->with('message', 'Question Update Successfully');
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
                $category = Question::findOrFail($id);
                if ($category) {
                    $category->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Question Deleted Successfully.',
                    ]);
                }
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }

}

