@extends('layouts.admin_master')
@section('main_content')
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Role List
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{url('roles/create')}}" class="dropdown-toggle btn btn-info">New Add</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    <a class="btn btn-primary waves-effect" href="{{ URL::to('roles/' . $role->id . '/edit') }}" style="margin-left: 5px"> <i class="material-icons">edit</i> Edit</a>
                                    {{ Form::open(array('url' => 'roles/' . $role->id, 'class' => 'pull-left')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
@endsection