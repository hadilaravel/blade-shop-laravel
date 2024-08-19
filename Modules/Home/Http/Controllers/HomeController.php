<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\About;
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
        $product->view += 1;
        $product->save();
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

    public function about()
    {
        $about = About::query()->first();
        return view('home::home.about' , compact('about'));
    }

    public function products(Request $request , ProductCategory $category = null)
    {
//        get brands
        $brands = Brand::all();

//        category selection
        $catRequest = null;
        if ($category){
            $catRequest = $category->id;
            $productModel = $category->products();
        }else{
            $productModel = new Product();
        }


//        get categories
        $categories = ProductCategory::query()->where('status' , 1)->get();

        switch ($request->sort){

            case 1:
                $column = "created_at";
                $direction = "DESC";
                break;
            case 2:
                $column = "price";
                $direction = "DESC";
                break;
            case 3:
                $column = "price";
                $direction = "ASC";
                break;
            case 4:
                $column = "view";
                $direction = "DESC";
                break;
            case 5:
                $column = "sold_number";
                $direction = "DESC";
                break;
            default :
                $column = "created_at";
                $direction = "DESC";
        }
        if($request->search){
            $query = $productModel->where('name' , 'LIKE' ,"%" .  $request->search . "%")->orderBy($column , $direction);
        }else{
            $query = $productModel->orderBy($column , $direction);
        }
        $products = $request->max_price && $request->min_price ? $query->whereBetween( 'price' ,[$request->min_price , $request->max_price] ) :
            $query->when($request->min_price , function ($query) use($request) {
                $query->where('price' , '>=' , $request->min_price)->get();
            })->when($request->max_price , function ($query) use($request) {
                $query->where('price' , '<=' , $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price) , function ($query) use($request){
                $query->get();
            });
        $products = $products->when($request->brands , function () use($request, $products){
            $products->whereIn('brand_id' , $request->brands);
        });
        $products = $products->paginate(2);
        $products->appends($request->query());
//      get selected brands
        $selectedBrandsArray = [];
        if($request->brands){
            $selectedBrands = Brand::query()->find($request->brands);
            foreach ($selectedBrands as $selectedBrand){
                array_push($selectedBrandsArray , $selectedBrand->original_name);
            }
        }
        return view('home::product.products' , compact('products' , 'catRequest' ,'brands' , 'selectedBrandsArray' , 'categories'));

    }


}
