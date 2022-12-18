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
        $getProduct=DB::select('SELECT * FROM products');
        return view('add',['getProducts'=>$getProduct]);
    }
    public function DoaddItemProduct(Request $request){
        if($request->input('Type')=='box'){
            DB::insert('INSERT into box (name,quantity,stored_at,productId) values(?,?,?,?)',[$request->input('name'),$request->input('quantity'),$request->input('stored_at'),$request->input('product')]);
        }
        $quantity=$request->input('quantity');

    }

    public function search(){
        $search_text = $_GET['query'];
        $boxes = Box::where('name', 'LIKE', '%' .$search_text. '%')->get();
        return view('search', compact('boxes'));
    }
}