<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function chalsim()
    {
        echo 'Hello';
    }
    public function index(): string
    {
        return view('welcome_message');
    }
}
