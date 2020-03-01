<?php

namespace App\Http\Controllers;

use App\Gradient;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Vote::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Gradient $gradient
     * @return JsonResponse
     */
    public function store(Request $request, Gradient $gradient)
    {

        Vote::create([
            'user_id' => Auth::guard('api')->id(),
            'gradient_id' => $gradient->id,
            'type' => $request->input('type')
        ]);

        return response()->json(GradientController::random());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return JsonResponse
     */
    public function show(Vote $vote)
    {
        return response()->json($vote);
    }
}
