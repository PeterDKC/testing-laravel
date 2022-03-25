<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        return response()->json([
            'cats' => Cat::with('toys')->get(),
        ]);
    }
}
