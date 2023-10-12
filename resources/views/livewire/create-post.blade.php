<div>
    @if (session('message'))
        <div class="alert alert-success w-25">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent='store'>
        <input type="file" multiple wire:model='temporary_images' name="images">
        @error('temporary_images.*')
            <div class="alert ">
                {{ $message }}
            </div>
        @enderror
        @if (session('error'))
        <div class="alert alert-danger w-25">
            {{ session('error') }}
        </div>
        @endif

        @if (!empty($images))
            @foreach ($images as $key => $image)
                <div style="height: 50px; width:50px; background-image:url({{ $image->temporaryUrl() }});">
                </div>
                <button class="btn btn-danger" type="button" wire:click='removeImage({{ $key }})'>Cancella</button>
            @endforeach
        @endif
        <input type="text" wire:model='description'>
        <button>Pubblica</button>
        @error('description')
            <div class="alert">
                {{ $message }}
            </div>
        @enderror
    </form>
</div>
