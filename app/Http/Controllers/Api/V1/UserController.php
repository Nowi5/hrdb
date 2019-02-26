<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters('name', 'email', 'organization.name')
            ->allowedIncludes('organization')
            ->paginate();

        return UserResource::collection($users)
            ->hide(['email','firstname','lastname']);

    }

    public function show(User $user)
    {
        UserResource::withoutWrapping();
        if($user->id == \Auth::user()->id){
            return new UserResource($user);
        }
        else{
            $userResource = new UserResource($user);
            return $userResource->hide(['email']);
        }
    }
}
