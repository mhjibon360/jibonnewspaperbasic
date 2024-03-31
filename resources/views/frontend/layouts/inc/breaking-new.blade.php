<div class="top-scroll-section5">
    <div class="container">
        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span> Breaking News :: </span>
                            </div>
                        </div>
                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()"
                                onmouseout="this.start()">
                                @php
                                    $breaking = App\Models\News::where('status', 1)
                                        ->where('show_at_breaking', 1)
                                        ->latest()
                                        ->get();
                                @endphp
                                @foreach ($breaking as $news)
                                    <a href="{{ route('news.details', ['id' => $news->id, 'slug' => $news->slug_en]) }}">
                                        <img src="{{ asset($news->image) }}" alt="Logo" title="Logo"
                                            style="height: 30px;width:30px;max-height:30px;">
                                        @if (session()->get('language') == 'english')
                                            {{ $news->title_en }}
                                        @else
                                            {{ $news->title_bn }}
                                        @endif
                                    </a>
                                @endforeach



                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-bs-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
