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

    public function linkCreate(Request $request){

        $query=Product::query();
        $categories=Category::all();
        $details=TitleDetail::query();


            if($request->ajax()){
                $products=$query->where(['category_id'=>$request->category])->get();
                return response()->json(['products'=>$products]);
            }


            $products=$query->get();
            $detail=$details->get();
            return view('admin.link',compact('categories','products','detail'));
    }

    public function filterLink(Request $request){
        $products=Product::get();
        $query=TitleDetail::query();

        if($request->ajax()){
            $details=$query->where(['p_id'=>$request->product])->get();
            return response()->json(['title_details'=>$details]);
        }
        $details=$query->get();
        return view('admin.link',compact('products','details'));
    }

    public function allLink(Request $request){
        if($request->status=='pro'){
            $data=TitleDetail::get();
        }
        return $data;
    }

    public function allCatLink(Request $request){
        if($request->status=='cat'){
            $data=Product::get();
        }
        return $data;
    }


    public function chooseFilter(Request $request){
        $products=Product::get();
        $query=TitleDetail::query();

        if($request->ajax()){
            $details=$query->where(['p_id'=>$request->product])->get();
            return response()->json(['title_details'=>$details]);
        }
        $details=$query->get();
        return view('admin.link',compact('products','details'));
    }



}
