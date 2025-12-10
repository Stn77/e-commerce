<?php

namespace App\Presentation\Http\Controllers;

use App\Application\User\DTO\LoginData;
use App\Application\User\DTO\RegisterData;
use App\Application\User\UseCases\LoginUserUseCase;
use App\Application\User\UseCases\RegisterUserUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request, RegisterUserUseCase $useCase)
    {
        $data = new RegisterData(
            $request->name,
            $request->email,
            $request->password
        );

        $user = $useCase->execute($data);

        return response()->json([
            'message' => 'Register success',
            'user' => $user
        ], 201);
    }

    public function login(Request $request, LoginUserUseCase $useCase)
    {
        $data = new LoginData(
            $request->email,
            $request->password
        );

        try {
            $user = $useCase->execute($data);
            return response()->json(['user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }
}
