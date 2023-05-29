<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Product;
use App\Models\Category;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use App\Models\product_title;

class ProductTitleController extends Controller
{
     //Create
   
    public function linkCreate(){
        $cat=Category::get();
        $tit=Product::get();
        $det=TitleDetail::get();
        return view('admin.link',compact('cat','tit','det'));
    }

    public function filter($categoryId){
        $cat=Category::get();
        $tit=Product::where('category_id',$categoryId)->get();
        $det=TitleDetail::get();
        return view('admin.link',compact('cat','tit','det'));
    }

    public function filterP($productId){
        $cat=Category::get();
        $tit=Product::get();
        $det=TitleDetail::where('p_id',$productId)->get();
        return view('admin.link',compact('cat','tit','det'));
    }

   
}
