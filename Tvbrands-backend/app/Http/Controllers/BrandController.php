<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){

        return response()->json(Brand::orderBy('id', 'DESC')->get());

    }


    public function show(Brand $brand){
        return response()->json($brand);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'string|required',
            'size' => 'string|required',
            'prize' => 'integer|required',

        ]);

        $brand = Brand::create($request->only('name','size','price'));

        return response()->json($Brand);

    }


    public function edit(Brand $brand)
    {
        //
    }
    


    public function update(Request $request, Brand $brand){
        $brand->update($request->only('name','size','price'));

        return response()->json($brand);

    }

    public function destroy(Brand $brand){


        $name = $brand->name;

        $brand->delete();

        return response()->json([
            'deleted' => true,
            'message' =>"Tv has been deleted."
        ]);
    }
}