<div class="main-container gallery {{$gallery_class}}">
    @foreach($query->images as $img)
        <div class="gallery__element" href="{{ asset('img/archive/' . $img->filename) }}">
            <img class="lightboxed gallery__element-image" rel="group1" src="{{ asset('img/archive/medium/' . $img->filename) }}" data-link="{{ asset('img/archive/' . $img->filename) }}">
            <p class="gallery__element-title">{{$img->title}}</p>
        </div>
    @endforeach
</div>