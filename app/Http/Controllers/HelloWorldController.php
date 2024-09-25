<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello(Request $request, string $name) {
        return response()
            ->json([
                "oi" => "Hello World ${name}",
                "tchau" => $request->all()
            ]);
    }
}
