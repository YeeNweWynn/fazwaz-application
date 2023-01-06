<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request['search']) && $request['search'] !='undefined'){
            $result = Property::where('title','LIKE','%'.$request->search.'%')
                    ->orWhere('province','LIKE','%'.$request->search.'%')
                    ->join('geos','geos.property_id','=','properties.id')
                    ->select('title', 'price', 'currency', 'geos.*')
                    ->get();
        }
        else {
           $result = Property::all();
        }
        return response()->json($result);
        
    }

}
