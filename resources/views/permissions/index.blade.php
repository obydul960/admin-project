@extends('layouts.admin_master')
@section('main_content')
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Permission List
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{url('permissions/create')}}" class="dropdown-toggle btn btn-info">New Add</a>
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
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->display_name}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td>
                                        <a class="btn btn-primary waves-effect" href="{{ URL::to('permissions/' . $permission->id . '/edit') }}" style="margin-left: 5px"> <i class="material-icons">edit</i> Edit</a>
                                        {{ Form::open(array('url' => 'permissions/' . $permission->id, 'class' => 'pull-left')) }}
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