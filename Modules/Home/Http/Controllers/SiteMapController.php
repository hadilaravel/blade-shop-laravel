<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\Post;
use Modules\Admin\Entities\Shop\Product;

class SiteMapController extends Controller
{

    public function index()
    {
        return response()->view('home::sitemap.sitemap')->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::query()->where('status' , 1)->get();
        return response()->view('home::sitemap.posts' , compact('posts'))->header('Content-Type', 'text/xml');
    }

    public function products()
    {
        $products = Product::query()->where('status' , 1)->get();
        return response()->view('home::sitemap.products' , compact('products'))->header('Content-Type', 'text/xml');
    }

    public function page()
    {
        return response()->view('home::sitemap.page')->header('Content-Type', 'text/xml');
    }

}
