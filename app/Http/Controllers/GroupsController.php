<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Group;


class GroupsController extends Controller
{
    public function show()
    {
        $groups = Group::all();

        return view("groups.index", ["groups" => $groups]);
    }

    public function showDetails($id)
    {
        $group = Group::find($id);

        return view("groups.group", ["group"=>$group]);
    }
}
