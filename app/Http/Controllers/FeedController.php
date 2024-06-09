<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $groups = Group::with(['posts', 'posts.comments'])->where('id', '=', 8)->orWhere('id', '=', 4)->get();

        return view('index', ['groups' => $groups]);
    }
}
