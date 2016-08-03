<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 8/3/2016
 * Time: 9:28 AM
 */

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

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

        $employee = new Employees();

        if( ! $employee->store( $r  ) ){
            return redirect('employee')
                ->with( 'error' , $employee->getErrors() );
        }

        return redirect('employee/index')
            ->withInput();
    }

    public function delete( Request $r )
    {
        if( ! $e = Employees::find( $r->employee_id ) ){
            return redirect('employee')
                ->with( 'error' , 'Employee for deletion not found' );
        }

        $e->delete();

        return redirect( 'employee/index' );
    }

}