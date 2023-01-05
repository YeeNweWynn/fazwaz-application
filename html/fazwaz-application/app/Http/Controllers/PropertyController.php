<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Property;



class PropertyController extends Controller
{
    public function index()
    {
        $result = Property::all();
        return response()->json($result);
    }
}
