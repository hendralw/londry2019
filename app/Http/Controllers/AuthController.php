<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// use Illuminate\Routing\Route;
// use Illuminate\Routing\Matching\ValidatorInterface;
// class CaseInsensitiveUriValidator implements ValidatorInterface
// {
//   public function matches(Route $route, Request $request)
//   {
//     $path = $request->path() == '/' ? '/' : '/'.$request->path();
//     return preg_match(preg_replace('/$/','i', $route->getCompiled()->getRegex()), rawurldecode($path));
//   }
// }

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    public function home()
    {
        if (!Session::get('login')) {
            return redirect('Login')->with('alert', 'Kamu harus login dulu');
        } else {
            return view('templates.content');
        }
    }

    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = Employee::where('username', $username)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('name', $data->employees_name);
                Session::put('id', $data->employees_id);
                Session::put('username', $data->username);
                Session::put('login', TRUE);
                return redirect('/')->with('success', 'Login Berhasil!');
            } else {
                return redirect('Login')->with('alert', 'Password atau Email, Salah !');
            }
        } else {
            return redirect('Login')->with('alert', 'Password atau Email, Salah!');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('Login')->with('alert', 'Kamu sudah logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
