<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $authenticatedUser = auth()->user();

        //To simulate admin role
        //we assume that a User with id = 1 is Admin
        try {
            $this->authorize('view', $authenticatedUser);
        } catch (\Exception $accessDeniedHttpException) {
            return response()->json(['error' => 'Forbidden.'], 403);
        }

        $users = User::get();

        $users =  UserResource::collection($users);

        return $users;

    }
}
