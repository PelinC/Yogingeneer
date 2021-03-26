<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Post;
use App\Models\Model\Project;

class Dashboard extends Controller
{
    public function index(){
        $posts=Post::all()->count();
        $projects=Project::all()->count();
        $hit=Project::sum('hit')+Post::sum('hit');

        return view('back.dashboard',compact('posts','projects','hit'));
    }
}
