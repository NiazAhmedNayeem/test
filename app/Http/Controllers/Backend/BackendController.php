<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function adminLogin(Request $request)
    {
      
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:8',
        ]);

        if (auth()->attempt($request->only(['email', 'password']))){
            return redirect('/admin/dashboard')->with('message', 'Admin login successfully, Thank you.');
        }else{
            return redirect()->back()->with('message', 'Your email or password is incorrect');
        }
    }






    public function index()
    {
        return view('backend.index');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
