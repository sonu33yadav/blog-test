<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signUp()
    {
        return view('signUp');
    }
    public function blog()
    {
        $blog = Blog::paginate(10);
        return view('blog', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, User $user)
    {
        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;

        if (empty($name) || $name == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field name field is empty. Please provide a name value.',
            ]);
        }
        if (empty($email) || $email == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field email field is empty. Please provide a email value.',
            ]);
        }
        if (empty($password) || $password == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field password field is empty. Please provide a password value.',
            ]);
        }
        $emailCheck = User::where('email', $email)->first();
        if (empty($emailCheck)) {
            $ud             = [];
            $ud['name']     = $name;
            $ud['email']    = $email;
            $ud['password'] = Hash::make($password);
            $user->create($ud);
            return redirect()->back()->withErrors([
                'msg' => 'User registerd Sucessfully you can log in with your credientials',
            ]);
        } else {
            return redirect()->back()->withErrors([
                'msg' => 'Email is  alredy registered with us.',
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;
        if (empty($email) || $email == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field name field is empty. Please provide a name value.',
            ]);
        }
        if (empty($password) || $password == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field password field is empty. Please provide a password value.',
            ]);
        }
        $uDetails = User::where('email', $email)->first();
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route('blog');

        } else {
            return redirect()->back()->withErrors([
                'msg' => 'invalid Credentials',
            ]);
        }

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
