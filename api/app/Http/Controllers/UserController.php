<?php

namespace App\Http\Controllers;

use App\Gradient;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request) {

        return $request->user();
    }

    public function gradients() {
        $gradients = Gradient::where('user_id', Auth::guard('api')->id())->with('votes')->get();

        return response()->json($gradients);
    }

    public function votes() {
        $votes = Vote::where('user_id', Auth::guard('api')->id())->with('gradient')->get();

        return response()->json($votes);
    }

}
