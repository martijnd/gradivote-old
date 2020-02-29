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
    public function index(): JsonResponse
    {
        $gradients = Gradient::all();

        return response()->json($gradients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $gradient = Gradient::create($request->all());

        return response()->json($gradient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gradient  $gradient
     * @return Gradient
     */
    public function show(Gradient $gradient): Gradient
    {
        return $gradient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Gradient $gradient
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Gradient $gradient): JsonResponse
    {
        $gradient->delete();

        return response()->json('Gradient successfully deleted');
    }
}
