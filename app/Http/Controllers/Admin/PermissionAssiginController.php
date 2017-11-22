<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Role;
use App\Models\PermissionAssign;
use App\Models\Permission;
use Session;
use DB;
class PermissionAssiginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionAssigns = DB::table('roles')
            ->join('permission_role','roles.id','=','permission_role.role_id')
            ->join('permissions','permission_role.permission_id','=','permissions.id')
            ->select('permission_role.*','roles.name AS role_name','permissions.name AS permission_name')->get();
        return view('permission_assigns.index',compact('permissionAssigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return view('permission_assigns.add',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission_id'   => 'required|unique:permission_role,permission_id',
            'role_id'   => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return redirect::to("permissionAssigns/create")->withInput();
        } else {
            $permissionAssign= new PermissionAssign();
            $permissionAssign->permission_id = $request->get('permission_id');
            $permissionAssign->role_id = $request->get('role_id');
            $permissionAssign->save();
            Session::flash('success', 'Successfully created Roles!');
            return redirect::to('permissionAssigns');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::get();
        $roles = Role::get();
        $permissionAssign = PermissionAssign::find($id);
        return view('permission_assigns.edit',compact('permissions','roles','permissionAssign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'permission_id'   => 'required',
            'role_id'   => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return Redirect::to('permissionAssigns/' . $id . '/edit');
        } else {
            $permissionAssign = PermissionAssign::find($id);
            $permissionAssign->permission_id = $request->get('permission_id');
            $permissionAssign->role_id = $request->get('role_id');
            $permissionAssign->save();

            // redirect
            Session::flash('success', 'Successfully updated Permission Role!');
            return Redirect::to('permissionAssigns');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PermissionAssign::where('id',$id)->delete();
        Session::flash('success', 'Successfully deleted the Permission Role !');
        return redirect::to('permissionAssigns');
    }
}
