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
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> بيانات هذه المقالة</li>
                            <li class="breadcrumb-item"><a href="{{url('admin/bloggers_blogs')}}">المقالات </a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الصفحة الرئيسة</a></li>
                        </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-end">
                        <h1 class="m-0">عرض</h1>
                        </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content" >
            <div class="container">
            <!--Start of bread_crumb-->
            <div class="bread_crumb  pt-5">
                <div class="container ">
                    <nav  aria-label="breadcrumb">
                        <ol class="breadcrumb ms-auto">
                          <li class="breadcrumb-item active" aria-current="page"> {{$blog[0]->title}}</li>
                          <li class="breadcrumb-item"><a>  {{$blog[0]->subCat}} </a></li>
                          <li class="breadcrumb-item"><a>{{$blog[0]->mainCat}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/bloggers_blogs')}}">الصفحة الرئيسية</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--End of bread_crumb-->
            <!--Start of Article-->
            <section class="article" dir="rtl">
                <div class="container">
                    <!--Start of Article Title-->
                    <div class="article-title text-center">
                        <h2>{{$blog[0]->title}}</h2>
                        <div class="created">
                            <span class="created-by">كُتبت بواسطة :  {{$blog[0]->userName}}  </span>
                            <span class=" px-3">|</span>
                            <span class="created-date">التاريخ : {{$blog[0]->created_at}}</span>
                        </div>
                        <!-- start  -->
                        <ul class="list-inline my-3 text-end">
                            @php
                                $tags = explode(",",$blog[0]->tags);
                            @endphp
                            @foreach ( $tags as $tag )
                                    <li class="list-inline-item btn-primary p-1 mb-1 me-0 rounded-3">
                                        <span class="text-decoration-none text-white">
                                            {{$tag}}                      
                                        </span>
                                    </li>
                            @endforeach
                        </ul>
                        <!-- end -->
                    </div>
                    <!--End of Article Title-->
                    <!--start of article content-->
                    <div class="article-content my-5">
                        <div class="article-header">
                            <div class="row">
                                <div class="col-md-7 mt-4 offset-md-1">
                                    <img src="{{asset("upload/{$blog[0]->image}")}}" alt="{{$blog[0]->image_meta}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="article-body mt-5 ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="article-content text-right ">
                                        @php
                                            echo htmlspecialchars_decode($blog[0]->content)
                                        @endphp 
                                    </div>
                            
                                </div>
                                <!--end of article content-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
