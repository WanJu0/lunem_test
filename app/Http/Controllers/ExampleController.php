<?php

namespace App\Http\Controllers;

use App\Models\Fib;

class ExampleController extends Controller
{
    /**
     * @var \App\Models\Fib
     */
    private $fib;

    public function __construct(Fib $fib)
    {
        $this->fib = $fib;
    }

    public function show($id)
    {
        return $this->fib->calc($id);
    }
}
