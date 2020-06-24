<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Types;
use App\Food;

class AdminController extends Controller
{
    public function admin(){
        $types = DB::select('select * from types');
        $food = DB::select('select * from food');
        $orders = DB::select('select * from orders');
        return view('admin/admin',[
            'types' => $types,
            'orders' => $orders,
            'food' => $food,
        ]);
    }

    public function create_food(Request $request){
        $food = Food::create([
            'name'  => $request->name,
            'type_id' => $request->type_id,
            'price' => $request->price,
            'discription' => $request->discription,
            'image' => $request->image,
        ]);
        return redirect('admin');
    }
    public function create_type(Request $request){
        $types = Types::create([
            'name'  => $request->name,
            'relate' => $request->relate,
        ]);
        return redirect('admin');
    }
    function delete_type($id , Request $request){
        $types = Types::find($id);
        $types->delete();
    }

}
