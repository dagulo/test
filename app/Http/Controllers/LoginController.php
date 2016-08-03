<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 8/3/2016
 * Time: 9:34 AM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class LoginController extends  Controller{

    public function login()
    {
        return view('login');
    }
}