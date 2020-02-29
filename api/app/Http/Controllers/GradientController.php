<?php

namespace App\Http\Controllers;

use App\Gradient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GradientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $gradients = Gradient::all();
        return response()->json($gradients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gradient  $gradient
     * @return \Illuminate\Http\Response
     */
    public function show(Gradient $gradient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gradient  $gradient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gradient $gradient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gradient  $gradient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gradient $gradient)
    {
        //
    }
}
