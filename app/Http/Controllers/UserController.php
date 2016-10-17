<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Storage;
use File;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email|unique:users',
    		'first_name' => 'required|max:120',
    		'password' => 'required|min:4'
    	]);

        $email = $request['email'];
        $password = $request['password'];
        $first_name = $request['first_name'];

        $user = new User();
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->first_name = $first_name;

        $user->save();

        //Auth::login($user);

        return redirect()->back();
    }

    public function postSignIn(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	$email = $request['email'];
        $password = $request['password'];

    	if(Auth::attempt(['email' => $email, 'password' => $password]))
    	{
           return redirect()->route('admin.index');
    	}
    	return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function getAccount()
    {       
        return view('admin.account',['user' => Auth::user()]);
    }

    public function postAccountSave(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'].'-'.$user->id.'.jpg';
        if($file)
        {
           Storage::disk('local')->put($filename,File::get($file));
        }

        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
}
