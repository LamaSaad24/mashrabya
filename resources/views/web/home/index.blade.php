
@extends('web.layout')

@if (!empty($seo[0]->title))
    @section('title')  {{$seo[0]->title}}  @endsection
    @section('keywords') {{$seo[0]->keywords_meta}} @endsection
    @section('description')   {{$seo[0]->description_meta}} @endsection
@endif


@section('main')
    <!-- start header  -->
    <header id="home"
        @if (!empty($homeSettings))
            style="background-image:url({{url("upload/{$homeSettings[0]->image}")}})"
        @endif 
    >
        <div class="container">
            <div class="header-content">
                <h1 class="text-capitalize"> 
                    @if (!empty($homeSettings))
                        {{$homeSettings[0]->title}}
                    @endif
                </h1>
                <form action="{{url("search")}}"  method="POST">
                    @csrf
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="keyword" class="textarch-input" placeholder="ابحث هنا..." />
                </form>
                <div class="header-pointer"><span >|</span></div>
            </div>
        </div>
    </header>
    <!-- end header  -->

    <main>
        <section class="classification my-5 py-3" id="classification">
            <div class="container">
                <h2 class="text-center my-4">تصنيفات مشربية</h2>
                <div class="row">
                    @foreach ($mainCats as $mainCat )
                    {{-- start item --}}
                    <div class="col-lg-3 col-md-6 my-2">
                        <a href="{{url("type/{$mainCat->id}")}}">
                            <div class="item">
                                <h3>{{$mainCat->name}}</h3>
                                <div class="num-blog">
                                    {{$mainCat->total}}
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <img src="{{asset("upload/{$mainCat->image}")}}" class="w-100" alt="{{$mainCat->image_meta}}"/>   
                            </div>
                        </a>
                    </div>
                    {{-- end item --}}
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection