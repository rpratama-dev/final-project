<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function create($idq) {
        return view ('answers.create');
    }
}
