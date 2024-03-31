@extends('frontend.layouts.frontend-master')
@section('title', $news->slug_en)
@section('main')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <section class="single-page">


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <div class="single-add">
                    </div>

                    <div class="single-cat-info">
                        <div class="single-home">
                            <i class="la la-home"> </i><a href="{{ route('home.index') }}"> HOME </a>
                        </div>
                        <div class="single-cats">
                            <i class="la la-bars"></i>


                            @if (session()->get('language') == 'english')
                                <a href="{{ route('category.news.page', ['id' => $news->categories->id, 'slug' => $news->categories->category_slug_en]) }}"
                                    rel="category tag">
                                    {{ ucfirst($news->categories->category_name_en) }}
                                </a>
                            @else
                                <a href="{{ route('category.news.page', ['id' => $news->categories->id, 'slug' => $news->categories->category_slug_bn]) }}"
                                    rel="category tag">
                                    {{ ucfirst($news->categories->category_name_bn) }}
                                </a>
                            @endif
                            @if ($news->subcategory_id)


                                @if (session()->get('language') == 'english')
                                    ,<a href="{{ route('subcategory.news.page', ['id' => $news->subcategories, 'slug' => $news->subcategories->subcategory_slug_en]) }}"
                                        rel="category tag">
                                        {{ ucfirst($news->subcategories->subcategory_name_en) }}

                                    </a>
                                @else
                                    ,<a href="{{ route('subcategory.news.page', ['id' => $news->subcategories, 'slug' => $news->subcategories->subcategory_slug_bn]) }}"
                                        rel="category tag">
                                        {{ ucfirst($news->subcategories->subcategory_name_bn) }}

                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>
                    <h5 class="single-page-subTitle">

                        @if (session()->get('language') == 'english')
                            {{ $news->title_en }}
                        @else
                            {{ $news->title_bn }}
                        @endif
                    </h5>
                    <h1 class="single-page-title">

                        @if (session()->get('language') == 'english')
                            {{ $news->title_en }}
                        @else
                            {{ $news->title_bn }}
                        @endif
                    </h1>
                    <div class="row g-2">
                        <div class="col-lg-1 col-md-2 ">
                            <div class="reportar-image">
                                @if ($news->users->image)
                                    <img src="{{ asset($news->users->image) }}">
                                @else
                                    <img src="{{ asset('upload/no_image.jpg') }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-10">
                            <div class="reportar-title">
                                <a href="{{ route('author.news', ['id' => $news->users->id, 'name' => $news->users->name]) }}"
                                    class=" text-decoration-none">
                                    {{ $news->users->name }}

                                </a>
                            </div>
                            <div class="viwe-count">
                                <ul>
                                    <li><i class="la la-clock-o"></i>
                                        @if ($news->created_at)
                                            Updated
                                            {{-- Saturday, 10th September 2022 --}}
                                            {{ $news->created_at->format('F, jS l Y') }}
                                        @else
                                            {{ $news->updated_at > format('F, jS l Y') }}
                                        @endif
                                    </li>
                                    <li> / <i class="la la-eye"></i>
                                        {{ $news->views }}
                                        Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="single-image">
                        <a href=" "><img class="lazyload" src="{{ asset($news->image) }}"
                                style="max-height: 500px;height:500px;"></a>
                        <h2 class="single-caption2">

                            @if (session()->get('language') == 'english')
                                {{ $news->title_en }}
                            @else
                                {{ $news->title_bn }}
                            @endif
                        </h2>
                    </div>

                    <div class="single-page-add2">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                        src="{{ asset($ads->one) }}" alt="" width="100%" height="auto"></p>
                            </div>
                        </div>
                    </div>
                    <div class="single-details">
                        <p>

                            @if (session()->get('language') == 'english')
                                {!! $news->details_en !!}
                            @else
                                {!! $news->details_bn !!}
                            @endif
                        </p>
                    </div>
                    <div class="singlePage2-tag">
                        <span> Tags : </span>



                        @if (session()->get('language') == 'english')
                            @if ($news->tags_en)
                                @foreach ($alltagsen as $tag)
                                    <a href="{{ route('tags.news.page', ['tag' => $tag]) }}"
                                        rel="tag">{{ $tag }}</a>
                                @endforeach
                            @endif
                        @else
                            @if ($news->tags_bn)
                                @foreach ($alltagsbn as $tag)
                                    <a href="{{ route('tags.news.page', ['tag' => $tag]) }}"
                                        rel="tag">{{ $tag }}</a>
                                @endforeach
                            @endif
                        @endif




                    </div>

                    <div class="single-add">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                        src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                            </div>
                        </div>
                    </div>

                    <h3 class="single-social-title">
                        Share News </h3>
                    <div class="single-page-social">
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>


                    @php
                        $allcomment = App\Models\Comment::with('users')
                            ->where('news_id', $news->id)
                            ->latest()
                            ->get();
                    @endphp

                    @foreach ($allcomment as $comment)
                        <div class="author2">
                            <div class="author-content2">
                                <h6 class="author-caption2">
                                    <span> {{ $comment->created_at->format('l jS F Y') }} <span
                                            class=" text-warning">({{ $comment->created_at->diffForHumans() }})</span>
                                    </span>
                                </h6>
                                <div class="author-image2">
                                    @if ($comment->users->image)
                                        <img alt="" src="{{ asset($comment->users->image) }}"
                                            class="avatar avatar-96 photo" height="96" width="96" loading="lazy">
                                    @else
                                        <img alt="" src="{{ asset('upload/no_image.jpg') }}"
                                            class="avatar avatar-96 photo" height="96" width="96" loading="lazy">
                                    @endif

                                </div>
                                <div class="authorContent">
                                    <h1 class="author-name2">
                                        <a href=" "> {{ $comment->users->name }} </a>
                                    </h1>
                                    <div class="author-details">I{{ $comment->comment }}</div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                    <hr>

                    <form action="{{ route('store.comment') }}" method="post" class="wpcf7-form init"
                        enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                        @method('POST')
                        @csrf
                        <div style="display: none;">

                        </div>
                        <input type="hidden" name="news_id" value="{{ $news->id }}">
                        <div class="main_section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-title">
                                        <label for="comment"> Comments <span class=" text-danger">*</span></label>
                                    </div>
                                    <div class="contact-form">
                                        <span class="wpcf7-form-control-wrap news_details">
                                            <textarea cols="20" rows="5" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required"
                                                id="comment" name="comment" aria-required="true" aria-invalid="false" placeholder="News Details...."></textarea>
                                        </span>
                                        @error('comment')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-btn">
                                    {{-- <input type="submit" value="Submit Comments"
                                        class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                        class="wpcf7-spinner"></span> --}}
                                    <button type="submit" class=" btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </div>

                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>




                    <div class="single_relatedCat">
                        <a href=" ">Related News </a>
                    </div>
                    <div class="row">

                        @foreach ($relatednews as $news)
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="related-wrpp">
                                    <div class="related-image">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} "><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                    </div>
                                    <h4 class="related-title">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                            @if (session()->get('language') == 'english')
                                                {{ Str::limit($news->title_en, '30', '...') }}
                                            @else
                                                {{ Str::limit($news->title_bn, '30', '...') }}
                                            @endif
                                        </a>
                                    </h4>
                                    <div class="related-meta">

                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><i
                                                class="la la-tags"> </i>

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
                <div class="col-lg-4 col-md-4">
                    <div class="sitebar-fixd" style="position: sticky; top: 0;">
                        <div class="siteber-add">
                            <div class="themesBazar_widget">
                                <div class="textwidget">
                                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                            src="assets/images/biggapon-1.gif" alt="" width="100%"
                                            height="auto"></p>
                                </div>
                            </div>
                        </div>

                        @include('frontend.layouts.partials.latest-popular-news')

                        <div class="siteber-add2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-50b6dc53-6400-4d53-a94d-0abeb045b4ee" data-elfsight-app-lazy></div>
@endsection
