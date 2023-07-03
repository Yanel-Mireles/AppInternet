<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function inicio() {
        
        // Redireccionando
        return view('auth.principal');
    }
}
