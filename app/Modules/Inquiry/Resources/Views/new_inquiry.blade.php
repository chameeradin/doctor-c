@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Inquiry', 'url' =>route('admin.inquiry.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>Inquiries</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New Inquiry</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('admin.inquiry.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="first_name" class="control-label">First Name<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{old('first_name')}}">
                                                @if(isset($errors) && $errors->first('first_name'))
                                                    <span class="text-danger">
                                              {{$errors->first('first_name')}}
                                          </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="last_name" class="control-label">Last Name<span class="text-danger"> *</span></label>
                                              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="{{old('last_name')}}">
                                              @if(isset($errors) && $errors->first('last_name'))
                                                  <span class="text-danger">
                                                    {{$errors->first('last_name')}}
                                                  </span>
                                              @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="telephone_number" class="control-label">Phone</label>
                                              <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="" value="{{old('telephone_number')}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email_addresss" class="control-label">Email<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="email_addresss" name="email_addresss" placeholder="" value="{{old('email_addresss')}}">
                                                @if(isset($errors) && $errors->first('email_addresss'))
                                                    <span class="text-danger">
                                                        {{$errors->first('email_addresss')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-12">
                                              <label for="name" class="control-label">{{'Message'}}<span class="text-danger"> *</span></label>
                                              <textarea name="message" id="message" class="form-control tinymce" placeholder="">{{old('message')}}</textarea>
                                              @if(isset($errors) && $errors->first('message'))
                                                  <span class="text-danger">
                                                      {{$errors->first('message')}}
                                                  </span>
                                              @endif
                                          </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.inquiry.list')}}" >Cancel</a>
                                    </div>
                                </div>
                          <script type="text/javascript">

                            $(function () {
                                tinymce.init({
                                    mode: "exact",
                                    elements : "message",
                                    theme: "modern",
                                    menubar: "edit",
                                    forced_root_block : "",
                                    setup: function (editor) {
                                        editor.on('change', function () {
                                            editor.save();
                                        });
                                    },
                                    plugins: [
                                        "advlist autolink lists advlist link image charmap print preview hr anchor pagebreak",
                                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                                        "emoticons template paste textcolor colorpicker textpattern imagetools"
                                    ],
                                    //toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                                    toolbar: "bold italic underline | bullist | link",
                                    //toolbar2: "print preview media | forecolor backcolor emoticons",
                                    image_advtab: true,
                                    advlist_bullet_styles: "square",
                                    templates: [
                                        {title: 'Test template 1', content: 'Test 1'},
                                        {title: 'Test template 2', content: 'Test 2'}
                                    ]
                                });
                            });

                          </script>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
