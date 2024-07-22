<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\ProductCategory;
use Modules\Admin\Http\Requests\Shop\ProductCategoryRequest;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::query()->latest()->paginate(10);
        return view('admin::shop.category.index' , compact('categories'));
    }


    public function create()
    {
        $categories = ProductCategory::query()->where('status' , 1)->get();
        return view('admin::shop.category.create' , compact('categories') );
    }


    public function store(ProductCategoryRequest $request)
    {
        $inputs = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
        ];
        $inputs['slug'] = persianSlug($request->name);
        ProductCategory::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.category.index');
    }


    public function edit(ProductCategory $productCategory)
    {
        $categories = ProductCategory::query()->where('status' , 1)->get();
        return view('admin::shop.category.edit' , compact('productCategory' , 'categories'));
    }


    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $inputs = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
        ];
        $inputs['slug'] = persianSlug($request->name);
        $productCategory->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.category.index');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.category.index');
    }

    public function status(ProductCategory $productCategory)
    {
        $productCategory->status = $productCategory->status == 0 ? 1 : 0;
        $productCategory->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.category.index');
    }

}
