<?php
 namespace App;

 use Illuminate\Database\Eloquent\Model;

 class User extends Model{

        protected $table = 'infos';
        // column sa table
        protected $fillable = [
        'name', 'age', 'sex', 'address', 'email'
    ];
}
 ?>