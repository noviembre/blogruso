<?php

namespace App\Providers;

use App\Post;
use App\Category;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //dd('hola');
        // esta linea evita que me mande un error
        // cada vez que hago una migracion
        Schema::defaultStringLength(191);


        view()->composer('pages._sidebar', function($view){

            #=============   POPULAR POSTS  ===============#
            $view->with('popularPosts', Post::getPopularPosts());

            #=============   FEATURED  ==================#
            $view->with('featuredPosts', Post::where('is_featured', 1)->take(3)->get());

            #=============   RECENT POSTS  ==============#
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(4)->get());

            #=============   ALL CATEGORIES  ==============#
            $view->with('categories', Category::all());

        });



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
