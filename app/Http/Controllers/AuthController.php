<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'confirm_password'
        ]);
        $result = ['status' => 200];
        try {
            $validator = Validator::make($data, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            $data['password'] = bcrypt($data['password']);
            $result['data'] = User::create($data);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function login(Request $request)
    {
        $data = $request->only([
            'email',
            'password',
        ]);
        $result = ['status' => 200];
        try {
            $validator = Validator::make($data, [
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            if (!$token = JWTAuth::attempt($data)) {
                throw new JWTException('invalid login credentials');
            }
            $result = ['status' => 200];
            $result['data'] = $token;
        } catch (JWTException $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }
}
