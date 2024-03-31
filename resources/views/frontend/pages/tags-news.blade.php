@extends('frontend.layouts.frontend-master')
@section('title', 'category name')
@section('main')
    <div class="archive-page1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="archive-topAdd"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="rachive-info-cats">
                        <a href=" "><i class="las la-home"></i> </a>
                        <i class="las la-chevron-right"></i>
                        {{-- @if (session()->get('language') == 'english')
                           
                        @else
                            {{ $tag }}
                        @endif --}}
                        {{ $tag }}
                    </div>
        

                    <div class="row">
                        @foreach ($tagnews as $news)
                            <div class="archive1-custom-col-3">
                                <div class="archive-item-wrpp2">
                                    <div class="archive-shadow arch_margin">
                                        <div class="archive1_image2">
                                            <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img class="lazyload" src="{{ asset($news->image) }}" /></a>
                                            <div class="archive1-meta">
                                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} "><i class="la la-tags"> </i>
                                                    {{ $news->created_at->format('l, jS F Y') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="archive1-padding">
                                            <div class="archive1-title2">
                                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                                    @if (session()->get('language') == 'english')
                                                        {{ Str::limit(strip_tags($news->title_en), '40') }}
                                                    @else
                                                        {{ Str::limit(strip_tags($news->title_bn), '40') }}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="archive1-margin">
                        <div class="archive-content">
                            <div class="row"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                  
                          
                        </div>
                    </div>

                    <br /><br />

                    <div class="row">
                        <div class="col-lg-12 col-md-12"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    @include('frontend.layouts.partials.latest-popular-news')
                </div>
            </div>
        </div>
    </div>
@endsection
