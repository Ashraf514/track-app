<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\SuccessResource;
use App\Models\Product;
use App\Models\ProductKeyInformation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product    =   Product::create($request->except(['product_key_info']));
            foreach ($request->product_key_info as $info) {
                $product->productKeyInformation()->create($info);
            }
            return SuccessResource::make([]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->update($request->except(['product_key_info']));
            foreach ($request->product_key_info as $info) {
                if(isset($info["id"])){
                    $productKeyInfo =   ProductKeyInformation::where(["id"=>$info["id"],"product_id"=>$product->id]);
                    if ($productKeyInfo) {
                        $productKeyInfo->update($info);
                    }else {
                        $product->productKeyInformation()->create($info);
                    }
                } else {
                    $product->productKeyInformation()->create($info);
                }
            }
            return SuccessResource::make([]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
