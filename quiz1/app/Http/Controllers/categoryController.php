<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class categoryController extends Controller
{
	public function showbycategory($id){
		$idCat = Category::where('id','=',$id)->value('id');
		$nameCat = Category::where('id', '=', $id)->value('name');

		// $arr = array("asdf","as");
		// $arr2["asdf"]="a";
		// $arr2["aaa"]=[
		// 	$arr
		// ];

		$data["id"]= $idCat;
		$data["name"]= $nameCat;
		$data["items"]=[
			Item::where('category_id', '=', $id)->get()
		];

		return $data;		
	}

    public function view(){
    	return Category::all();
    }

    public function add(Request $request){
    	$data = new Category();
    	$data['name'] = $request->input('name');
    	$data->save();

    	return response([
    		'msg'=>'ok',
    	],200);
    }

    public function update(Request $request){
    	Category::where('id','=',$request->input('id'))
    		->update(['name' => $request->input('name')]);

    	return response([
    		'msg'=>'ok',
    	],200);
    }

    public function delete(Request $request){
    	Category::where('id','=', $request->input('id'))->delete();
    }
}
