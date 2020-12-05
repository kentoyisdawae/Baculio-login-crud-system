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
    public function __construct(Request $request)
    {
        //
        $this->request = $request;
    }

    //

    public function page(){
        return view('login');
    }

    public function verify(){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = app('db')->select("SELECT * FROM tbluser WHERE username='$username'");
            $pass = app('db')->select("SELECT * FROM tbluser WHERE password='$password'");

            if(empty($user)){
                return "<script>alert('Wrong Username') </script> ". redirect()->route('login');
            }
            elseif(empty($pass)){
                return "<script>alert('Wrong Password') </script> ". redirect()->route('login');
            }else{
                 return "<script>alert('Welcome $username') </script> ". redirect()->route('login');
            }

    }
}
