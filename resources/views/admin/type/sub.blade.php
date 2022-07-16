@extends("admin.layout")

@section("title")
    العناوين الفرعية
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
                    <li class="breadcrumb-item active">العناوين الفرعية</li>
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الصفحة الرئيسة</a></li>
                </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 text-end">
                  <h1 class="m-0">العناوين الفرعية</h1>
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
                      <h3 class="card-title float-end">جدول العناوين الفرعية</h3>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#addSubCat" class="btn btn-info">إضافة عنصر جديد</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table dir="rtl" id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>التسلسل</th>
                          <th>الاسم</th>
                          <th>الصورة</th>
                          <th>النص التعريفي للصورة</th>
                          <th>keywords</th>
                          <th>description</th>
                          <th>الحالة</th>
                          <th> العنوان الرئيسي</th>
                          <th>اسم المستخدم</th>
                          <th>تاريخ الانشاء</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($subCats as $cat)
                            <tr>
                              <td>{{$cat->id}}</td>
                              <td>{{$cat->name}}</td>
                              <td><img src="{{url("upload/{$cat->image}")}}" class="img-fluid" style="width:80px;height:80px;object-fit:cover" alt="{{$cat->image_meta}}"></td>
                              <td>{{$cat->image_meta}}</td>
                              <td>{{$cat->keywords_meta}}</td>
                              <td>{{$cat->description_meta}}</td>
                              <td>
                                  @if ($cat->active)
                                      <b>فعالة</b>
                                  @else
                                      <b>غير فعالة</b>
                                  @endif
                              </td>
                              <td>{{$cat->mainCat}}</td>
                              <td>{{$cat->userName}}</td>
                              <td>{{$cat->created_at}}</td>
                              <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSubCat"class="btn-danger btn" title="delete" onclick="deleteSubItem({{$cat->id}})"><i class="fas fa-trash"></i></button>
                                <button class="btn-info btn edit" title="edit"  type="button" 
                                data-id="{{$cat->id}}" 
                                data-name="{{$cat->name}}" 
                                data-image="{{url("upload/{$cat->image}")}}"  
                                data-active="{{$cat->active}}" 
                                data-mainCat="{{$cat->mainCatId}}" 
                                data-image_meta="{{$cat->image_meta}}"  
                                data-keywords="{{$cat->keywords_meta}}"  
                                data-description="{{$cat->description_meta}}" 
                                data-bs-toggle="modal" data-bs-target="#editSubCat"><i class="fas fa-pen"></i></button>
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
@endsection


@extends('admin.modal.modal')

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
        // edit main cat button ->  get old values 
        $('.edit').click(function(){
      let id = $(this).attr('data-id')
      let name = $(this).attr('data-name')
      let image = $(this).attr('data-image')
      let active = $(this).attr('data-active')
      let mainCat = $(this).attr('data-mainCat')
      let image_meta = $(this).attr('data-image_meta')
      let keywords = $(this).attr('data-keywords')
      let description = $(this).attr('data-description')

      console.log(id,name,image.active)
      $('#editSubCat-form-id').val(id)
      $('#editSubCat-form-name').val(name)
      $('#editSubCat-form-active').val(active)
      $('#editSubCat-form-mainCat').val(mainCat)
      $('#editSubCat-form-image').attr('src',image)
      $('#editSubCat-form-keywords').val(keywords)
      $('#editSubCat-form-description').val(description)
      $('#editSubCat-form-image_meta').val(image_meta)
      })
        $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
      function deleteSubItem(id){
          document.getElementById('subId').value = id
        }

    </script>

@endsection