
<div class="row">
    <div class="mediacontainer" id="mediaView" style="margin-top:20px;">
        @if(count($media) > 0)
        @foreach($media as $file)
        <div class="col-md-4">
            <div class="gallery-thumb">
                <img src="{{ url('uploads/'.$file->filename) }}" class="thumb-img"  height="200px">
                <div class="gallery-action">
                    <a class="ico-delete" href="{{ route('delete-ad-images',$file->id) }}"></a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
