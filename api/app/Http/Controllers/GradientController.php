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
    public static function random()
    {
        $gradient = Gradient::whereDoesntHave('votes', function($query) {
            $query->where('user_id', Auth::guard('api')->id());
        })->get()->shuffle()->first();

        if (!$gradient) {
            return response()->json('No more gradients to rate', 201);
        }

        return [
            'data' => $gradient,
            'upvotes' => $gradient->votes()->where('type', 'UPVOTE')->count(),
            'downvotes' => $gradient->votes()->where('type', 'DOWNVOTE')->count()
        ];
    }

    /**
     * The best gradients that belong in the Hall of Fame.
     * WORK IN PROGRESS
     */
    public function best()
    {
        $best = Gradient::with('votes')
            ->withCount('votes')
            ->orderBy(function($query) {
                return $query->first()->votes()->where('type', 'UPVOTE')->count() -
                    $query->first()->votes()->where('type', 'DOWNVOTE')->count();
            }, 'desc')
            ->get();

        dd($best);
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
