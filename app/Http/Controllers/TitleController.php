<?php

namespace App\Http\Controllers;

use App\Models\donor;
use App\Models\Title;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use App\Models\donor_product;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class TitleController extends Controller
{
    //Create Product
    public function titleCreate(){
       $products= Title::get();
        return view('admin.title',compact('products'));
    }

    //Post Product
    public function titlePost(Request $request){
        $data=$this->titlecreation($request);
        Title::create($data);
        return redirect()->route('title#creation');
    }

    private function titlecreation($request){
        return[
            'title_name'=>$request->titleName,
        ];
    }


}