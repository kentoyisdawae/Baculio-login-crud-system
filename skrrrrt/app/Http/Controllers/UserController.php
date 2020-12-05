<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Response;
use Api\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    //

    public function page(){
        return view('login');
    }
    public function crud(){
            $id = app('db')->select("SELECT id FROM login");
            $username = app('db')->select("SELECT username FROM login");
            $password = app('db')->select("SELECT password FROM login");
            
            

            $data = [
                'id'=>$id,
                'username'=>$username,
                'password'=>$password,
                
            ];
            return view('dashboard')->with($data);
    }

    public function verify(){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = app('db')->select("SELECT * FROM login");

            if(empty($user)){
                return "<script>alert('Wrong Credentials!') </script> ". redirect()->route('login');
            }
           else{
                 return "<script>alert('Welcome $username') </script> ". redirect()->route('dashboard');
            }

    }

    public function addUser(){
       
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        app('db')->table('login')->insert(['username' => $username, 'password' => $password ]);
        return redirect()->route('dashboard');
    }

    public function editUser(){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        
       app('db')->table('login')->where('id', $id)->update(['username' => $username, 'password' => $password ]);
       return redirect()->route('dashboard');
    }

    public function deleteUser(){
            $id = $_POST['delete-Id'];

            app('db')->table('login')->where('id', $id)->delete();
            return redirect()->route('dashboard');
    }
}
