@extends('blogger.layout')


@section("title")
    الصفحة الرئيسية
@endsection


@section("main")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{url('blogger/dashboard')}}">الصفحة الرئيسة</a></li>
            </ol>
            </div><!-- /.col -->
            <div class="col-sm-6 text-end">
              <h1 class="m-0">الصفحة الرئيسية</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <a href="{{url('blogger/blog')}}">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1">
                    <i class="fas fa-blog"></i>
                  </span>
    
                  <div class="info-box-content text-black text-end">
                    <span class="info-box-text">المقالات</span>
                    <span class="info-box-number">
                      {{$blog[0]->count}}
                    </span>
                  </div>
                </div>
                </a>
                <!-- /.info-box-content -->
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
@endsection