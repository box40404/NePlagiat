<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Group;
use App\Models\Post;
use App\Models\PostImage;

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
        $posts = $group->posts()->latest()->get();

        return view("groups.group", ["group"=>$group, 'posts' => $posts]);
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
            'text' => 'required',
            'img' => 'array',
            'img.*' => 'image'
        ]);

        $post = new Post;

        $post->text = $formData['text'];
        $post->group_id = $id;
        $post->user_id = Auth::id();

        $post->save();

        if(isset($formData['img'])) {
            foreach($request->file('img') as $image){
                $postImage = new PostImage;

                $postImage->urn = Storage::url($image->store('public/posts/img'));
                $postImage->post_id = $post->id;

                $postImage->save();
            }
        }


        return redirect()->route('group_page', ['id' => $id]);
    }

}
