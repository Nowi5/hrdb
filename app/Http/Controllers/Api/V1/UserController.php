<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters('name', 'email')
            ->paginate();

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        UserResource::withoutWrapping();
        return new UserResource($user);
    }

}
