<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Store a new user into the database.
     *
     * @param UsersRequest $request
     * @return UserResource
     */
    public function store(UsersRequest $request)
    {
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource($user);
    }
}
