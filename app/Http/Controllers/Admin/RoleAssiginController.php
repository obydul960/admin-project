<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Role;
use App\Models\RoleAssign;
use App\User;
use Session;
use DB;
class RoleAssiginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleAssigns = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->select('role_user.id','users.name AS user_name','roles.name AS role_name')->get();
        return view('role_assigns.index',compact('roleAssigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        $roles = Role::get();
        return view('role_assigns.add',compact('user','roles'));
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
            'user_id'   => 'required',
            'role_id'   => 'required|unique:role_user,role_id',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return redirect::to("roleAssigns/create")->withInput();
        } else {
            $roleAssign= new RoleAssign();
            $roleAssign->user_id = $request->get('user_id');
            $roleAssign->role_id = $request->get('role_id');
            $roleAssign->save();
            Session::flash('success', 'Successfully created Roles!');
            return redirect::to('roleAssigns');
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
        $user = User::get();
        $roles = Role::get();
        $roleUser = RoleAssign::find($id);
        return view('role_assigns.edit',compact('user','roles','roleUser'));
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
            'user_id'   => 'required',
            'role_id'   => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return Redirect::to('roleAssigns/' . $id . '/edit');
        } else {
            // store
            $roleAssign = RoleAssign::find($id);
            $roleAssign->user_id = $request->get('user_id');
            $roleAssign->role_id = $request->get('role_id');
            $roleAssign->save();

            // redirect
            Session::flash('success', 'Successfully updated role!');
            return Redirect::to('roleAssigns');
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
        $delete = RoleAssign::where('id',$id)->delete();
        Session::flash('success', 'Successfully deleted the Roles!');
        return redirect::to('roleAssigns');
    }
}
