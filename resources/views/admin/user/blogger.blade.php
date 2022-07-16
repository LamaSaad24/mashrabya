@extends("admin.layout")

@section("title")
    الكتاب
@endsection

@section("styles")
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("web/css/datatables/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("web/css/datatables/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("web/css/datatables/buttons.bootstrap4.min.css")}}">
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
                          <li class="breadcrumb-item active">الكتًاب</li>
                          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">الصفحة الرئيسة</a></li>
                      </ol>
                      </div><!-- /.col -->
                      <div class="col-sm-6 text-end">
                        <h1 class="m-0">الكتاب</h1>
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
                        <h3 class="card-title float-end">جدول الكتًاب</h3>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addBlogger" class="btn btn-info">إضافة عنصر جديد</button>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table dir="rtl" id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>التسلسل</th>
                              <th>الاسم</th>
                              <th>البريد الالكتروني</th>
                              <th>الحالة</th>
                              <th>تاريخ الانشاء</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                  @if ($user->active)
                                      <b>نشط</b>
                                  @else
                                      <b>غير نشط</b>
                                  @endif
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                  <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBlogger"class="btn-danger btn" title="delete" onclick="deleteUserItem({{$user->id}})"><i class="fas fa-trash"></i></button>
                                
                                  <button class="btn-info btn editBlogger" title="edit"  type="button" 
                                data-id="{{$user->id}}" 
                                data-name="{{$user->name}}" 
                                data-email="{{$user->email}}"  
                                data-password="{{$user->password}}"  
                                data-active="{{$user->active}}" 
                                  data-bs-toggle="modal" data-bs-target="#editBlogger"><i class="fas fa-pen"></i></button>
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

@extends('admin.modal.modalUser')

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
        $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });

      function deleteUserItem(id){
          document.getElementById('bloggerId').value = id
        }

         // edit main cat button ->  get old values 
        $('.editBlogger').click(function(){
        let id = $(this).attr('data-id')
        let name = $(this).attr('data-name')
        let email = $(this).attr('data-email')
        let password = $(this).attr("data-password")
        let active = $(this).attr("data-active")

        // console.log(id,name,image.active)
        $('#editBlogger-form-id').val(id)
        $('#editBlogger-form-name').val(name)
        $('#editBlogger-form-email').val(email)
        $('#editBlogger-form-password').val(password)
        $('#editBlogger-form-active').val(active)
        
        })
    </script>

@endsection