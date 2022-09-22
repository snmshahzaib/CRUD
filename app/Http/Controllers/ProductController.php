<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Auth;

class ProductController extends Controller
{
    public function index(Request $request) {
        return view('show_product')->with('productArr', Product::all());
    }
    public function create()
    {
        return view('product')->with('catagoriesArr', Category::all());
    }
    public function show($id)
    {
        $product = Product::find($id);
        $product_cat = $product->categories;
        // dd($product_cat);
        $data = [];
        $data['categories'] = $product_cat;
        return view('category_detail', $data);
    }
    public function store(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            $obj = new Product;
            $data['user_id'] = Auth::user()->id;
            unset($data['categories']);

            $createdProduct = $obj->create($data);
            $catId = $request->categories;
            
            foreach ($catId as $id) {
                $createdProduct->categories()->attach($id);
            }
            
        }
            return redirect('show_product');
    }
    public function edit(Product $product, $id)
    {
        return view('product_edit')->with('productArr', Product::find($id));
    }

    public function update(Request $request, Product $product)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $this->cleanData($data);
            $Obj = Product::find($request->id);
            $Obj->update($data); 
        }
        return redirect('show_product');
    }

    public function destroy(Product $product, $id)
    {
        Product::destroy($id);
        return redirect('show_product');
    }

    public function show_catProducts($id) {
        $category = Category::find($id);
        $product_cat = $category->products;
        // dd($product_cat);
        $data = [];
        $data['products'] = $product_cat;
        return view('show_cat_products', $data);
    }

    public function cleanData($data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }

    }

}
