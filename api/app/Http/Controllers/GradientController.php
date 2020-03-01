<?php

namespace App\Http\Controllers;

use App\Gradient;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Return a random gradient that the current user has not yet voted on.
     *
     */
    public function random()
    {
        $gradientCount = Gradient::all()->count();
        $attempts = 0;

        while (true) {
            $randomGradient = Gradient::find(random_int(1, $gradientCount));
            $hasVoted = Vote::where([
                'user_id' => Auth::guard('api')->id(),
                'gradient_id' => $randomGradient->id
            ])->first();

            if (!$hasVoted) {
                return [
                    'data' => $randomGradient,
                    'upvotes' => $randomGradient->votes()->where('type', 'UPVOTE')->count(),
                    'downvotes' => $randomGradient->votes()->where('type', 'DOWNVOTE')->count()
                ];
            }

            $attempts++;
            if ($attempts == 100) {
                return response()->json('No more gradients to rate!', 201);
            }
        }
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
     * @param \App\Gradient $gradient
     * @return array
     */
    public function show(Gradient $gradient)
    {

        return [
            'gradient' => $gradient,
            'upvotes' => $gradient->votes()->where('type', 'UPVOTE')->count(),
            'downvotes' => $gradient->votes()->where('type', 'DOWNVOTE')->count()
        ];
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
