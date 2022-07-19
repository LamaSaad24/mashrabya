@extends('web.layout')


@section('title')  {{$keyword}} @endsection
@section('keywords') {{$keyword}} @endsection
@section('description')   {{$keyword}} @endsection


@section('main')

    @if (!empty($blogs))
        <main>
            <!--Start of bread_crumb-->
            <div class="bread_crumb pt-5">
                <div class="container me-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{$keyword}} </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--End of bread_crumb-->
            <section class="blog my-5 py-3" id="blog">
                <div class="container">
                    <div class="row">
                        @if (!empty($blogs))
                        <div class="col  m-0 row py-2">
                            @foreach ( $blogs as $blog )
                            <div class="col-md-4 my-2">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="{{asset("upload/{$blog->image}")}}" class="w-100" alt="{{$blog->image_meta}}"> 
                                        <p>{{$blog->mainCat}} -> {{$blog->subCat}} </p>
                                    </div>
                                    <div class="item-body py-3">
                                        <h3>{{$blog->title}}</h3>
                                        <p>
                                            <span class="text-muted">كتب  : {{$blog->userName}}</span> 
                                            
                                            <i class="fas  fa-circle text-muted"></i>
                                            في تاريخ 
                                            {{$blog->created_at}}
                                        </p>
                                        <a href="{{url("type/blog/{$blog->id}")}}" class="link">أقرأ أكثر</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ( $bloggers_blogs as $blog )
                            <div class="col-md-4 my-2">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="{{asset("upload/{$blog->image}")}}" class="w-100" alt="{{$blog->image_meta}}"> 
                                        <p>{{$blog->mainCat}} -> {{$blog->subCat}} </p>
                                    </div>
                                    <div class="item-body py-3">
                                        <h3>{{$blog->title}}</h3>
                                        <p>
                                            <span class="text-muted">كتب  : {{$blog->userName}}</span> 
                                            
                                            <i class="fas  fa-circle text-muted"></i>
                                            في تاريخ 
                                            {{$blog->created_at}}
                                        </p>
                                        <a href="{{url("type/blog/{$blog->id}")}}" class="link">أقرأ أكثر</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="container my-5">
                            <p class="alert alert-primary m-auto w-50 text-center">لا يوجد مقالات اضغط للعودة <a href="/">للصفحة الرئيسية</a></p>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </main>            
    @else 
    <div class="container my-5">
        <p class="alert alert-primary m-auto w-50 text-center">لا يوجد نتائج قمت بالبحث عنها اضغط للعودة <a href="/">للصفحة الرئيسية</a></p>
    </div>
    @endif

    
@endsection
