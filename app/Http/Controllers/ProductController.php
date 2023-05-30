<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //create title page
    public function createPage(){
        $category=Category::select('categories.id','categories.type_of_donation')->get();

        $product=Product::when(request('key'),function($query){
            $query->where('products.product_name','like','%'.request('key').'%');
            })
                        ->select('products.*','categories.type_of_donation as category_name')
                        ->join('categories','products.category_id','categories.id')

                        ->paginate(5);

        return view('admin.title.create',compact('category','product'));
    }



    //post title page
    public function postTitle(Request $request){

        $datas=$this->createTitle($request);
        Product::create($datas);
        return redirect()->route('title#create');
    }


    //delete title page
    public function deleteTitle($id){
        Product::where('id',$id)->delete();
        return redirect()->route('title#create');
    }


    //update title page
    public function updateTitle(Request $request){

        $title=$this->createTitle($request);
        Product::where('id',$request->title_id)->update($title);
        return redirect()->route('title#create');
    }



    private function createTitle($request){
        return [
            'product_name'=>$request->name,
            'category_id'=>$request->categoryName,

        ];
    }
}
