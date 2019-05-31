<?php

namespace App\Http\Controllers;

use App\content;
use App\Department;
use App\Thread;
use Illuminate\Http\Request;
use App\Tag;
use App\User;
use App\Treads_tag;


use DB;

use Auth;
class ThreadController extends Controller
{
    public function index(){

$threads = DB::table('users')
            ->join('comments','comments.user_id','=','users.user_id')
            ->join('threads','threads.user_id','=','users.user_id')
            ->orderBy('threads.rate','desc')
            ->paginate(10);
//            dd($threads);

            $threads2 = DB::table('users')
                ->join('comments','comments.user_id','=','users.user_id')
                ->join('threads','threads.user_id','=','users.user_id')
                ->orderBy('threads.created_at','desc')
                ->paginate(10);


        $threads3 = DB::table('users')
            ->join('comments','comments.user_id','=','users.user_id')
            ->join('threads','threads.user_id','=','users.user_id')
//            ->withCount('comments.thread_id')
            ->orderBy('comments.thread_id','desc')
            ->paginate(10);
            $departments = Department::where('is_deleted','0')->get();
            $tags = Tag::all();

        return view('threads.index',compact('threads','departments','tags','threads2','threads3'));
    }


    

    public function create(){
        $tags = Tag::all();
        $departments = Department::where('is_deleted','0')->get();

        return view('threads.create_a_question',compact('tags'));
    }
    public function store(Request $request){
dd($request);
        $threads = new Thread;

        if ($request->inputTag !== null) {
            $tags = new Tag;

            $tags->tag_name = $request->inputTag;

            $tags->save();

        } else {

        }
        $threads->title = $request->title;
        $threads->body = $request->body;

        $threads->user_id = Auth::user()->user_id;
        $threads->department_id = $request->department_id;

        $threads->save();

        return back();
    }

    public function show( $id){

        $threads = Thread::join('users','users.user_id','=','threads.user_id')
            ->join('departments','departments.department_id','=','threads.department_id')
            ->where('threads.thread_id',$id)->
            where('departments.is_deleted','0')
            ->first();

        return view('show')->with('threads' , $threads);
    }

    public function indexAdmin(){

        $threads = DB::table('users')
            ->join('comments','comments.user_id','=','users.user_id')
            ->join('threads','threads.user_id','=','users.user_id')
            ->orderBy('threads.rate','desc')
            ->paginate(10);
//            dd($threads);

        $threads2 = DB::table('users')
            ->join('comments','comments.user_id','=','users.user_id')
            ->join('threads','threads.user_id','=','users.user_id')
            ->orderBy('threads.created_at','desc')
            ->paginate(10);


        $threads3 = DB::table('users')
            ->join('comments','comments.user_id','=','users.user_id')
            ->join('threads','threads.user_id','=','users.user_id')
//            ->withCount('comments.thread_id')
            ->orderBy('comments.thread_id','desc')
            ->paginate(10);
        $departments = Department::where('is_deleted','0')->get();
        $tags = Tag::all();

        return view('threads.index',compact('threads','departments','tags','threads2','threads3'));
    }
}
