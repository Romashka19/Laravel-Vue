<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RestoranController extends Controller
{
    public function index(){
        return view("index");
    }

    public function online(){
        $food = DB::select('select * from food');
        $types = DB::select('select * from types');
        $fooddata = array();
        foreach ($food as $fo) {
            $id = $fo->id;
            $name = $fo->name;
            $discription = $fo->discription;
            $price = $fo->price;
            $image = $fo->image;
            $type_food = "";
            foreach ($types as $type){
                if($fo->type_id == $type->id){
                    $type_food = $type->name;
                }
            }
            $relate_food = "";
            foreach ($types as $type){
                if($fo->type_id == $type->id){
                    $relate_food = $type->relate;
                }
            }
            $foods = array(array(
                'id' => $id,
                'name' => $name,
                'discription' => $discription,
                'price' => $price,
                'type_food' => $type_food,
                'relate_food' => $relate_food,
                'image' => $image
            ));
            $fooddata = array_merge($fooddata, $foods);
        }
        return response()->json($fooddata);
    }
    public function menu(){
        $food = DB::select('select * from food');
        $types = DB::select('select * from types');
        $fooddata = array();
        foreach ($food as $fo) {
            $name = $fo->name;
            $discription = $fo->discription;
            $price = $fo->price;
            $type_food = "";
            foreach ($types as $type){
                if($fo->type_id == $type->id){
                    $type_food = $type->name;
                }
            }
            $relate_food = "";
            foreach ($types as $type){
                if($fo->type_id == $type->id){
                    $relate_food = $type->relate;
                }
            }
            $foods = array(array(
                'name' => $name,
                'discription' => $discription,
                'price' => $price,
                'type_food' => $type_food,
                'relate_food' => $relate_food
            ));
            $fooddata = array_merge($fooddata, $foods);
        }
        return response()->json($fooddata);

    }
    public function order(){
        return view("main/order");
    }
}
