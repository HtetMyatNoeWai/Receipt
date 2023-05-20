<?php

namespace App\Http\Controllers;

use App\Models\donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    //Create Donor
    public function createDonor(){
        $posting=donor::paginate(3);
        return view('admin.donor.donation',compact('posting'));
    }

    //Creation Donor
    public function postingDonor(Request $request){
       $donate= $this->donorCreation($request);
       donor::create($donate);
       return redirect()->route('Donor#create');
    }

    //Delete Donor
    public function deleteDonor($id){
        donor::where('id',$id)->delete();
        return redirect()->route('Donor#create');
    }




    private function donorCreation($request){
        return[
            'name'=>$request->donorName,
            'address'=>$request->donorAddress,
            'receiver_name'=>$request->donorReceiver,
        ];
    }

}
