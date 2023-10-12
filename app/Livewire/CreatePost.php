<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    #[Rule('max:1024', message: 'Dimensione massima: 1024 kylobite')]
    #[Rule('image', message: 'Il file deve contenere una immagine')]
    #[Rule('required', message: 'Immagine obbligatoria')]
    public $temporary_images;

    #[Rule('max:1024', message: 'Dimensione massima 1024 kylobite')]
    #[Rule('image', message: 'Il file deve contenere una immagine')]
    #[Rule('required', message: 'Immagine obbligatoria')]
    public $images = [];

    #[Rule('required')]
    public $likes = 0;

    #[Rule('max:400', message: 'Max: 400')]
    public $description;

    public function updatedTemporaryImages()
    {
        if (
            $this->validate([
                'temporary_images.*' => 'required|image|max:1024',
            ])
        ) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        if (count($this->images)) {
            $post = Post::create(
                $this->validate([
                    'description' => 'max:400',
                    'likes' => 'required',
                ]),
            );
            if ($this->validate(['images.*' => 'required|image|max:1024'])) {
                foreach ($this->images as $image) {
                    $post->images()->create(['path' => $image->store('images', 'public')]);
                }
            }

            $this->clear();
            return redirect()
                ->back()
                ->with('message', "Il tuo post e' in pubblicazione");
        }
         return back()->with('error',"immagine obbligatoria");
    }

    public function clear()
    {
        $this->temporary_images = [];
        $this->description = ' ';
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
