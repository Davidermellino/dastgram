<div>

    <div class="card my-5" style="width: 18rem;">
        {{-- carosello --}}
        <div id="carouselExample{{ $post->id }}" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($post->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            @if (count($post->images) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $post->id }}"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
        <div class="card-body">
            <p class="card-text">{{ $post->description }}</p>
        </div>
        <div class="card-footer">
            <p>likes: {{ $post->likes }}</p>
            <div class="" wire:click ="$refresh">
                <div wire:click="addLikes({{ $post->id }})"><i class="fa-regular fa-heart fa-beat"></i></div>
            </div>
        </div>
    </div>


</div>
