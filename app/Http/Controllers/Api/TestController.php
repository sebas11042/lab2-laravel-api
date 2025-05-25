<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profesor;

class TestController extends Controller
{
    public function index()
    {
        return Profesor::all(); // Sin auth ni request
    }
}
