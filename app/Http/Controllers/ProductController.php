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


        $product=Product::when(request('key'),function($query){
            $query->where('products.product_name','like','%'.request('key').'%');
            })

                        ->paginate(10);

        return view('admin.title.create',compact('product'));
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


        ];
    }
}
