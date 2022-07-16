@extends('web.layout')

@if (!empty($blog))

    @section('title')  {{$blog[0]->title}}  @endsection
    @section('keywords') {{$blog[0]->keywords_meta}} @endsection
    @section('description')   {{$blog[0]->description_meta}} @endsection

    @section('styles') 
            <!-- import slick slider  -->
            <link rel="stylesheet" href="{{asset('web/css/slick/slick.css')}}">
            <link rel="stylesheet" href="{{asset('web/css/slick/slick-theme.css')}}">
    @endsection


    @section('main')

            <!--Start of main section-->
            <main>
                <!--Start of bread_crumb-->
                <div class="bread_crumb pt-5">
                    <div class="container ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{url("type/{$blog[0]->main_cat_id}")}}">{{$blog[0]->mainCat}}</a></li>
                            <li class="breadcrumb-item"><a href="{{url("type/subCat/{$blog[0]->sub_cat_id}")}}">  {{$blog[0]->subCat}} </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> {{$blog[0]->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--End of bread_crumb-->
                <!--Start of Article-->
                <section class="article">
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
                        <div class="article-content mt-5">
                            <div class="article-header">
                                <div class="row">
                                    <div class="col-md-7 mt-4 offset-md-1">
                                        <img src="{{asset("upload/{$blog[0]->image}")}}" alt="{{$blog[0]->image_meta}}" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 mt-4 d-flex ">
                                        <div class="content-list text-right pb-3 pr-3">
                                            <h4>محتوى المقالة :</h4>

                                                @php
                                                    $headingtag = 'h2';

                                                    $html =$blog[0]->content;


                                                    preg_match_all('|<'.$headingtag.' (.*)>(.*)</'.$headingtag.'>|iU', $html, $headings );
                                                @endphp
                                            <ol>
                                                @foreach ( $headings[0] as $cont )
                                                    <li>
                                                        @php
                                                            echo htmlspecialchars_decode($cont)
                                                        @endphp 
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                
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
                                                                    كُتب 
                                                                    {{$lastBlog->userName}}
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
                        </div>
                    </div>
                </section>
                @if (!empty($relatedBlogs))
                    <!--start of post-related-->
                    <section class="related-section mt-5">
                        <div class="related-title text-center">
                            <h3 class="mt-4">مواضيع ذات صلة</h3>
                        </div>
                        <div class="container ">
                            <div class="my-5 related-section-content" dir="ltr">
                            @foreach ($relatedBlogs as $relBlog )
                                <div class="related-thumb ">
                                    <a href="{{url("type/blog/{$relBlog->id}")}}">
                                        <div class="thumb-img position-relative">
                                                    <img src="{{asset("upload/{$relBlog->image}")}}" class="d-block img-fluid" alt="{{$relBlog->image_meta}}">
                                                </div>
                                                <div class="thumb-content  text-center">
                                                    <div>
                                                        <a href="">
                                                            <h2 class="pt-1"> {{$relBlog->title}} </h2>
                                                        </a>
                                                        <span class="created-date">{{$relBlog->created_at}}</span>
                                                    </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!--end of post-related-->
                @endif
            </main>
            <!--End of main section-->
                
            
            @endsection
            
            @section('scripts')
            <!-- import slick slider  -->
            <script src="{{asset('web/js/slick/slick.min.js')}}"></script>
            <script>
                $('.related-section-content').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 3,
                infinite: true,
                // speed: 600,
                // autoplay: true,
                responsive: [
                    {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
                });
        </script>
    @endsection

@else
    @section('main')
    <div class="container my-5">
        <p class="alert alert-primary m-auto w-50 text-center">هذه الصفحة غير موجودة اضغط للعودة <a href="/">للصفحة الرئيسية</a></p>
    </div>
    @endsection
@endif