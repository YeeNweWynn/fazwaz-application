<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class GeosPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->truncate();
        DB::table('geos')->truncate();

        $properties = DB::table('properties')->select('id')->get();
        foreach($properties as $property){
            DB::table('geos')->insert([
                [
                    "property_id" => $property->id,
                    "country" => Str::random(10),
                    "province" => Str::random(10),
                    "street" => Str::random(10)
                ]
            ]);
        }

        foreach($properties as $property){
            DB::table('photos')->insert([
                [
                    "property_id" => $property->id,
                    "thumb" => "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "search" => "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "full" => "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800"
                ]
            ]);
        }
	    
    }
}
