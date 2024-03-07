<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Group;
use App\Models\Post;


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

    public function createPostForm($id)
    {
        return view('groups.create-post-form', ['group_id' => $id]);
    }

    public function createPostHandler(Request $request, $id): RedirectResponse
    {
        $formData = $request->validate([
            'text' => 'required'
        ]);

        $post = new Post;

        $post->text = $formData['text'];
        isset($formData['img']) ? $post->img = $formData['img'] : null;
        $post->group_id = $id;
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('group_page', ['id' => $id]);
    }
}
