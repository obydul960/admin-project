<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Permission;
use Session;
use DB;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id','DESC')->get();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.add');
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
            return redirect::to("permissions/create")->withInput();
        } else {
            $permission= new Permission();
            $permission->name = $request->get('name');
            $permission->display_name = $request->get('display_name');
            $permission->description = $request->get('description');
            $permission->save();
            Session::flash('success', 'Successfully created permission!');
            return redirect::to('permissions');
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
        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));
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
            return Redirect::to('permissions/' . $id . '/edit');
        } else {
            $permission = Permission::find($id);
            $permission->name = $request->get('name');
            $permission->display_name = $request->get('display_name');
            $permission->description = $request->get('description');
            $permission->save();

            // redirect
            Session::flash('success', 'Successfully updated permission!');
            return Redirect::to('permissions');
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
        $delete = Permission::where('id',$id)->delete();
        Session::flash('success', 'Successfully deleted the permission!');
        return redirect::to('permissions');
    }
}
