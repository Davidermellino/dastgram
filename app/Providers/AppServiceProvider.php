<?php

namespace App\Providers;

use Schema;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('posts')){
            $posts= Post::orderBy('created_at','desc')->get();
            View::share('posts',$posts);
        }
    }
}
