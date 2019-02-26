<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] invite_token
     * @return [string] message
     */
    public function signup(Request $request)
    {
        //@todo: Harmonize with existing Login & Register Controller
        $validation_array = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        ];

        if(env('INVITE_ONLY', 'false')) {
            $validation_array['invite_token'] = ['required', 'string', 'min:6', 'max:255'];
        }

        $validator = Validator::make($request->all(), $validation_array);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Register failed'
            ], 401);
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'invite_id' => ($request->invite_token != null ? $request->invite_token : null),
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        return UserResource::make($user)
            ->additional(['message' => 'Successfully created user!']);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        //@todo: Harmonize with LoginController
        $validation_array = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];

        $data = $request->all();
        if(isset($data['remember_me'])){
            if($data['remember_me'] == 'x' || $data['remember_me'] == 'on' || $data['remember_me'] == 'true'){
                $data['remember_me'] = true;
            }
            else{
                $data['remember_me'] = false;
            }
        }
        else{
            $data['remember_me'] = false;
        }

        $validator = Validator::make($data, $validation_array);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Login failed'
            ], 422);
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user'  => $user
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        UserResource::withoutWrapping();
        return new UserResource($request->user());
    }

    public function update(Request $request)
    {
        // you can only update your own user!
        $user = $request->user();
        $data = $request->all();
        $data['id']         = $user->id;
        $data['isAdmin']    = null;

        if(isset($data['email'])){
            // @todo: If email changed, reset activation and resend link
        }

        //@todo: Harmonize with existing Login & Register Controller
        $validation_array = [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'firstname'  => ['string', 'max:255'],
            'organization_name'  => ['string', 'max:255'],
            'lastname'  => ['string', 'max:255'],
            'position_title'  => ['string', 'max:255'],
            'password' => ['string', 'min:6', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        ];

        $validator = Validator::make($data, $validation_array);
        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'User update failed.'
            ], 419);
        }

        if(isset($data['organization_name'])){
            $organization = Organization::firstOrCreate(['name' => $data['organization_name']]);
            $data['organization_id'] = $organization->id;
        }

        $user->update($data);
        UserResource::withoutWrapping();
        return new UserResource($user);
    }
}
