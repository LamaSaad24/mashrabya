
@extends("admin.layout")

@section("title")
    الأعدادات
@endsection

@section("styles")
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("web/css/datatables/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("web/css/datatables/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("web/css/datatables/buttons.bootstrap4.min.css")}}">
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
                    <li class="breadcrumb-item active">الأعدادات</li>
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الصفحة الرئيسة</a></li>
                </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 text-end">
                  <h1 class="m-0">الأعدادات</h1>
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
                  <div id="liveToast" class="toast alert-danger show" role="alert" aria-live="assertive" aria-atomic="true" >
                    <div class="toast-header">
                      <strong class="me-auto">Errors</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" 
                      onclick="$(this).closest('.toast').toast('hide')"></button>
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
              {{-- footer table  --}}
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title float-end">جدول معلومات التواصل الاجتماعي</h3>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#addSetting" class="btn btn-info">إضافة عنصر جديد</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table dir="rtl" id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>التسلسل</th>
                          <th> الاسم</th>
                          <th>الايقونة</th>
                          <th>القيمة</th>
                          <th>اسم المستخدم</th>
                          <th>تاريخ الانشاء</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                              @foreach ($settings as $sett)
                                <tr>
                                  <td>{{$sett->id}}</td>
                                  <td>{{$sett->name}}</td>
                                  <td><i class="{{$sett->icon}} fa-3x"></i></td>
                                  <td>{{$sett->value}}</td>
                                  <td>{{$sett->userName}}</td>
                                  <td>{{$sett->created_at}}</td>
                                  <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSetting"class="btn-danger btn" title="delete" onclick="deleteItem({{$sett->id}})"><i class="fas fa-trash"></i></button>
                                    <button data-id="{{$sett->id}}"  data-value="{{$sett->value}}" 
                                      class="btn-info btn edit" title="edit" type="button" data-bs-toggle="modal" data-bs-target="#editSetting"><i class="fas fa-edit"></i></button>
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
              {{-- seo table  --}}
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title float-end">جدول سيو</h3>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#addSeo" class="btn btn-info">إضافة عنصر جديد</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table dir="rtl" id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>التسلسل</th>
                          <th>key</th>
                          <th> اسم الصفحة</th>
                          <th>keywords meta</th>
                          <th>description meta</th>
                          <th>اسم المستخدم</th>
                          <th>تاريخ الانشاء</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                              @foreach ($seo as $page)
                                <tr>
                                  <td>{{$page->id}}</td>
                                  <td>{{$page->key}}</td>
                                  <td>{{$page->title}}</td>
                                  <td>{{$page->keywords_meta}}</td>
                                  <td>{{$page->description_meta}}</td>
                                  <td>{{$page->userName}}</td>
                                  <td>{{$page->created_at}}</td>
                                  <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSeo"class="btn-danger btn" title="delete" onclick="deleteItemSeo({{$page->id}})"><i class="fas fa-trash"></i></button>
                                    <button 
                                      data-id="{{$page->id}}"  
                                      data-title="{{$page->title}}" 
                                      data-keywords="{{$page->keywords_meta}}" 
                                      data-description="{{$page->description_meta}}" 
                                      class="btn-info btn edit" id="editSeo" title="edit" type="button" data-bs-toggle="modal" data-bs-target="#editSeo"><i class="fas fa-edit"></i></button>
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
              {{-- home setting  table  --}}
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title float-end">جدول خاص بإعدادات الصفحة الرئيسية</h3>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#addHomeSetting" class="btn btn-info">إضافة عنصر جديد</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table dir="rtl" id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>التسلسل</th>
                          <th>Header title</th>
                          <th>Header image</th>
                          <th>Logo</th>
                          <th>shortcut icon</th>
                          <th>تاريخ الانشاء</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                              @foreach ($homeSettings as $page)
                                <tr>
                                  <td>{{$page->id}}</td>
                                  <td>{{$page->title}}</td>
                                  <td><img src="{{url("upload/{$page->image}")}}" class="img-fluid" style="width:80px;height:80px;object-fit:cover"></td>
                                  <td><img src="{{url("upload/{$page->logo}")}}" class="img-fluid" style="width:80px;height:80px;object-fit:cover"></td>
                                  <td><img src="{{url("upload/{$page->icon}")}}" class="img-fluid" style="width:80px;height:80px;object-fit:cover"></td>
                                  <td>{{$page->created_at}}</td>
                                  <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteHomeSetting"class="btn-danger btn" title="delete" onclick="deleteHomeSetting({{$page->id}})"><i class="fas fa-trash"></i></button>
                                    <button 
                                      data-id="{{$page->id}}"  
                                      data-title="{{$page->title}}" 
                                      data-image="{{url("upload/{$page->image}")}}" 
                                      data-logo="{{url("upload/{$page->logo}")}}" 
                                      data-icon="{{url("upload/{$page->icon}")}}" 
                                      class="btn-info btn edit" id="editSeo" title="edit" type="button" data-bs-toggle="modal" data-bs-target="#editHomeSetting"><i class="fas fa-edit"></i></button>
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
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @extends('admin.modal.modalSetting')


@section("scripts")
    <!-- DataTables  & Plugins -->
    <script src="{{asset("web/js/datatable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("web/js/datatable/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset('web/js/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('web/js/datatable/buttons.colVis.min.js')}}"></script>
    <script>
        $(document).ready( function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $("#example2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        } );
    </script>


    <script>
      // edit setting button ->  get old values 
      $('.edit').click(function(){
        let id = $(this).attr('data-id')
        let value = $(this).attr('data-value')
        $('#editSetting-form-id').val(id)
        $('#editSetting-form-value').val(value)
      })

      //delete item from setting table
      function deleteItem(id){
          document.getElementById('settingId').value = id
      }

      //delete item from seo table
      function deleteItemSeo(id){
        document.getElementById('seoId').value = id
      }

        //delete item from Home Setting table
      function deleteHomeSetting(id){
        document.getElementById('homeSettingId').value = id
      }

        // edit seo button ->  get old values 
        $('.edit').click(function(){
          let id = $(this).attr('data-id')
          let title = $(this).attr('data-title')
          let keywords = $(this).attr('data-keywords')
          let description = $(this).attr('data-description')

          $('#editSeo-form-id').val(id)
          $('#editSeo-form-title').val(title)
          $('#editSeo-form-keywords').val(keywords)
          $('#editSeo-form-description').val(description)
        })

        //edit home settig btn 
        $('.edit').click(function(){
          let id = $(this).attr('data-id')
          let title = $(this).attr('data-title')
          let image = $(this).attr('data-image')
          let logo = $(this).attr('data-logo')
          let icon = $(this).attr('data-icon')

          $('#editHomeSetting-form-id').val(id)
          $('#editHomeSetting-form-title').val(title)
          $('#editHomeSetting-form-image').attr('src',image)
          $('#editHomeSetting-form-logo').attr('src',logo)
          $('#editHomeSetting-form-icon').attr('src',icon)
        })
    </script>
@endsection
