<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Box;

class StoreController extends Controller
{

    public function index(){
        return view('index');
    }
    public function addItemProduct(){
        $getProduct=DB::select('SELECT * FROM product');
        return view('add',['getProducts'=>$getProduct]);
    }
    public function DoaddItemProduct(Request $request){
        //if($request->input('Type')=='box'){
            DB::insert('INSERT into boxes (name,quantity,stored_at,productId) values(?,?,?,?)',[$request->input('name'),$request->input('quantity'),$request->input('stored_at'),$request->input('product')]);
        //}
        $quantity=$request->input('quantity');
        return redirect('showStore');
    }
    public function ShowStoreTable(){
        $getboxes = DB::select('SELECT * FROM boxes');
        return view('storeTable',['getboxes'=>$getboxes]);
    }
    public function edit(Request $request,$boxId){
        $getbox = DB::select('SELECT * FROM boxes where id='.$boxId);
        $getProduct=DB::select('SELECT * FROM product');
        return view('edit',['box'=>$getbox[0],'getProducts'=>$getProduct]);
    }
    public function Doedit(Request $request,$boxId){
        $getbox = DB::select('SELECT * FROM boxes where id='.$boxId);
        DB::table('boxes')
            ->where('id',$boxId)
            ->update(['name'=>$request->name,'quantity'=>$request->quantity,'stored_at'=>$request->stored_at]);
            return redirect('showStore');
    }
    public function Remove(Request $request){
        $boxId = $request->productId;
        $boxId=DB::delete('DELETE FROM boxes WHERE id='.$boxId);
        return response()->json([$boxId]);
    }

    // public function getBoxById($boxId){
    //     $box = Box::find($boxId);
    //     return view('storeTable',compact('box','boxId'));
    // }

    public function addToBox(Request $request){
        $boxId = $request->box_id;
        $getbox = DB::select('SELECT * FROM boxes where id='.$boxId);
        $quantity = $getbox[0]->quantity;
       DB::table('boxes')
            ->where('id',$boxId)
            ->update(['quantity'=>$request->new_quantity+$quantity]);
       //$box = Box::find($boxId); 
         

        return response()->json([$request->new_quantity+$quantity]);
    }
}
