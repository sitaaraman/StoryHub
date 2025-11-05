<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = $request->all();
        $userData['profile'] = '';

        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/profileimages'), $fileName);
            $userData['profile'] = $fileName;    
        }

        $user = User::create($userData);

        // dd($user);
        return redirect()->route('user.login');
    }

    public function login(){
        return view('user.login');
    }

    public function loginCheck(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        // if($user->email === $request->email && $user->password === $request->password)
        if($user)
        {
            $request->session()->put('user', $user);
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            return redirect()->route('user.index')->with('status', 'login');
        }

        return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('user.login')->with('status', 'Logged out successfully');
    }

    public function show($userId){

        $userData = User::where('id', $userId)->first();
        return view('user.show', compact('userData'));

    }

    public function edit($userId){

        $userData = User::where('id', $userId)->first();
        return view('user.edit', compact('userData'));
    }

    public function update(Request $request, $userId){

        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = $request->except(['_token' , 'exist_profile']);
        // $userData['profile'] = $request['exist_profile'];

        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/profileimages'), $fileName);
            $userData['profile'] = $fileName;
        }
        elseif ($request->has('exist_profile')) {
            // If no new profile uploaded, and an existing one is provided, use it
            $userData['profile'] = $request['exist_profile'];
        }

        $user = User::where('id', $userId)->update($userData);

        return redirect()->route('user.show', $userId);
    }

    public function destroy($userId){
        User::where('id', $userId)->delete();
        session()->flush();
        return redirect()->route('user.create');
    }
}
