<?php namespace App\Controllers;

class User extends BaseController
{
    public function dashboard()
    {
        return view('user/dashboard');
    }
}
