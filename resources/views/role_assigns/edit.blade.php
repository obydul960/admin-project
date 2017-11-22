@extends('layouts.admin_master')
@section('main_content')
    <!-- Advanced Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>New Role Assign Edit Form</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ url('roleAssigns')}}" class="btn btn-primary"><i class="material-icons" style="color: white;">settings_backup_restore</i> Back
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">

                    {!! Form::open(['route' =>['roleAssigns.update',$roleUser->id],'class' => 'form_advanced_validation','method' => 'PUT','files' => true]) !!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="user_id" required>
                                <option value="">-- Please Select User --</option>
                                @foreach($user as $value)
                                    <option value="{{$value->id}}" @if ($roleUser->user_id == $value->id) selected="selected" @endif>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="role_id" required>
                                <option value="">-- Please Select Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if ($roleUser->role_id == $role->id) selected="selected" @endif>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Submit') }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Advanced Validation -->
@endsection