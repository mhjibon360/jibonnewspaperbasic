@php
    $livetv = App\Models\Livetv::first();

@endphp
<div class="live-item">
    <div class="live_title">
        <a href=" ">LIVE TV </a>
        <div class="themesBazar"></div>
    </div>
    <div class="popup-wrpp">
        <div class="live_image">
            @if ($livetv->status == '1')
                <img width="700" height="400" src="{{ asset($livetv->image) }}"
                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
            @else
                <img width="700" height="400"
                    src="https://media.istockphoto.com/id/1423983774/photo/office-worker-taking-a-break-during-work-hours.webp?b=1&s=170667a&w=0&k=20&c=tkvBSM8VrKz2aFSnrBzu_cGgYkafzW0mdTMrlZ0cDx0="
                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
            @endif





            <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i>
            </div>
        </div>
        <div class="live-popup">
            <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles"
                aria-describedby="modal-contents">
                <div id="modal-contents">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                        @if ($livetv->status == '1')
                            <iframe class="" src="{{ $livetv->link }}" allowfullscreen="allowfullscreen"
                                width="100%" height="400px"></iframe>
                        @else
                            <iframe class="" src="" allowfullscreen="allowfullscreen" width="100%"
                                height="400px"></iframe>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
