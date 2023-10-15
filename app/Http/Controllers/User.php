<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class User extends Controller
{
    public function register(Request $request)
    {
        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $phoneno = $request->input('phoneno');
        $password = $request->input("password");
        $conf_password = $request->input("conf-password");
        $encryptedPassword = md5($password);
        $createdAt = date('Y-m-d H:i:s');
        $error = array();
        // Check for password match
        if($password == $conf_password) {
            $user = DB::table('user')->where('email', $email)->get();
            if (count($user) > 0) {
                $error['signup'] = "User already exists";
                return redirect()->route('register')->withErrors($error);
            }else {
                $data = array("full_name"=>$full_name, "email"=>$email, "phoneno"=> $phoneno, "password"=>$encryptedPassword, "created_at"=>$createdAt ) ;
                DB::table('user')->insert($data);

                //Add userid to session and coookies
                $user = DB::table('user')->where('email', $email)->get();

                //Add to session
                $request->session()->put('userId', $user[0]->id);

                return redirect()->route('homepage');
            }
            return $data;   
        }else{
            // echo "Password does not match";
            $error['password'] = "Password does not match";
            return redirect()->route('register')->withErrors($error);
        }
        
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $plainTextPassword = $request->input('password');

        $user = DB::table('user')->where('email', $email)->first();
        $error = array();

        if ($user) {
            // Hash the provided plain text password with MD5
            $hashedPassword = md5($plainTextPassword);

            // Compare the hashed password with the one stored in the database
            if ($hashedPassword === $user->password) {
                // Store user ID in the session
                $request->session()->put('userId', $user->id);

                return redirect()->route('homepage')->with('message', 'Login successful');
            } else {
                $error['login'] = "Invalid Credentials";
                return redirect()->route('login')->withErrors($error);
            }
        } else {
            $error['login'] = "Invalid Credentials";
            return redirect()->route('login')->withErrors($error);
        }
    }

    public function visitLogin(Request $request)
    {
        $request->session()->forget('adminId');
        $userId = $request->session()->get('userId');
        if($userId) {
            
            return redirect()->route('homepage');
        }else{
            return view('login');
        }
    }

    public function visitHomepage(Request $request)
    {
        $products = DB::table('product')->get();
        return view('homepage', ['products'=>$products]);
    }
}
