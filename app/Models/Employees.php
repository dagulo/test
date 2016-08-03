<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class Employees extends Model{

    protected $table = 'employees';
    protected $primaryKey = 'employee_id';

    // do model stuff here

    private $errors = [];

    public function store( Request $r )
    {
        $validator = Validator::make( $r->all() );

        if( $validator->fails()){
            $this->errors = $validator->errors();
            return false;
        }

        // when adding an employee ,
        // create a user account first
        \DB::beginTransaction();

        $user = new Users();
        $user->name= $r->name;
        $user->username= $r->email;
        $user->password = \Hash::make( $r->pwd );
        try{
            $user->save();
        }catch( \Exception $e ){
            \DB::rollback();
            $this->errors[] = $e->getMessage();
            return false;
        }

        $this->position = $r->position;
        try{
            $this->save();
        }catch( \Exception $e ){
            \DB::rollback();
            $this->errors[] = $e->getMessage();
            return false;
        }

        \DB::commit();

        return $this;

    }

    public function getErrors()
    {
        return $this->errors;
    }
}