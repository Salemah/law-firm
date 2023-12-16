<?php

namespace App\Http\Controllers;

use App\Models\PermissionCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{
    public function user_management($id = null)
    {
        $users = null;
        $all_users = DB::table('users')->get();
        // ->where('created_by', Auth::id())
        if ($id) {
            $users = DB::table('users')->where('id', $id)->first();
        }
        $role_permissions = Role::with('permissions')->get();

        return view('admin.pages.permission.user_management', compact('users', 'all_users','role_permissions'));
    }
    public function UserDataList(Request $request)
    {
        $user = User::orderBy('id', 'desc')
        // ->where('type', 'user')

        ->get();
        $this->i = 1;

        return DataTables::of($user)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })

            ->addColumn('action', function ($data) {
                $htmlData = '';
                // if (Auth::User()->can('view user')) {
                    $htmlData .= '<a href="' . route('admin.user_restictions.edit', ['id' => "$data->id"]) . '" data-id="' . $data->id . '" class="btn btn-info btn-sm tableLock"><i class="fa fa-lock"></i></a>';
                // }
                // if (Auth::User()->can('edit user')) {
                    // $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                // }

                return $htmlData;
            })
            ->toJson();
    }
    public function UserRectictions($id)
    {
        $user = User::find($id);
        $permissions = $user->getPermissionNames()->toArray();
        $permissionCategory = PermissionCategory::orderBy('type')->get();
        $permissionCategorys = $permissionCategory->groupBy('type');

        return view('admin.pages.permission.user_restictions', compact('permissionCategorys', 'permissions', 'user'));
    }

    public function UserRectictionsUpdate(Request $request)
    {
        $user = User::find($request->id);
        $user->syncPermissions($request->permission);

        return response()->json([
            'status' => 'success',
            'message' => 'All permission assign successfully',
        ]);
    }
}
