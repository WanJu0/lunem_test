<?php

namespace App\Http\Controllers;

use App\Models\Fib;

class ExampleController extends Controller
{
    public function show($id)
    {
        $fib = new Fib();
        return $fib->calc($id);
    }
}
