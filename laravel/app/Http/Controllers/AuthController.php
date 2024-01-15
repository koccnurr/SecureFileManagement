<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
       return view('backend.admin.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = [
                'email'    => $request->email,
                'password' => $request->password,
            ];
    
            $user = Sentinel::authenticateAndRemember($credentials);
    
            if ($user) {
                return redirect()->route('product.all');
            } else {
                echo "Şifre yanlış";
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Diğer genel hata durumları
            dd($e->getMessage());
        }
    }
    
    public function getLogout(Request $request)
    {
        Sentinel::logout();
        return redirect()->route('admin.getAuthLogin');
    }
}
