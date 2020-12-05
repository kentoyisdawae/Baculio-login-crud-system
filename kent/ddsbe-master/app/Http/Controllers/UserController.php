<?php

namespace App\Http\Controllers;

//use App\User;
use App\Models\User;  // <-- your model
use Illuminate\Http\Response;
use App\Traits\ApiResponser;  // <-- use to standardized our code for api response
use Illuminate\Http\Request;  // <-- handling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen


Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){

        // eloquent style
        // $users = User::all();

        // sql string as parameter
        $users = DB::connection('mysql')
        ->select("Select * from tbluser");

        // return response()->json($users, 200);
        return $this->successResponse($users);
    }
    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        // return $users; // <-- not standardized return of data
        // return $this->successResponse($users);
        //return response()->json($users, 200);
        return $this->successResponse($users);
    }

    public function addUser(Request $request ){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());

        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one author
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {

         $user = User::findOrFail($id);
         return $this->successResponse($user);
         
        // old code 
        /*
        $user = User::where('userid', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
        */
    }

    /**
     * Update an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
        'username' => 'max:20',
        'password' => 'max:20',
        'gender' => 'in:Male,Female',
        ];

        $this->validate($request, $rules);
        $user = User::findOrFail($id);
            
        $user->fill($request->all());

        // if no changes happen
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
       
        // old code
        /*
            $this->validate($request, $rules);
            //$user = User::findOrFail($id);
            $user = User::where('userid', $id)->first();
            if($user){
                $user->fill($request->all());

                // if no changes happen
                if ($user->isClean()) {
                    return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $user->save();
                return $this->successResponse($user);
            }
            {
                return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
            }
        */
    }

       /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);

        // old code 
        /*
        $user = User::where('userid', $id)->first();
        if($user){
            $user->delete();
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
        */
    }

}



