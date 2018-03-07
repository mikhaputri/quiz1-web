<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class itemController extends Controller
{
    public function view(){
    	return Item::all();
    }

    public function showbyitem($id){
        $idCat = Item::find($id)->value('category_id');

        $data["items"]=Item::find($id);
        $data["items"]["category"]= Category::find($idCat);

        return $data;
    }

    public function add(Request $request){
    	$data = new Item();
    	$data['category_id'] = $request->input('category_id');
    	$data['name'] = $request->input('name');
    	$data['price'] = $request->input('price');
    	$data['stock'] = $request->input('stock');
    	$data->save();

    	return response([
    		'msg'=>'ok',
    	],200);
    }

    public function update(Request $request){
    	Item::where('id','=',$request->input('id'))
    		->update([ 'category_id' => $request->input('category_id'),
    					'name' => $request->input('name'),
    					'price' => $request->input('price'),
    					'stock' => $request->input('stock')
    				]);

    	return response([
    		'msg'=>'ok',
    	],200);
    }

    public function delete(Request $request){
    	Item::where('id','=', $request->input('id'))->delete();
    }
}
