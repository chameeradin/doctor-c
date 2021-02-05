@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'User', 'url' => '']]])

        <div class="pb-3">
            <h1>Manage User</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <form method="get">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="first_name" class="control-label">First Name</label>
                                        <input class="form-control" id="first_name" type="text" name="first_name"
                                               value="{{ Request::get('first_name')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="last_name" class="control-label">Last Name</label>
                                        <input class="form-control" id="last_name" type="text" name="last_name"
                                               value="{{ Request::get('last_name')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input class="form-control" id="email" type="text" name="email"
                                               value="{{ Request::get('email')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="role" class="control-label">Role</label>
                                        <select name="role" class="form-control" id="role">
                                            <option value=""></option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ Request::get('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                        class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('admin.user.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Users</div>

                        <nav class="card-header-actions">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-success">{{'Add a new User'}}</a>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->title}}</td>
                                            <td>{{ $user->first_name}}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>{{ getRoleNameById($user->role_id)}}</td>
                                            <td>
                                                @if($user->id != 1)
                                                    <a href="{{ route('admin.user.edit',[$user->id]) }}"
                                                       class="btn btn-sm btn-primary">{{'Edit'}}</a>
                                                    @if(!isset($user->doctor) )
                                                    @if(!isset($user->patient))
                                                    <form method="POST"
                                                          action="{{route("admin.user.destroy", $user->id)}}"
                                                          accept-charset="UTF-8" style="display: inline-block;"
                                                          onsubmit="return confirm('Are You sure you want to delete the user {{ '"'.$user->id.'"'}}?');">
                                                        {{method_field("DELETE")}}
                                                        {{csrf_field()}}
                                                        <input class="btn btn-sm btn-danger" type="submit"
                                                               value="Delete">
                                                    </form>
                                                    @endif
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td scope="col" colspan="12"
                                            class="text-center">{{trans('No entries in table.')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('layouts.partials.admin-pagination', ['result' => $users])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
@endsection
