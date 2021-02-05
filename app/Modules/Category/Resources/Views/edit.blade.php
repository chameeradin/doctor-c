@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Category', 'url' =>route('admin.category.list')],['name' => 'Edit', 'url' =>'']]])

        <div class="pb-3">
            <h1>Category</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Edit Category</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('admin.category.update', ['id' => $category->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="category_name" class="control-label">{{ 'Category Name'}} <span class="text-danger"> *</span></label>
                        <input  type="text" name="c_name" id="c_name" class="form-control" placeholder="" value="{{old('c_name', $category->name )}}">
                        @if(isset($errors) && $errors->first('c_name'))
                            <span class="text-danger">
                                {{$errors->first('c_name')}}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="category_fee" class="control-label">{{ 'Category Fee'}} <span class="text-danger"> *</span></label>
                        <input  type="text" name="fee" id="fee" class="form-control" placeholder="" value="{{old('fee', $category->fee)}}">
                        @if(isset($errors) && $errors->first('fee'))
                            <span class="text-danger">
                                {{$errors->first('fee')}}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="panel-footer"><input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                <a class="btn btn-lg btn-danger" href="/admin/category" >Cancel</a></div>
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
