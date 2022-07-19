
@extends('web.layout')

@if (!empty($blogs))
    @section('title')  {{$subCat[0]->name}}  @endsection
    @section('keywords') {{$subCat[0]->keywords_meta}} @endsection
    @section('description')   {{$subCat[0]->description_meta}} @endsection


    @section('main')

        {{-- @php
            echo '<pre>';
            echo print_r($blogs); 
            echo '<pre/>';
        @endphp --}}
        <main>
            <!--Start of bread_crumb-->
            <div class="bread_crumb pt-5">
                <div class="container me-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
                        @if (!empty($blogs))
                            <li class="breadcrumb-item"><a href="{{url("type/{$blogs[0]->mainCatId}")}}"> {{$blogs[0]->mainCat}}</a> </li>
                            <li class="breadcrumb-item active" aria-current="page"> {{$blogs[0]->subCat}} </li>
                        @endif
                        </ol>
                    </nav>
                </div>
            </div>
                <section class="blog my-5 py-3" id="blog">
                    <div class="container">
                        <div class="row">
                            <h2 class="mb-4 text-primary"> {{$blogs[0]->mainCat}}</h2>
                            <div class="col-md-8  m-0 row py-2">
                                @foreach ( $blogs as $blog )
                                <div class="col-md-4 my-2">
                                    <div class="item">
                                        <div class="item-img">
                                            <img src="{{asset("upload/{$blog->image}")}}" class="w-100" alt="{{$blog->image_meta}}"> 
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
                            <div class="col-md-4  py-2">
                                <!--start of recents post-->
                                <div class="recents-posts">
                                    <h3 class="text-capitalize text-right mb-4">
                                        أحدث المقالات
                                    </h3>
                                    <div class="recents-post">
                                        <div class="row ">
                                            @foreach ($lastBlogs as $lastBlog )
                                            {{-- start item  --}}
                                            <div class="col-md-6 ">
                                                <div class="recent-img">
                                                    <a href="#">
                                                        <img src="{{asset("upload/{$lastBlog->image}")}}" alt="{{$lastBlog->image_meta}}" class="img-fluid">
                                                    </a>
                                                    <div class="recent-overlay">
                                                        <a href="{{url("type/blog/{$lastBlog->id}")}}">أقرأ أكثر</a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6 text-right ">
                                                <div class="recent-post">
                                                    <a href="#">
                                                        <h2 class="pt-2">
                                                            {{$lastBlog->title}}
                                                        </h2>
                                                    </a>
                                                    
                                                    <div class="created-date">
                                                        <span>
                                                            كتبت
                                                            بتاريخ:
                                                            <span class="created-date">
                                                                {{$lastBlog->created_at}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  
                                            {{-- end item  --}}
                                            @endforeach
                                        </div>
                                    
                            
                                    </div>
                                </div>
                                <!--end of recents post-->
                            </div>
                        </div>
                    </div>
                </section>
        </main>
    @endsection



@else 
    @section('main')
        <div class="container my-5">
            <p class="alert alert-primary m-auto w-50 text-center">هذه الصفحة غير موجودة اضغط للعودة <a href="/">للصفحة الرئيسية</a></p>
        </div>
    @endsection
@endif