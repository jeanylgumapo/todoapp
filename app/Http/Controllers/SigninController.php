<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Signin;

class SigninController extends Controller
{
    public function index()
    {
        return Inertia::render('Signin/Index');
    }
    public function signin(Request $request, Signin $signin)
    {
         if (DB::table('users')
        ->where('username', $request->username)
        ->where('password', $request->password)
        ->exists()) {
            return redirect('/task');
        }
        return redirect('/');
    }
}
