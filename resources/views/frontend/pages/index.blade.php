@extends('frontend.layouts.frontend-master')
@section('title', 'Online New Portal')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

            </div>
        </div>
    </div>

    <section class="themesBazar_section_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">


                                        @php
                                            $slider = App\Models\News::where('status', 1)
                                                ->where('show_at_slider', 1)
                                                ->latest()
                                                ->limit(10)
                                                ->get();
                                        @endphp

                                        @foreach ($slider as $news)
                                            <div class="owl-item cloned" style="width: 506.25px; margin-right: 20px;">
                                                <div class="secOne_newsContent">
                                                    <div class="sec-one-image">
                                                        <a
                                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                                        <h6 class="sec-small-cat">
                                                            <a href=" ">
                                                                {{-- 8 September 2022, 09:31 PM --}}
                                                                {{ $news->created_at->format('d F Y, h:m A') }}
                                                            </a>
                                                        </h6>
                                                        <h1 class="sec-one-title">
                                                            <a
                                                                href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                                                @if (session()->get('language') == 'english')
                                                                    {{ $news->title_en }}
                                                                @else
                                                                    {{ $news->title_bn }}
                                                                @endif
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>

                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                            class="fa-solid fa-angle-left"></i></button>
                                    <button type="button" role="presentation" class="owl-next"><i
                                            class="fa-solid fa-angle-right"></i></button>
                                </div>
                                <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                        role="button" class="owl-dot active"><span></span></button><button role="button"
                                        class="owl-dot"><span></span></button></div>
                            </div>


                        </div>
                        <div class="col-lg-5 col-md-5">

                            @php
                                $threenews = App\Models\News::where('status', 1)
                                    ->where('show_at_three', 1)
                                    ->inRandomOrder()
                                    ->limit(3)
                                    ->get();
                            @endphp

                            @foreach ($threenews as $news)
                                <div class="secOne-smallItem">
                                    <div class="secOne-smallImg">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                        <h5 class="secOne_smallTitle">
                                            <a
                                                href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                                @if (session()->get('language') == 'english')
                                                    {{ Str::limit($news->title_en, '30', '...') }}
                                                @else
                                                    {{ Str::limit($news->title_bn, '30', '...') }}
                                                @endif
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>


                    @php
                        $ninenews = App\Models\News::where('status', 1)
                            ->where('show_at_nine', 1)
                            ->latest()
                            ->limit(12)
                            ->get();
                    @endphp

                    <div class="sec-one-item2">
                        <div class="row">
                            @foreach ($ninenews as $news)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="sec-one-wrpp2">
                                        <div class="secOne-news">
                                            <div class="secOne-image2">
                                                <a
                                                    href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                                        class="lazyload" src="{{ asset($news->image) }}"></a>
                                            </div>
                                            <h4 class="secOne-title2">
                                                <a
                                                    href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                                    @if (session()->get('language') == 'english')
                                                        {{ Str::limit($news->title_en, '50', '...') }}
                                                    @else
                                                        {{ Str::limit($news->title_bn, '50', '...') }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="cat-meta">
                                            <a
                                                href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                                <i class="lar la-newspaper"></i>
                                                {{-- 8 September 2022 --}}
                                                @if (session()->get('language') == 'english')
                                                    <span>{{ $news->created_at->format('d F Y') }}</span>
                                                @else
                                                    <span>{{ $news->created_at->diffForHumans() }}</span>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    @include('frontend.layouts.partials.live-tv')

                    @include('frontend.layouts.partials.old-news')

                    @include('frontend.layouts.partials.latest-popular-news')

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->one) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->two) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="categori-tab1" data-bs-toggle="pill"
                                        data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1"
                                        aria-selected="true">
                                        @if (session()->get('language') == 'english')
                                            ALL
                                        @else
                                            সব
                                        @endif


                                    </div>
                                </li>
                                @foreach ($allcategory as $category)
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" id="categori-tab2" data-bs-toggle="pill"
                                            data-bs-target="#category-{{ $category->id }}" role="tab"
                                            aria-controls="Info-tabs2" aria-selected="false">
                                            @if (session()->get('language') == 'english')
                                                {{ $category->category_name_en }}
                                            @else
                                                {{ $category->category_name_bn }}
                                            @endif
                                        </div>
                                    </li>
                                @endforeach

                                <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="Info-tabs1" role="tabpanel"
                                aria-labelledby="categori-tab1 ">
                                <div class="row">
                                    @foreach ($alltabnews as $news)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">

                                                    <a href=" "><img class="lazyload"
                                                            src="{{ asset($news->image) }}"></a>
                                                </div>
                                                <h5 class="sec-two-title">

                                                    @if (session()->get('language') == 'english')
                                                        <a
                                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '35', '...') }}</a>
                                                    @else
                                                        <a
                                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">{{ Str::limit($news->title_bn, '35', '...') }}</a>
                                                    @endif

                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            @foreach ($allcategory as $category)
                                <div class="tab-pane fade" id="category-{{ $category->id }}" role="tabpanel"
                                    aria-labelledby="categori-tab2">
                                    <div class="row">
                                        @php
                                            $catposts = App\Models\News::where('status', 1)
                                                ->where('category_id', $category->id)
                                                ->inRandomOrder()
                                                ->latest()
                                                ->take(8)
                                                ->get();
                                        @endphp

                                        @foreach ($catposts as $news)
                                            <div class="themesBazar-4 themesBazar-m2">
                                                <div class="sec-two-wrpp">
                                                    <div class="section-two-image">

                                                        <a href=" "><img class="lazyload"
                                                                src="{{ asset($news->image) }}"></a>
                                                    </div>
                                                    <h5 class="sec-two-title">

                                                        @if (session()->get('language') == 'english')
                                                            <a
                                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '35', '...') }}</a>
                                                        @else
                                                            <a
                                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">{{ Str::limit($news->title_bn, '35', '...') }}</a>
                                                        @endif

                                                    </h5>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->three) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->four) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <h2 class="themesBazar_cat07">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('category.news.page', ['id' => $catone->id, 'slug' => $catone->category_slug_en]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catone->category_name_en }}
                            </a>
                        @else
                            <a
                                href="{{ route('category.news.page', ['id' => $catone->id, 'slug' => $catone->category_slug_bn]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catone->category_name_bn }}
                            </a>
                        @endif
                    </h2>



                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            @foreach ($catonenewsone as $news)
                                <div class="secThree-bg">
                                    <div class="sec-theee-image">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} "><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                    </div>
                                    <h4 class="secThree-title">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                            @if (session()->get('language') == 'english')
                                                {{ Str::limit($news->title_en, '45', '...') }}
                                            @else
                                                {{ Str::limit($news->title_bn, '45', '...') }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                            @endforeach

                            <div class="row">
                                @foreach ($catonenewstwo as $news)
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="secThree-wrpp">
                                            <div class="sec-theee-image2">
                                                <a
                                                    href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} "><img
                                                        class="lazyload" src="{{ asset($news->image) }}"></a>
                                            </div>
                                            <h4 class="secThree-title2">
                                                <a
                                                    href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                                    @if (session()->get('language') == 'english')
                                                        {{ Str::limit($news->title_en, '30', '...') }}
                                                    @else
                                                        {{ Str::limit($news->title_bn, '30', '...') }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="bg2">
                                @foreach ($catonenewsfive as $news)
                                    <div class="secThree-smallItem">
                                        <div class="secThree-smallImg">
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"
                                                    style="height: 80px;"></a>
                                            <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"
                                                class="small-icon3"><i class="la la-play"></i></a>
                                            <h5 class="secOne_smallTitle">
                                                <a
                                                    href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                                    @if (session()->get('language') == 'english')
                                                        {{ Str::limit($news->title_en, '40', '...') }}
                                                    @else
                                                        {{ Str::limit($news->title_bn, '40', '...') }}
                                                    @endif
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat07">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonename->id, 'slug' => $subcatonename->subcategory_slug_en]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonename->subcategory_name_en }}
                            </a>
                        @else
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonename->id, 'slug' => $subcatonename->subcategory_slug_bn]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonename->subcategory_name_bn }}
                            </a>
                        @endif

                    </h2>

                    <div class="map-area" style="width:100%; background: #eff3f4;">
                        <div style="padding:5px 35px 0px 35px;">
                            @foreach ($subcatsixone as $news)
                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                    <img class="lazyload" src="{{ asset($news->image) }}">
                                </a>
                            @endforeach
                            <br> <br>
                            @foreach ($subcatsixtwo as $news)
                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">
                                    <img class="lazyload" src="{{ asset($news->image) }}">
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->five) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->seven) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->eight) }}" alt="" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_en]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $cattwo->category_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $cattwo->category_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif


                    </h2>

                    <div class="white-bg">

                        @foreach ($cattwoone as $news)
                            <div class="secFive-image">
                                <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                        class="lazyload" src="{{ asset($news->image) }}"></a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                    @endif

                                </div>
                            </div>
                        @endforeach

                        @foreach ($cattwotwo as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                    <h5 class="secFive_title2">
                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('category.news.page', ['id' => $catthree->id, 'slug' => $catthree->category_slug_en]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catthree->category_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('category.news.page', ['id' => $catthree->id, 'slug' => $catthree->category_slug_bn]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catthree->category_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif


                    </h2>

                    <div class="white-bg">

                        @foreach ($catthreeone as $news)
                            <div class="secFive-image">
                                <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                        class="lazyload" src="{{ asset($news->image) }}"></a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                    @endif

                                </div>
                            </div>
                        @endforeach


                        @foreach ($catthreetwo as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                    <h5 class="secFive_title2">

                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                        @endif


                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('category.news.page', ['id' => $catfour->id, 'slug' => $catfour->category_slug_en]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catfour->category_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('category.news.page', ['id' => $catfour->id, 'slug' => $catfour->category_slug_bn]) }}">
                                <i class="las la-align-justify"></i>


                                {{ $catfour->category_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif


                    </h2>

                    <div class="white-bg">

                        @foreach ($catfourone as $news)
                            <div class="secFive-image">
                                <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                        class="lazyload" src="{{ asset($news->image) }}"></a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                    @endif

                                </div>
                            </div>
                        @endforeach


                        @foreach ($catfourtwo as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a
                                        href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                    <h5 class="secFive_title2">

                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '30', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '30', '...') }}</a>
                                        @endif


                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->nine) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->ten) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-five">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenameseven->id, 'slug' => $subcatonenameseven->subcategory_slug_en]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenameseven->subcategory_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenameseven->id, 'slug' => $subcatonenameseven->subcategory_slug_bn]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenameseven->subcategory_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif
                    </h2>

                    <div class="white-bg">
                        @foreach ($subcatsevenone as $news)
                            <div class="secFive-image">
                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                    <img class="lazyload" src="{{ asset($news->image) }}">
                                </a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '45', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '45', '...') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @foreach ($subcatseventhree as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                        <img class="lazyload" src="{{ asset($news->image) }}">
                                    </a>
                                    <h5 class="secFive_title2">
                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '50', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '50', '...') }}</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenameeight->id, 'slug' => $subcatonenameeight->subcategory_slug_en]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenameeight->subcategory_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenameeight->id, 'slug' => $subcatonenameeight->subcategory_slug_bn]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenameeight->subcategory_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif
                    </h2>

                    <div class="white-bg">
                        @foreach ($subcateightone as $news)
                            <div class="secFive-image">
                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                    <img class="lazyload" src="{{ asset($news->image) }}">
                                </a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '45', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '45', '...') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @foreach ($subcateightthree as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                        <img class="lazyload" src="{{ asset($news->image) }}">
                                    </a>
                                    <h5 class="secFive_title2">
                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '50', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '50', '...') }}</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h2 class="themesBazar_cat01">
                        @if (session()->get('language') == 'english')
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenamenine->id, 'slug' => $subcatonenamenine->subcategory_slug_en]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenamenine->subcategory_name_en }}
                            </a>
                            <span>
                                <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                        @else
                            <a
                                href="{{ route('subcategory.news.page', ['id' => $subcatonenamenine->id, 'slug' => $subcatonenamenine->subcategory_slug_bn]) }}">
                                <i class="las la-align-justify"></i>
                                {{ $subcatonenamenine->subcategory_name_bn }}
                            </a>
                            <span>
                                <a
                                    href="{{ route('category.news.page', ['id' => $cattwo->id, 'slug' => $cattwo->category_slug_bn]) }}">
                                    More <i class="las la-arrow-circle-right"></i> </a></span>
                        @endif
                    </h2>

                    <div class="white-bg">
                        @foreach ($subcatnineone as $news)
                            <div class="secFive-image">
                                <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                    <img class="lazyload" src="{{ asset($news->image) }}">
                                </a>
                                <div class="secFive-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '45', '...') }}</a>
                                    @else
                                        <a
                                            href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '45', '...') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @foreach ($subcatninethree as $news)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                        <img class="lazyload" src="{{ asset($news->image) }}">
                                    </a>
                                    <h5 class="secFive_title2">
                                        @if (session()->get('language') == 'english')
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_en, '50', '...') }}</a>
                                        @else
                                            <a
                                                href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">{{ Str::limit($news->title_bn, '50', '...') }}</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->one) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->two) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-seven">
        <div class="container">

            <h2 class="themesBazar_cat01">
                @if (session()->get('language') == 'english')
                    <a
                        href="{{ route('category.news.page', ['id' => $categoryfive->id, 'slug' => $categoryfive->category_slug_en]) }}">
                        <i class="las la-align-justify"></i>


                        {{ $categoryfive->category_name_en }}
                    </a>
                    <span>
                        <a href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                @else
                    <a
                        href="{{ route('category.news.page', ['id' => $categoryfive->id, 'slug' => $categoryfive->category_slug_bn]) }}">
                        <i class="las la-align-justify"></i>


                        {{ $categoryfive->category_name_bn }}
                    </a>
                    <span>
                        <a
                            href="{{ route('category.news.page', ['id' => $categoryfive->id, 'slug' => $categoryfive->category_slug_bn]) }}">
                            More <i class="las la-arrow-circle-right"></i> </a></span>
                @endif

            </h2>

            <div class="secSecven-color">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        @foreach ($catfiveone as $news)
                            <div class="black-bg">
                                <div class="secSeven-image">
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                        <img class="lazyload" src="{{ asset($news->image) }}">
                                    </a>
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"
                                        class="video-icon6"><i class="la la-play"></i></a>
                                </div>
                                <h6 class="secSeven-title">
                                    @if (session()->get('language') == 'english')
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                            {{ Str::limit($news->title_en, '35', '...') }}
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">
                                            {{ Str::limit($news->title_bn, '35', '...') }}</a>
                                    @endif

                                </h6>

                                @if (session()->get('language') == 'english')
                                    <div class="secSeven-details">
                                        {!! Str::limit(strip_tags($news->details_en), '250', '') !!}
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                            More..</a>
                                    </div>
                                @else
                                    <div class="secSeven-details">
                                        {!! Str::limit(strip_tags($news->details_bn), '250', '') !!}
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }} ">
                                            More..</a>
                                    </div>
                                @endif


                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-7 col-md-7">
                        <div class="row">
                            @foreach ($catfivefour as $news)
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" ">
                                                <img class="lazyload" src="{{ asset($news->image) }}">
                                            </a>

                                            <h5 class="secSeven-title2">
                                                @if (session()->get('language') == 'english')
                                                    <a
                                                        href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                                                        {{ Str::limit($news->title_en, '35', '...') }}
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">
                                                        {{ Str::limit($news->title_bn, '35', '...') }}</a>
                                                @endif

                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->three) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($ads->four) }}" alt=""
                                width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-ten">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-camera"></i> PHOTO
                            GALLERY </a></h2>

                    <div class="homeGallery owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">
                                @foreach ($photogallery as $photo)
                                    <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="photo">
                                                <a class="themeGallery" href="{{ asset($photo->image) }}">
                                                    <img src="{{ asset($photo->image) }}" alt="PHOTO"></a>
                                                <h3 class="photoCaption">
                                                    <a href="javascript::vodi(0);">PHOTO GALLARY {{ $loop->index + 1 }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="las la-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> VIDEO
                            GALLERY </a></h2>

                    <div class="white-bg">
                        @foreach ($videogallery as $video)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <img src="{{ asset($video->image) }}">
                                    <a href="{{ $video->link }}" class="home-video-icon popup"><i
                                            class="las la-video"></i></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ $video->link }}" class="popup">
                                            @if (session()->get('language') == 'english')
                                                {{ Str::limit($video->title_en, '35', '...') }}
                                            @else
                                                {{ Str::limit($video->title_bn, '35', '...') }}
                                            @endif
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
