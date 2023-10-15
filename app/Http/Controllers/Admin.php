<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function register(Request $request){
        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $phoneno = $request->input('phoneno');
        $password = $request->input("password");
        $conf_password = $request->input("conf-password");
        $encryptedPassword = md5($password);
        $createdAt = date('Y-m-d H:i:s');
        $error = array();

        if($password == $conf_password) {
            $admin = DB::table('admin')->where('email', $email)->get();
            if (count($admin) > 0) {
                $error['signup'] = "Admin already exists";
                return redirect()->route('adminregister')->withErrors($error);
            }else {
                $data = array("full_name"=>$full_name, "email"=>$email, "phoneno"=> $phoneno, "password"=>$encryptedPassword, "created_at"=>$createdAt ) ;
                DB::table('admin')->insert($data);

                //Add adminid to session and coookies
                $admin = DB::table('admin')->where('email', $email)->get();

                //Add to session
                $request->session()->put('adminId', $admin[0]->id);

                return redirect()->route('dashboard');
            } 
        }else{
            // echo "Password does not match";
            $error['password'] = "Password does not match";
            return redirect()->route('adminregister')->withErrors($error);
        }
    }

    public function login(Request $request){
        $email = $request->input('email');
        $plainTextPassword = $request->input('password');

        $admin = DB::table('admin')->where('email', $email)->first();
        $error = array();

        if ($admin) {
            // Hash the provided plain text password with MD5
            $hashedPassword = md5($plainTextPassword);

            // Compare the hashed password with the one stored in the database
            if ($hashedPassword === $admin->password) {
                // Store admin ID in the session
                $request->session()->put('adminId', $admin->id);
                return redirect()->route('dashboard')->with('message', 'Login successful');
            } else {
                $error['login'] = "Invalid Credentials";
                return redirect()->route('adminlogin')->withErrors($error);
            }
        } else {
            $error['login'] = "Invalid Credentials";
            return redirect()->route('adminlogin')->withErrors($error);
        }
    }

    public function visitLogin(Request $request){
        $adminId = $request->session()->get('adminId');
        if($adminId){
            return redirect()->route('dashboard');
        }else{
            return view("adminlogin");
        }
    }

    public function visitDashboard(Request $request){
        $adminId = $request->session()->get('adminId');
        if($adminId){
            return view("dashboard");
        }else{
            return redirect()->route('adminlogin');
        }
    } 
}
