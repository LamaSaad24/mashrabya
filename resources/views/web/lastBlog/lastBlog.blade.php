@extends('web.layout')

@if (!empty($seo[0]->title))
    @section('title')  {{$seo[0]->title}}  @endsection
    @section('keywords') {{$seo[0]->keywords_meta}} @endsection
    @section('description')   {{$seo[0]->description_meta}} @endsection
@endif

@section('main')

{{-- @php
    
    echo '<pre>';
    echo print_r($lastBlogs); 
    echo '<pre/>';

@endphp --}}
    <main>
        <!--Start of bread_crumb-->
        <div class="bread_crumb pt-5">
            <div class="container ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> أحدث المقالات </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--End of bread_crumb-->
        <section class="blog my-5 py-3" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row py-2">
                        <h2 class="mb-4 text-primary">  أحدث المقالات </h2>
                        @if(!empty($lastBlogs))
                        @foreach ($lastBlogs as $lastBlog )
                        {{-- start item  --}}
                        <div class="col-md-4 my-2">
                            <div class="item">
                                <div class="item-img">
                                    <img src="{{asset("upload/{$lastBlog->image}")}}" class="w-100" alt="{{$lastBlog->image_meta}}"> 
                                    <p>
                                        {{$lastBlog->mainCat}}
                                        <i class="fas fa-arrow-left"></i>
                                        {{$lastBlog->subCat}}
                                    </p>
                                </div>
                                <div class="item-body py-3">
                                    <h3>{{$lastBlog->title}}</h3>
                                    <p>
                                        <span class="text-muted">كتب  :</span> 
                                        {{$lastBlog->userName}} 
                                        <i class="fas  fa-circle text-muted"></i>
                                        {{$lastBlog->created_at}}
                                    </p>
                                    <a href="{{url("type/blog/{$lastBlog->id}")}}" class="link">أقرأ أكثر</a>
                                </div>
                            </div>
                        </div>
                        {{-- end item  --}}
                        @endforeach
                        @else
                        <div class="container my-5">
                            <p class="alert alert-primary m-auto w-50 text-center">لايوجد مقالات جديدة اضغط للعودة <a href="/">للصفحة الرئيسية</a></p>
                        </div>
                        @endif
                </div>
            </div>
        </section>
    </main>
@endsection