<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;

class GroupsController extends Controller
{
    public function show()
    {
        $groups = Group::all();

        return view("groups.index", ["groups" => $groups]);
    }

    public function showGroup($id)
    {
        $group = Group::find($id);

        return view("groups.group", ["group"=>$group]);
    }

    public function createForm() 
    {
        return view('groups.create-form');
    }

    public function createHandler(Request $request): RedirectResponse
    {
        $formData = $request->all();

        $group = new Group;

        $group->name = $formData['name'];
        $group->description = $formData['description'];
        $group->tags = $formData['tags'];
        $group->user_id = Auth::id();

        $group->save();

        return redirect()->route('group_page', ['id' => $group->id]);
    }
}
