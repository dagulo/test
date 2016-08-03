<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 8/3/2016
 * Time: 9:34 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends  Controller{

    public function login( Request $r )
    {
        /**
         * coming from a POST method
         * somebody is trying to login
         */
        if(  $r->isMethod( 'post' ) ){
            if( $user = \Auth::attempt( array( 'username' => $r->username, 'password' => $r->pwd  )  ) ){
                return redirect( 'employee' );
            }
        }
        return view('login');
    }
}