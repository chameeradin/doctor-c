@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Category', 'url' => '']]])

        <div class="pb-3">
            <h1>Manage Category</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <form method="get">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="status" class="control-label">Category Name</label>
                                        <input class="form-control question-id" type="text" name="category_name"
                                               value="{{  (isset(Request::query()['category_name']))? Request::query()['category_name'] : ''  }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="fee" class="control-label">Fee</label>
                                        <input class="form-control" id="first_name" type="text" name="fee"
                                               value="{{ Request::get('fee')}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                        class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('admin.category.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Category</div>

                        <nav class="card-header-actions">
                            <a href="{{ route('admin.category.create') }}"
                               class="btn btn-success">{{'Add a new Category'}}</a>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                <tr>
                                    <th scope="col">Reference No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Fee</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id}}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->fee }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit',[$category->id]) }}"
                                                   class="btn btn-sm btn-primary">{{'Edit'}}</a>
                                                <form method="POST"
                                                      action="{{route("admin.category.destroy", $category->id)}}"
                                                      accept-charset="UTF-8" style="display: inline-block;"
                                                      onsubmit="return confirm('Are You sure you want to delete the category {{ '"'.$category->name.'"'}}?');">
                                                    {{method_field("DELETE")}}
                                                    {{csrf_field()}}
                                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                                </form>
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
                                    @include('layouts.partials.admin-pagination', ['result' => $categories])
                                </div>
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
