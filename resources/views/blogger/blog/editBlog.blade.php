@extends("admin.layout")

@section("title")
    تحديث بيانات المقالة
@endsection


@section("styles")
    {{-- select plugin  --}}
    <link href="{{asset('web/css/select/select2.min.css')}}" rel="stylesheet" />  
@endsection

@section('main')
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">تحديث بيانات هذه المقالة</li>
                            <li class="breadcrumb-item"><a href="{{url('/dashboard/blogs')}}">المقالات </a></li>
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">الصفحة الرئيسة</a></li>
                        </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-end">
                        <h1 class="m-0">تحديث</h1>
                        </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- show errors  --}}
                @if ($errors->any())
                <div class="toast-container position-fixed top-0 end-0 p-3 " style="z-index:999999" >
                <div id="liveToast" class="toast alert-danger show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <strong class="me-auto">Errors</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="$(this).closest('.toast').toast('hide')"></button>
                    </div>
                    @foreach ($errors->all() as $error)
                    <div class="toast-body">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                </div>
            @endif
            @if (session()->has('success'))
            {{-- show success  --}}
            <div class="toast-container position-fixed top-0 end-0 p-3 " style="z-index:999999" >
              <div id="liveToast" class="toast alert-success show" role="alert" aria-live="assertive" aria-atomic="true" >
                <div class="toast-header">
                  <strong class="me-auto">Success</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="$(this).closest('.toast').toast('hide')"></button>
                </div>
                  <div class="toast-body">
                    {{ session()->get('success')  }}
                  </div>
              </div>
            </div>
          @endif
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title float-end">{{$blog[0]->title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{url('dashboard/blogs/update')}}"  method="post" enctype="multipart/form-data" dir="rtl">
                            @csrf
                                <div class="modal-body bg-info">
                                <input type="hidden" value="{{$blog[0]->id}}" name="id" id="editBlog-form-id">
                                    <div class="mb-3">
                                        <label for="title" class="form-label float-end">العنوان</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$blog[0]->title}}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editor" class="form-label float-end">المحتوى</label>
                                        <div style="clear: both"></div>
                                        <textarea id="editor" class="form-control editor"  name="content">
                                            {{$blog[0]->content}}
                                        </textarea> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                                        <img src="{{url("upload/{$blog[0]->image}")}}"  id="editBlog-form-image" class="d-block mx-auto my-2" style="height: 100px">
                                        <input type="file" name="image" class="form-control" id="inputGroupFile02">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-image_meta" class="form-label float-end">النص التعريفي للصورة</label>
                                        <input type="text" class="form-control" name="image_meta" value="{{$blog[0]->image_meta}}" id="editBlog-form-image_meta"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-keywords_meta" class="form-label float-end"> keywords meta</label>
                                        <input type="text" class="form-control" name="keywords" value="{{$blog[0]->keywords_meta}}" id="editBlog-form-keywords_meta"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-description_meta" class="form-label float-end"> description meta</label>
                                        <input type="text" class="form-control" name="description" value="{{$blog[0]->description_meta}}" id="editBlog-form-description_meta"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-active" class="form-label float-end">الحالة</label>
                                        <select class="form-control" name="active" id="editBlog-form-active">
                                            <option @if ($blog[0]->active == 0) selected="selected" @endif value="0">غير فعالة</option>
                                            <option @if ($blog[0]->active == 1) selected="selected" @endif value="1">فعالة</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-tags" class="form-label float-end">كلمات دلالية</label>
                                        <select class="form-select" name="tags[]" multiple="multiple" id="editBlog-form-tags">
                                            @php
                                                $tags = explode(",",$blog[0]->tags);
                                            @endphp
                                            @foreach ($tags as $tag )
                                            <option value="{{$tag}}" selected="selected">{{$tag}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editBlog-form-subCats" class="form-label float-end">العنوان الفرعي</label>
                                        <select class="form-select" name="subCatId" id="editBlog-form-subCats">
                                        @foreach ($subCats as $subCat)
                                            <option @if ($blog[0]->subCatId == $subCat->subCatId) selected="selected" @endif value="{{$subCat->subCatId}}" title="{{$subCat->title}}">{{$subCat->subCatName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer bg-info">
                                <button type="submit" class="btn btn-light">تحديث</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
@endsection


@section("scripts")
    {{-- ckeditor plugin  --}}
    <script src="{{asset('web/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('web/js/ckeditor/jquery.js')}}"></script>
    <script src="{{asset('web/js/ckeditor/sample.js')}}"></script>


    {{-- ckeditor  --}}
    <script>
        initSample()
        $('.editor').ckeditor();
    </script>


    {{-- select plugin --}}
    <script src="{{asset('web/js/select/select2.min.js')}}"></script>
    {{-- create multiple tags  --}}
    <script>
        $('#tags').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $('#editBlog-form-tags').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
      // select with title  

        function formatState (state) {
            if (!state.id) {
            return state.text;
            }

            console.log(state)

            var $state = $(
            `<strong>${state.title}</strong>
            <br>
            <span> ${state.text}</span>`
            );
            return $state;
        };
        
        $("#subCats").select2({
        templateResult: formatState ,
        placeholder: 'Select an option'
        });
    
    </script>
@endsection
