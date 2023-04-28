<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductParameterRequest;
use App\Models\ProductParameter;
use Illuminate\Http\Request;

class ProductParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = ProductParameter::all();
        return response()->json(['data' => $parameters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductParameterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductParameterRequest $request)
    {
        $parameter = ProductParameter::create($request->validated());
        return response()->json(['data' => $parameter], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(ProductParameter $parameter)
    {
        return response()->json(['data' => $parameter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductParameterRequest  $request
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(ProductParameterRequest $request, ProductParameter $parameter)
    {
        $parameter->update($request->validated());
        return response()->json(['data' => $parameter]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductParameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductParameter $parameter)
    {
        $parameter->delete();
        return response()->json(['message' => 'Product parameter deleted']);
    }
}
