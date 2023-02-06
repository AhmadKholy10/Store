<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Box;
use Psy\Readline\Hoa\Console;

class StoreController extends Controller
{

    public function index(){
        return view('indexStore');
    }
    public function addItemProduct(){
        $getProduct=DB::select('SELECT * FROM item');
        return view('add',['getProducts'=>$getProduct]);
    }
    public function DoaddItemProduct(Request $request){
        //if($request->input('Type')=='box'){
        DB::insert('INSERT into item (name,stored_at) values(?,?)',[$request->input('name'),$request->input('stored_at')]);
        $lastItem=DB::select('SELECT id FROM `item`  ORDER BY id DESC LIMIT 1');
        DB::insert('INSERT into quantity (itemId,quantity) values(?,?)',[$lastItem[0]->id,$request->input('quantity')]);
        //}
        $quantity=$request->input('quantity');
        return redirect('showStore');
    }
    public function ShowStoreTable(){
        //$getboxes = DB::select('SELECT * FROM boxes');
        //$getboxes=DB::select("SELECT * FROM quantity JOIN item on(item.id=quantity.itemId)  ORDER BY quantity.id DESC LIMIT 1");
        $getboxes=DB::select("SELECT  * FROM quantity JOIN( item ) on item.id=quantity.itemId WHERE quantity.id IN (SELECT  max(quantity.id) FROM quantity JOIN( item ) on item.id=quantity.itemId GROUP by itemId) Order by itemId");
        //$getboxes=DB::select("SELECT * FROM quantity JOIN item on(item.id=quantity.itemId) where item.id=".$boxId);
        return view('storeTable',['getboxes'=>$getboxes]);
    }
    public function edit(Request $request,$boxId){
        //$getbox = DB::select('SELECT * FROM boxes where id='.$boxId);
        $getProduct=DB::select('SELECT * FROM product');
        $getbox=DB::select("SELECT * FROM quantity JOIN item on(item.id=quantity.itemId) where item.id=".$boxId." ORDER BY quantity.id DESC LIMIT 1");
        //$getboxes=DB::select("SELECT  * FROM quantity JOIN( item ) on item.id=quantity.itemId WHERE quantity.id IN (SELECT  max(quantity.id) FROM quantity JOIN( item ) on item.id=quantity.itemId GROUP by itemId)");
        
        return view('edit',['box'=>$getbox[0],'getProducts'=>$getProduct]);
    }
    public function Doedit(Request $request,$boxId){
        //$getQuantity = DB::select('SELECT * FROM quantity where itemId='.$boxId.'ORDER BY quantity.id DESC LIMIT 1');
        DB::table('item')
            ->where('id',$boxId)
            ->update(['name'=>$request->name,'stored_at'=>$request->stored_at]);
        DB::table('quantity')
            ->where('itemId',$boxId)
            ->orderby('id')
            ->update(['quantity'=>$request->quantity]);

        return redirect('showStore');
    }
    public function Remove(Request $request){
        $boxId = $request->productId;
        $boxId=DB::delete('DELETE FROM item WHERE id='.$boxId);
        DB::delete('DELETE FROM quantity WHERE itemId='.$boxId);
        return response()->json([$boxId]);
    }
    public function Detail(Request $request ,$boxId){

        $getboxes=DB::select("SELECT * FROM quantity JOIN item on(item.id=quantity.itemId) where item.id=".$boxId);
        return view('detail',['getBoxes'=>$getboxes]);
        
    }

    public function addToBox(Request $request){
        $boxId = $request->box_id;
        $getbox = DB::select('SELECT * FROM quantity where Itemid='.$boxId .' ORDER BY id DESC LIMIT 1');
        $quantity = $getbox[0]->quantity;
        $quantity += $request->new_quantity;
       DB::insert('INSERT into quantity (itemID, quantity) values(?,?)',[$boxId, $quantity]);

        return response()->json([$quantity]);
    }
}
