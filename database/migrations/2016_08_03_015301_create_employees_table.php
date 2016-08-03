<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'employees' , function( Blueprint $table ){
            $table->increments( 'employee_id' );
            $table->string( 'position' );
            $table->foreign( 'user_id' )->references('id')
                ->on('users')->onDelete( 'cascade' );
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
