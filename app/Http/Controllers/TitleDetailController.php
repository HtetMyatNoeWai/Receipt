<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\TitleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TitleDetailController extends Controller
{
    //Create Detail
    public function createDetail(){
        $product=Product::select('products.id','products.product_name')->get();
        $post=TitleDetail::select('title_details.*','products.product_name')
                            ->join('products','title_details.p_id','products.id')
                            ->get();
        return view('admin.detail.detailCreate',compact('post','product'));
    }

    //Post Detail
    public function postDetail(Request $request){
        
        $this->detailValidate($request);
        $data=$this->detailCreate($request);
        TitleDetail::create($data);
        return redirect()->route('detail#create');
    }


    //Delete Detail
    public function deleteDetail($id){
        TitleDetail::where('id',$id)->delete();
        return redirect()->route('detail#create');
    }


    //Update Detail
    public function updateDetail(Request $request){
        $this->detailValidate($request);
        $detail=$this->detailCreate($request);
        TitleDetail::where('id',$request->detail_id)->update($detail);
        return redirect()->route('detail#create');
    }



    private function detailValidate($request){
        Validator::make($request->all(),[
            'detail_name'=>'required',
        ]);
    }

    private function detailCreate($request){
       return[
        'title' => $request -> detail_name,
        'p_id'=>$request->productName,
       ];

    }
}
