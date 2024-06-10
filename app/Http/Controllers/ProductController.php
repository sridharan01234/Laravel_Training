<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'Hello from ProductController index method';
    }

    public function show($id)
    {
        return "Hello from ProductController show method for product $id";  
    }

    public function create()
    {
        return 'Hello from ProductController create method';
    }

    public function store(Request $request)
    {
        return 'Hello from ProductController store method';
    }

    public function edit($id)
    {
        return "Hello from ProductController edit method for product $id";
    }

    public function update(Request $request, $id)
    {
        return "Hello from ProductController update method for product $id";
    }

    public function destroy($id)
    {
        return "Hello from ProductController destroy method for product $id";
    }

    
}
