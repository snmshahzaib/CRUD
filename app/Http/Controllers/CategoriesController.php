<?php

namespace App\Http\Controllers;
use App\Category;
use Auth;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('show_categories')->with('categoryArr', Category::all());
    }

    public function create()
    {
        return view('categories');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            $data['user_id'] = Auth::user()->id;
            $obj = new Category;
            $obj->insert($data);
            
        }
            return redirect('show_categories');
    }

    public function show(Category $categories)
    {
        return view('show_categories');
    }

    public function edit(Category $categories, $id)
    {
        return view('categories_edit')->with('categoryArr', Category::find($id));
    }

    public function update(Request $request, Category $categories)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $this->cleanData($data);
            $Obj = Category::find($request->id);
            $Obj->update($data); 
        }
        return redirect('show_categories');
    }

    public function destroy(Category $categories, $id)
    {
        Category::destroy($id);
        return redirect('show_categories');
    }
    public function cleanData(&$data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }

    }
}
