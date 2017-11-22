<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Role;
use App\Models\Permission;
use Session;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.add');
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
            'name'   => 'required|unique:roles,name|min:2|max:30',
            'display_name'   => 'required|min:2|max:30',
            'description'   => 'required|min:2|max:30'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return redirect::to("roles/create")->withInput();
        } else {
            $role= new Role();
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->description = $request->get('description');
            $role->save();
            Session::flash('success', 'Successfully created Roles!');
            return redirect::to('roles');
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
        $role = Role::find($id);
        return view('roles.edit',compact('role'));
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
            'name'   => 'required|min:2|max:30',
            'display_name'   => 'required|min:2|max:30',
            'description'   => 'required|min:2|max:30'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Request Failure');
            return Redirect::to('roles/' . $id . '/edit');
        } else {
            // store
            $role = Role::find($id);
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->description = $request->get('description');
            $role->save();

            // redirect
            Session::flash('success', 'Successfully updated role!');
            return Redirect::to('roles');
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
        $delete = Role::where('id',$id)->delete();
        Session::flash('success', 'Successfully deleted the Roles!');
        return redirect::to('roles');
    }
}
