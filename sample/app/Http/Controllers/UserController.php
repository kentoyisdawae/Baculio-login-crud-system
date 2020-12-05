<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Infos;
use App\Traits\ApiResponser;  // <-- use to standardized our code for api response
use Illuminate\Support\Facades\DB;
Class UserController extends Controller {
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
        }

        public function getUsers(){

            $users = DB:: connection('mysql')
            ->select("Select * from tbluser");
            
            return response()->json($users, 200);
        }

        public function index(){
            $datas = $this->data->paginate(20);
            return $datas;
        }
        public function store(Request $request){
            $as = new User;

            $name = $request->name;
            $age = $request->age;
            $sex = $request->sex;
            $address = $request->address;
            $email = $request->email;
            $as->insert(['name'=> $name, 'age' => $age, 'sex' => $sex, 'address' => $address, 'email' => $email]);

            $as->save();
        }
        public function show($id){
            $data = $this->data->findOrFail($id);
    
            if(!$data){
                abort(404);
            }
            return $data;
        }
        public function update(Request $request, $id){
        

            $data = $this->data->findOrFail($id);
    
            if(!$data){
             abort(404);
            }
            $data->fill($request->all());
            $data->save();
    
            return $data;

        }
    
        public function destroy($id){
            $data = $this->data->find($id);
    
            if(!$data){
                abort(404);
            }
    
            $data->delete();
    
            return ['message' => 'Successfully deleted!','data_id' => $data];
    
        }
       
}