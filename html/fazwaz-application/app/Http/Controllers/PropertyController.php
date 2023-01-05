<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Property;



class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // $result = Property::all();
        //return response()->json($result);

        $result = Property::where('title','LIKE','%'. $request['name'].'%')
                    ->orWhere('province','LIKE','%'.$request['name'].'%')
                    ->join('geos','geos.property_id','=','properties.id')
                    ->select('title', 'price', 'currency', 'geos.*')
                    ->get();
        return response()->json($result);
        
    }

}
