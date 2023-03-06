@extends('website.layout.layout')

@section('body')
        <!-- Top News Slider Start -->
        <div class="container-fluid py-3">
            <div class="container">
                <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                    @foreach ($lastFivePosts as $post)
                    <div class="d-flex">
                        <img src="{{asset($post->image)}}" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                            <a class="text-secondary font-weight-semi-bold" href="{{route('post', $post->id)}}">{{$post->title}}</a>
                        </div>
                    </div> 
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Top News Slider End -->
    
    
        <!-- Main News Slider Start -->
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                            @foreach ($lastFivePosts as $post)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100" src="{{asset($post->image)}}" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="{{route('category', $post->category->id)}}">{{$post->category->title}}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{$post->created_at->format('Y-m-d')}}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold" href="{{route('post', $post->id)}}">{{$post->title}}</a>
                                </div>
                            </div>
                            @endforeach
                         
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{__('words.categories')}}</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                        
                        @foreach ($categories as $category)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100" src="{{asset($category->image)}}" style="object-fit: cover;">
                            <a href="{{route('category', $category->id)}}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                {{$category->title}}
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News Slider End -->
    
    
        <!-- Featured News Slider Start -->
        {{-- <div class="container-fluid py-3">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Featured</h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="img/news-300x300-1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="img/news-300x300-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="img/news-300x300-3.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="img/news-300x300-4.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="img/news-300x300-5.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Featured News Slider End -->
    
    
        <!-- Category News Slider Start -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @foreach ($categories_with_posts as $category)
                    @if (count($category->posts) > 0)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{$category->title}}</h3>
                        </div>
                        <div class="owl-carousel owl-carousel-3 @if(count($category->posts) > 1) carousel-item-2 @else carousel-item-1 @endif position-relative">
                            @foreach ($category->posts as $post)
                                 
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset($post->image)}}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{$post->created_at->format('Y-m-d')}}</span>
                                    </div>
                                    <a class="h4 m-0" href="{{route('post', $post->id)}}">{{$post->title}}</a>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    @endif
                    
                    @endforeach
                    
                </div>
            </div>
        </div>
        </div>
        <!-- Category News Slider End -->
    
    
        
    
@endsection