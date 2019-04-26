<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Thread;
use Auth;


class DiscussionController extends Controller
{
    public function index(){
        $threads = Thread::join('users','users.user_id','=','threads.user_id')
        ->join('departments','departments.department_id','=','threads.department_id')
        ->get();

        return view('discussions')->with('threads',$threads);
    }

    public function create(){

        return view('discuss');
    }
    public function store(Request $request){
        
        $threads = new Thread;

        $threads->title = $request->title;
        $threads->body = $request->content;
       
        $threads->user_id = Auth::user()->user_id;
        $threads->department_id = $request->department_id;

        $threads->save();

        return back();
    }

    public function show(Request $request, $id){

        $threads = Thread::join('users','users.user_id','=','threads.user_id')
        ->join('departments','departments.department_id','=','threads.department_id')
        ->where('thread_id',$id)
        ->first();

        return view('post')->with('threads' , $threads);
    }
}
