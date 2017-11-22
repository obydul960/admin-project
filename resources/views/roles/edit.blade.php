@extends('layouts.admin_master')
@section('main_content')
    <!-- Advanced Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Role Edit Form</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ url('roles')}}" class="btn btn-primary"><i class="material-icons" style="color: white;">settings_backup_restore</i> Back
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">

                    {!! Form::open(['route' =>['roles.update',$role->id],'class' => 'form_advanced_validation','method' => 'PUT','files' => true]) !!}
                    {{ Form::bsText('name',$role->name) }}
                    {{ Form::bsText('display_name',$role->display_name) }}
                    {{ Form::bsText('description',$role->description) }}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Submit') }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Advanced Validation -->
@endsection