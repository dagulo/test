<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class EmployeeTest extends TestCase
{

    public function testAddNewEmployee()
    {
        // set the db connection to use the test db
        \Config::set('database.connections.master', \Config::get( 'database.connections.sql_lite') );

        $r = new \Illuminate\Http\Request();
        // use Faker to add fake users
        $faker = Faker\Factory::create();

        $pwd = \Hash::make( $faker->password );
        $r->request->add([ 'name' => $faker->name , 'email' => $faker->unique()->email ,
         'username' => $faker->userName , 'pwd' => $pwd , 'position' => 'COO' ]);

        $employee = new \App\Models\Employees();
        $response = $employee->store( $r );

        $this->assertInstanceOf( '\App\Models\Employees' , $response );

    }


}