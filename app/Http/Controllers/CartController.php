<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Cart;
use App\Models\donor;

// use Barryvdh\DomPDF\Facade\PDF;

use App\Models\Product;
use App\Models\Category;
use App\Models\donor_product;
use App\Models\Title;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class CartController extends Controller
{
   public function testCreate(){
    $categories=Category::select('categories.id','categories.type_of_donation')->get();
    $products=Product::select('products.id','products.product_name')->get();
    $titles=TitleDetail::select('title_details.id','title_details.title')->get();
    $carts=Cart::select('carts.*','categories.type_of_donation','products.product_name','title_details.title')
                ->join('categories','carts.cat_id','categories.id')
                ->join('products','carts.p_id','products.id')
                ->join('title_details','carts.t_id','title_details.id')
                ->get();
    return view('admin.testCreate',compact('categories','products','titles','carts'));
   }

   public function testPost(Request $request){
        $data=$this->createTesting($request);
        Cart::create($data);
        return redirect()->route('test#create');
   }

   private function createTesting($request){
    return[
        'cat_id'=>$request->catName,
        'p_id'=>$request->pName,
        't_id'=>$request->tName,
    ];
   }

   public function testFilter(Request $request){
        $categories=Category::all();
        $pro=Product::query();
        $qu=TitleDetail::query();
        $query=Cart::query();

        if($request->ajax()){
            $carts=$query->select('carts.*','categories.type_of_donation','products.product_name','title_details.title')
                        ->join('categories','carts.cat_id','categories.id')
                        ->join('products','carts.p_id','products.id')
                        ->join('title_details','carts.t_id','title_details.id')
                        ->where(['cat_id'=>$request->category])->get();
            return response()->json(['carts'=>$carts]);
        }
        $carts=$query->get();
        $products=$pro->get();
        $titles=$qu->get();
        return view('admin.testCreate',compact('categories','products','titles','carts'));
   }

}


