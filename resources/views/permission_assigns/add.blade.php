@extends('layouts.admin_master')
@section('main_content')
    <!-- Advanced Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>New Permission Assign Form</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ url('permissionAssigns')}}" class="btn btn-primary"><i class="material-icons" style="color: white;">settings_backup_restore</i> Back
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">

                    {!! Form::open(['route' =>'permissionAssigns.store','class' => 'form_advanced_validation','method' => 'POST','files' => true]) !!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="permission_id" required>
                                <option value="">-- Please Select Permission --</option>
                                @foreach($permissions as $value)
                                    <option value="{{$value->id}}" @if (old('permission_id') == $value->id) selected="selected" @endif>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="role_id" required>
                                <option value="">-- Please Select Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if (old('role_id') == $role->id) selected="selected" @endif>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{ Form::bsSubmit('Submit') }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Advanced Validation -->
@endsection