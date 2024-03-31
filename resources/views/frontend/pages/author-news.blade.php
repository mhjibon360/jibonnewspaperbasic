@extends('frontend.layouts.frontend-master')
@section('title', 'name')
@section('main')
    <section class="author-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        @foreach ($authornews as $news)
                            <div class="custom-col-6">
                                <div class="author-wrpp">
                                    <div class="authorNews-image">
                                        <a
                                            href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} "><img
                                                class="lazyload" src="{{ asset($news->image) }}" /></a>
                                    </div>
                                    <div class="authorPage-content">
                                        <h2 class="authorPage-title">
                                            @if (session()->get('language') == 'english')
                                                <a
                                                    href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                                    {{ Str::limit($news->title_en, '30', '...') }}</a>
                                            @else
                                                <a
                                                    href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_bn]) }}">
                                                    {{ Str::limit($news->title_bn, '30', '...') }}
                                                </a>
                                            @endif
                                        </h2>
                                        <div class="author-date">
                                            <a href="javascript::void(0);"> {{ $news->created_at->diffForHumans() }} </a>
                                            <span>
                                                <i class="las la-clock"></i>
                                                {{-- Saturday, 10th September 2022 --}}
                                                {{ $news->created_at->format('l,jS F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            {{-- <div class="post-nav">
                                <ul class="pager">
                                    <li class="previous">
                                        <a href=" "><i class="las la-step-backward"></i> </a>
                                    </li>
                                    <li>
                                        <a href=" " title="previous"><i class="la la-backward" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li><a href=" ">01</a></li>
                                    <li class="active"><span class="active">02</span></li>
                                    <li><a href=" ">03</a></li>
                                    <li><a href=" ">04</a></li>
                                    <li>
                                        <a href=" " title="next"><i class="la la-forward" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="next">
                                        <a href=" "><i class="las la-step-forward"></i> </a>
                                    </li>
                                </ul>
                            </div> --}}
                            {{ $authornews->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="fixd-sitebar" style="position: sticky; top: 0">
                        <div class="authorPage-content"
                            style="
                background: #fbf7f7;
                border: 2px solid #e1dfdf;
                border-radius: 5px;
              ">
                            <figure class="authorPage-image">
                                @if ($authorname->image)
                                    <img alt="" src="{{ asset($authorname->image) }}"
                                        class="avatar avatar-96 photo" height="96" width="96" loading="lazy" />
                                @else
                                    <img alt="" src="{{ asset('upload/no_image.jpg') }}"
                                        class="avatar avatar-96 photo" height="96" width="96" loading="lazy" />
                                @endif
                            </figure>
                            <h1 class="authorPage-name mb-0">
                                <a href="javascript:void(0);"> {{ $authorname->name }} </a>
                                
                            </h1>
                            @if ($authorname->username)
                            <div class=" text-center mb-3">
                              <strong>@ {{ $authorname->username }}</strong> 
                            </div>
                            @endif
                            <div class="author-social">
                                <a href="{{ $authorname->facebook }}" target="_black" title="Facebook"><i
                                        class="lab la-facebook-f"></i></a>
                                <a href="{{ $authorname->twitter }}" target="_black" title="Twitter"><i
                                        class="lab la-twitter"></i></a>
                                <a href="{{ $authorname->youtube }}" target="_black" title="Youtube"><i
                                        class="lab la-youtube"></i></a>
                                <a href="{{ $authorname->github }}" target="_black" title="Linkedin"><i
                                        class="lab la-github"></i></a>
                                <a href="{{ $authorname->instagram }}" target="_black" title="Instagram"><i
                                        class="lab la-instagram"></i></a>
                            </div>
                            <div class="author-details" style="text-align: justify">
                              {{ $authorname->details }}
                            </div>
                        </div>

                        <div class="authorPopular_item"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
