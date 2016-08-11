<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Good;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Store;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductsController extends Controller {

    public function getAllProducts() {
        $store = Store::get();
        $products = Good::get();
        $sub_cats = SubCategory::get();
        return view('admin.pages.products.allproducts', compact('products', 'store', 'sub_cats'));
    }

    public function postDetails($id) {
        $product = Good::find($id);
        if ($product) {
            $product->image = url('uploads/products/' . $product->image);
            $product->box_total = ($product->box_count) * ($product->box_items_count);
            $product->cat = $product->category->name;
            $product->sub_cat = $product->subCategory->name;

            foreach ($product->prices as $price) {
                $c = new Carbon($price->created_at);
                $product->old_prices .= '<li> <span class="price-val" >' . $price->price . '</span> <span class="price-date">' . $c->diffForHumans() . '</span></li>';
            }

            return response()->json($product->toArray());
        }
        abort(404);
    }

    public function postAdd(DelegateRequest $request) {
        $product = new Good();
        $product->code = $request->input('code');
        $product->name = $request->input('name');
        $product->points = $request->input('points');
        $product->desc = $request->input('desc');
        $product->quantity = $request->input('quantity');
        $product->company = $request->input('company');
        $product->b_price = $request->input('b_price');
        $product->s_price = $request->input('s_price');
        $product->box_count = $request->input('box_count');
        $product->box_items_count = $request->input('box_items_count');
        $product->sub_cat_id = $request->input('sub_cat_id');
        $product->cat_id = SubCategory::find($product->sub_cat_id)->category->id;
        $product->store = $request->input('store');

        //processing a the product avatar 
        $file = $request->file('image');
        $destinationpath = 'uploads/products';
        $filename = $file->getClientOriginalName();
        $file->move($destinationpath, $filename);
        $product->image = $filename;

        // saving a new product
        $product->save();
        // creating a new b_price for it in the prices table
        $product->prices()->create(['price' => $product->b_price]);
        //flashing a msg of success
        session()->push('success', 'تمت الاضافة بنجاح');
        return redirect('products/all-products');
    }

    public function getEdit($id) {
        $old = Good::find($id);
        $old->box_total = ($old->box_count) * ($old->box_items_count);
        $store = Store::get();
        $sub_cats = SubCategory::get();
        return view('admin.pages.products.editproduct', compact('old', 'store', 'sub_cats'));
    }

    public function postEdit(Request $request, $id) {
        $product = Good::find($id);
        $product->code = $request->input('code');
        $product->name = $request->input('name');
        $product->points = $request->input('points');
        $product->desc = $request->input('desc');
        $product->quantity = $request->input('quantity');
        $product->company = $request->input('company');
        $product->b_price = $request->input('b_price');
        $product->s_price = $request->input('s_price');
        $product->box_count = $request->input('box_count');
        $product->box_items_count = $request->input('box_items_count');
        $product->sub_cat_id = $request->input('sub_cat_id');
        $product->cat_id = SubCategory::find($product->sub_cat_id)->category->id;
        $product->store = $request->input('store');

        $file = $request->file('image');
        if ($file) {
            $destinationpath = 'uploads/products';
            $filename = $file->getClientOriginalName();
            @unlink(base_path("../{$destinationpath}/{$product->image}"));
            $file->move($destinationpath, $filename);
            $product->image = $filename;
        }

        $product->save();

        // updating the last b_price for it in the prices table
        $product->prices()->create(['price' => $product->b_price]);
        session()->push('success', 'تم التعديل بنجاح');
        return redirect('products/all-products');
    }

    public function getDelete($id) {
        $delete = Good::find($id);
        $delete->delete();
        return redirect('products/all-products');
    }

    public function postAddCategory(Request $request) {
        $cat = new Category;
        $cat->name = $request->input('cat');
        $cat->save();
        $sub_categories = $request->input('sub_cat');
        foreach ($sub_categories as $sub_cat) {
            if (!empty($sub_cat)) {
                $cat->subCategories()->create(['name' => $sub_cat]);
            }
        }
        session()->push('success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

}
