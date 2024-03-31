@php
        $latestnews =App\Models\News::where('status', 1)->latest()->take(8)->get();
    $popularnews = App\Models\News::where('status', 1)->orderBy('views', 'desc')->take(8)->get();
@endphp
<div class="singlePopular">
  <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
      <li class="nav-item" role="presentation">
          <div class="nav-link active" data-bs-toggle="pill"
              data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent"
              aria-selected="true"> LATEST </div>
      </li>
      <li class="nav-item" role="presentation">
          <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
              role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR
          </div>
      </li>
  </ul>
</div>

<div class="tab-content" id="pills-tabContentarchive">

  <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
      aria-labelledby="archiveRecent">

      <div class="archiveTab-sibearNews">

          @foreach ($latestnews as $news)
              <div class="archive-tabWrpp archiveTab-border">
                  <div class="archiveTab-image ">
                      <a
                          href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                              class="lazyload" src="{{ asset($news->image) }}"></a>
                  </div>
                  <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"
                      class="archiveTab-icon2"><i class="la la-play"></i></a>
                  <h4 class="archiveTab_hadding"><a
                          href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }} ">
                          @if (session()->get('language') == 'english')
                              {{ Str::limit($news->title_en, '30', '...') }}
                          @else
                              {{ Str::limit($news->title_bn, '30', '...') }}
                          @endif

                      </a>
                  </h4>
                  <div class="archive-conut">
                      {{ $news->views }}
                  </div>

              </div>
          @endforeach

      </div>
  </div>

  <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel"
      aria-labelledby="archivePopulars">
      <div class="archiveTab-sibearNews">

          @foreach ($popularnews as $news)
              <div class="archive-tabWrpp archiveTab-border">
                  <div class="archiveTab-image ">
                      <a
                          href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"><img
                              class="lazyload" src="{{ asset($news->image) }}"></a>
                  </div>
                  <a href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}"
                      class="archiveTab-icon2"><i class="la la-play"></i></a>
                  <h4 class="archiveTab_hadding"><a
                          href=" {{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                          @if (session()->get('language') == 'english')
                              {{ Str::limit($news->title_en, '30', '...') }}
                          @else
                              {{ Str::limit($news->title_bn, '30', '...') }}
                          @endif
                      </a>
                  </h4>
                  <div class="archive-conut">
                      {{ $news->views }}
                  </div>

              </div>
          @endforeach



      </div>
  </div>
</div>
