@extends('layouts.admin_master')
@section('main_content')
    <!-- Advanced Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>New Permission Create Form</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ url('permissions')}}" class="btn btn-primary"><i class="material-icons" style="color: white;">settings_backup_restore</i> Back
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">

                    {!! Form::open(['route' =>'permissions.store','class' => 'form_advanced_validation','method' => 'POST','files' => true]) !!}
                    {{ Form::bsText('name') }}
                    {{ Form::bsText('display_name') }}
                    {{ Form::bsText('description') }}
                    {{ Form::bsSubmit('Submit') }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Advanced Validation -->
@endsection