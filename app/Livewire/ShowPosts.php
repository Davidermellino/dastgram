<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{

    public $post ;
    public $number = 0;

    public function addLikes($id){
        $this->postId=$id;
        $this->post = Post::find($id);
        $this->post->likes ++ ;
        $this->post->save();
    }

    public function increment(){
        $this->number++;
    }

    public function render()
    {
        return view('livewire.show-posts');
    }
}
