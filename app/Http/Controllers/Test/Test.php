<?php

namespace App\Http\Controllers\Test;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Test extends Controller
{
    # get test
    public function index()
    {
        $usr = new User();
        dd($usr);

    }

    # get test/{id}
    public function show($id)
    {
        echo "get test/$id show";
    }


    # get test/create
    public function create()
    {
        echo "get test/create create";
    }

    # post test
    public function store(Request $request)
    {
        dd($request->all());
    }

    # get test/{id}/edit
    public function edit($id)
    {
        echo "get test/$id/edit";
    }

    # put test/{id}
    public function update(Request $request, $id)
    {
        //
    }

    # delete test/{test}
    public function destroy($id)
    {
        //
    }
}
