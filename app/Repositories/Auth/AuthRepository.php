<?php

namespace App\Repositories\Auth;

use App\Exceptions\AuthException;
use App\Models\User;



class AuthRepository
{
    public function register($info)
    {
        return User::create([
            'name' => $info['name'],
            'email' => $info['email'],
            'password' => $info['password'],
        ]);
    }

    public function login($info)
    {

            $user = User::where('email', $info['email'])->first();
        
            if (!$user) {
                throw new AuthException("User not found.");
            }
        
            $success['token'] = $user->createToken('token')->plainTextToken; 
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            
            return $success;

    
    }
}