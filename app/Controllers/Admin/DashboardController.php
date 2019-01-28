<?php

namespace App\Controllers\Admin;

use App\Classes\Request;
use App\Classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        Session::add('admin', 'You are welcome, admin user');
        if (Session::has('admin')) {
            $msg = Session::get('admin');
        } else {
            $msg = 'Not defined';
        }
        return view('admin/dashboard', ['admin' => $msg]);
    }
    public function get()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            var_dump($request->product);
        } else {
            var_dump('posting doesnt exists');

        }
    }
}