<div class="main-container gallery {{$gallery_class}}">
    @foreach($query->images as $img)
        <a class="gallery__element" href="{{ asset('img/archive/' . $img->filename) }}">
            <img class="gallery__element-image" src="{{ asset('img/archive/' . $img->filename) }}">
            <p class="gallery__element-title">{{$img->title}}</p>
        </a>
    @endforeach
</div>