<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo "This is a User Area";
    }

    public function getAllUsers()
    {
        echo "Show all users";
    }

}
