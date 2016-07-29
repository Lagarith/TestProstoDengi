<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
    public function show_AddForm()
    {
        return view('add_comment');
    }
    
    public function save(Request $request)
    {
        $all=$request->all();
        \App\Comment::create($all);
        
        return redirect()->route('index');        
    }
    
    
}
