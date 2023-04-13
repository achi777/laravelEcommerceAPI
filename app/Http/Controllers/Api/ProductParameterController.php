<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductParameterRequest;
use App\Models\Product;
use App\Models\ProductParameter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return $product->parameters;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductParameterRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(ProductParameterRequest $request, Product $product)
    {
        $parameter = new ProductParameter($request->validated());
        $product->parameters()->save($parameter);

        return response()->json($parameter, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, ProductParameter $parameter)
    {
        return $parameter;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductParameterRequest  $request
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(ProductParameterRequest $request, Product $product, ProductParameter $parameter)
    {
        $parameter->update($request->validated());

        return response()->json($parameter, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductParameter $parameter)
    {
        $parameter->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
