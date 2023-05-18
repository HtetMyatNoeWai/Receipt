<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryController extends Controller
{

    //create category page
    public function create(){
        $categories=Category::get();
        return view('admin.category.categories',compact('categories'));
    }

    //post category
    public function postCategory(Request $request){
        // $this->categoryValidation($request);
        $this->validateCreate($request);
        $data= $this->categoryCreate($request);
        Category::create($data);
        return redirect()->route('auth#category');
    }

    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('auth#category');
    }


   //update category
   public function update(Request $request){
    $this->validateCreate($request);
    $data=$this->categoryCreate($request);
    Category::where('id',$request->cat_id)->update($data);
    return redirect()->route('auth#category');
   }


   private function validateCreate($request){
    Validator::make($request->all(),[
        'cat_name' => 'required|unique:categories,type_of_donation',
    ])->validate();
   }


    private function categoryCreate($request){
        return[
            'type_of_donation' => $request->cat_name,
        ];
    }
}
