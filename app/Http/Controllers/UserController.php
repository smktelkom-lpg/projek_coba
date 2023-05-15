<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Jangan lupa untuk mengimpor model User

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
}
