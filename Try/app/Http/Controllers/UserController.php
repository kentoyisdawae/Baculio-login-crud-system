<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use mysqli;

class UserController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    // public function getUsers()
    // {
    //     $users = User::all();
    //     return response($users, 200);
    // }

    public function loginPage()
    {
        return view('login');
    }


    //USER VERIFICATION
    public function verifyUser()
    {

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $log = app('db')->select("select * from tbluser where username = '$user' and password = '$pass'");

        if (empty($log)) {
            echo '<script>alert("ERROR! WRONG INFO....")</script>';
            return view('login');
        } else {
            echo '<script>alert("SUCCESS....")</script>';
            return view('login');
        }
    }


    //New USER PAGE
    public function newUserPage()
    {
        return view('addUser');
    }

    //Insert USER 
    public function insertUser()
    {

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $insert = app('db')->select("insert into tbluser(username, password) values ('$user', '$pass')");
        echo '<script>alert("User added succesfully...")</script>';
        return view('login');
    }

    //Delete UserPage
    public function deleteUserPage()
    {

        return view('deleteUser');
    }

    //delete user button
    public function delete()
    {
        $ID = $_POST['id'];

        $check = app('db')->select("select * from tbluser where ID = '$ID'");

        if (empty($check)) {
            echo '<script>alert("User does not exist...")</script>';
            return view('deleteUser');
        } else {
            $query = app('db')->select("delete from tbluser where ID = '$ID'");
            echo '<script>alert("DELETED...")</script>';
            return view('deleteUser');
        }
    }

    //update user page
    public function updateUserPage()
    {
        return view('updateUser');
    }

    //update user button
    public function update()
    {

        $ID = $_POST['id'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $check = app('db')->select("select * from tbluser where ID = '$ID'");

        if (empty($check)) {
            echo '<script>alert("User that you want to update does not exist...")</script>';
            return view('updateUser');
        }else {
            app('db')->select("update tbluser set username = '$user', password = '$pass' where ID = '$ID'");
            echo '<script>alert("Update successful...")</script>';
            return view('updateUser');
        }
    }
}
