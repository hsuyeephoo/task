<?php

namespace App\Http\Controllers;

use App\Motor;
use App\Quarter;
use App\Road;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getImage($img_name){
        $file=Storage::disk('motors')->get($img_name);
        return response($file,200)->header("Content-Type","*/*");
    }
    public function postNewQuarter(Request $request){
        $v=Validator::make($request->all(),[
            'quarter_name'=>'required'
        ]);
        if($v->fails()){
            return response()->json($v->errors());
        }
        $q=new Quarter();
        $q->quarter_name=$request['quarter_name'];
        $q->save();
        return response()->json(['message'=>'The new quarter have been created']);
    }
    public function getDrivers(){
        $drivers=Motor::with("road")
            ->with("quarter")
            ->paginate('14');
        return response()->json($drivers);
    }
    public function getStreets(){
        $roads=Road::with("quarter")
            ->with("driver")
            ->get();
        return response()->json($roads);
    }
    public function getQuarters(){
        $quarters=Quarter::with("road")->get();
        return response()->json($quarters);
    }

}
