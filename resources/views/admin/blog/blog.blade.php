
@extends("admin.layout")

@section("title")
    المقالات
@endsection


@section("styles")
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("web/css/datatables/dataTables.bootstrap4.min.css")}}" >
  <link rel="stylesheet" href="{{asset("web/css/datatables/responsive.bootstrap4.min.css")}}" >
  <link rel="stylesheet" href="{{asset("web/css/datatables/buttons.bootstrap4.min.css")}}" >
  {{-- select plugin  --}}
  <link href="{{asset('web/css/select/select2.min.css')}}" rel="stylesheet" />  
@endsection


@section("main")

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">المقالات</li>
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الصفحة الرئيسة</a></li>
                </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 text-end">
                  <h1 class="m-0">المقالات</h1>
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
                  <h3 class="card-title float-end">جدول المقالات</h3>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#addBlog" class="btn btn-info">إضافة عنصر جديد</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table dir="rtl" id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>العنوان</th>
                      <th>الصورة</th>
                      <th>ميتا الصورة</th>
                      <th>المحتوى</th>
                      <th>كلمات دلالية</th>
                      <th>الحالة</th>
                      <th>keywords meta</th>
                      <th>description meta</th>
                      <th>اسم المستخدم</th>
                      <th>العنوان الرئيسي </th>
                      <th>العنوان الفرعي</th>
                      <th>تاريخ الانشاء</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($blogs as $blog)
                        <tr>
                          <td>{{$blog->title}}</td>
                          <td><img src="{{url("upload/{$blog->image}")}}" class="img-fluid" style="width:80px;height:80px;object-fit:cover" alt="{{$blog->image_meta}}"></td>
                          <td>{{$blog->image_meta}}</td>
                          <td >
                            @php
                              echo substr(strip_tags($blog->content),1,50);
                            @endphp.......
                          </td>
                          <td>
                            @php
                              $tags = explode(",",$blog->tags);
                            @endphp
                            @foreach ($tags as $tag)
                                <span class="badge badge-primary m-1">{{$tag}}</span>
                            @endforeach
                          </td>
                          <td>
                            @if ($blog->active)
                                <b>فعالة</b>
                            @else
                                <b>غير فعالة</b>
                            @endif
                          </td>
                          <td>{{$blog->keywords_meta}}</td>
                          <td>{{$blog->description_meta}}</td>
                          <td>{{$blog->userName}}</td>
                          <td>{{$blog->mainCat}}</td>
                          <td>{{$blog->subCat}}</td>
                          <td>{{$blog->created_at}}</td>
                          <td>
                            <button type="button" data-bs-toggle="modal" 
                            data-bs-target="#deleteBlog"
                            class="btn-danger btn" title="delete" 
                            onclick="deleteBlogItem({{$blog->id}})"><i class="fas fa-trash"></i></button>
                            <a href="{{url("admin/blogs/update/{$blog->id}")}}" class="btn-info btn"><i class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
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
  
  <!-- /.content-wrapper -->
  
  
  @extends('admin.modal.modelBlog')


  @endsection
  
  

@section("scripts")
    {{-- <!-- DataTables  & Plugins --> --}}
    <script src="{{asset("web/js/datatable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset('web/js/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.colVis.min.js')}}"></script>
    {{-- ckeditor plugin  --}}
    <script src="{{asset('web/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('web/js/ckeditor/jquery.js')}}"></script>
    <script src="{{asset('web/js/ckeditor/sample.js')}}"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });



      function deleteBlogItem(id){
          document.getElementById('blogId').value = id
      }
    </script>

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
