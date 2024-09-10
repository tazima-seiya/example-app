<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getUsers()
    {
        //dd(gettype(User::all()));
        return User::all();
    }
}
