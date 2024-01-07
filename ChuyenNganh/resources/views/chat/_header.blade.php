<div class="row">
    <div class="col-lg-6">
        {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
            <img src="" alt="avatar">
        </a> --}}
        <div class="chat-about">
            <h6 class="m-b-0">{{ $getReceiver->name }}</h6>
            <small>Xem lần cuối: {{ Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans() }}</small>
        </div>
    </div>
</div>
