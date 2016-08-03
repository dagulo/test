<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 8/3/2016
 * Time: 9:28 AM
 */

namespace App\Http\Controllers;

use App\Models\Employees\Employees;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employees::all();

        return view( 'employees.index' )
            ->with('employees' , $employees );
    }

    public function create()
    {
        return view( 'employees.employee_new' );
    }

    public function store( Request $r )
    {
        $rules = array(
            'position' => 'required'
        );

        $validator = Validator::make( $r->all() );

        if( $validator->fails()){
            return redirect('employee/new')
                ->withErrors( $validator )
                ->withInput();
        }

        // create a user account for employe

        $employee = new Employees();
        $employee->position = $r->position;
        $employee->save();

        return redirect('employee/index')
            ->withInput();
    }

}