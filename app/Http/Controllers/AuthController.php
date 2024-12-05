<?php

namespace App\Http\Controllers;

use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public $authRepo;

   public function __construct(AuthRepository $authRepository){
    $this->authRepo = $authRepository;
   }

   public function register(Request $request){
    $this->authRepo->register($request->all());
    return response()->json("You Are Register");
   }

   public function login(Request $request)
   {
    $user = $this->authRepo->login($request->all());
    return response()->json($user);
   }
}
