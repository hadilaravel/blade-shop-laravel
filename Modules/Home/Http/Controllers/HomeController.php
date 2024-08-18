<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\Comment;
use Modules\Admin\Entities\Blog\Post;
use Modules\Admin\Entities\Setting\Setting;
use Modules\Admin\Entities\Shop\Banner;
use Modules\Admin\Entities\Shop\Brand;
use Modules\Admin\Entities\Shop\Faq;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\ProductCategory;

class HomeController extends Controller
{

    public function index()
    {
        $setting = Setting::query()->first();
        $brands = Brand::query()->where('status' , 1)->get();
        $posts = Post::query()->where('status' , 1)->latest()->limit(4)->get();
        $categories = ProductCategory::query()->where('status' , 1)->get();
        $latestProducts = Product::query()->where('status' , 1)->latest()->limit(4)->get();
        $products = Product::query()->where('status' , 1)->latest()->limit(10)->get();
        $bannerSliders = Banner::query()->where('status' , 1)->where('position' , 1)->get();
        $bannerUnderSlider = Banner::query()->where('status' , 1)->where('position' , 2)->first();
        $bannerLastOffers = Banner::query()->where('status' , 1)->where('position' , 5)->limit(2)->get();
        $bannerImages = Banner::query()->where('status' , 1)->where('position' , 3)->latest()->limit(4)->get();
        $bannerTwoPhotos = Banner::query()->where('status' , 1)->where('position' , 4)->latest()->limit(2)->get();
        return view('home::index' , compact('setting' , 'brands' , 'posts' , 'categories' ,  'products' , 'latestProducts' , 'bannerSliders' , 'bannerLastOffers' ,'bannerUnderSlider' , 'bannerImages' , 'bannerTwoPhotos'));
    }

    public function product(Product $product)
    {
        $category = $product->category->id;
        $relatedProducts = Product::query()->where('category_id' , $category)->where('status' , 1)->get();
        return view('home::product.product' ,  compact('product' , 'relatedProducts'));
    }

    public function post(Post $post)
    {
        $category = $post->category->id;
        $postRelateds = Post::query()->where('category_id' , $category)->where('status' , 1)->latest()->limit(6)->get()->except($post->id);
        return view('home::blog.post' ,  compact('post' , 'postRelateds'));
    }

    public function posts()
    {
        $postBoxs = Post::query()->latest()->limit(6)->get();
        $postNews = Post::query()->latest()->paginate(8);
        $posts = Post::query()->latest()->limit(12)->get();
        return view('home::blog.posts' ,  compact('postNews' , 'postBoxs' ,'posts'));
    }

    public function faq()
    {
        $faqs = Faq::query()->where('status' , 1)->get();
        return view('home::home.faq' , compact('faqs'));
    }

}
