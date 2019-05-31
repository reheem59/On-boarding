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
            ->orderBy('comments.thread_id','asc')
            ->paginate(10);
            $departments = Department::where('is_deleted','0')->get();
            $tags = Tag::all();

        return view('threads.index',compact('threads','departments','tags','threads2','threads3'));
    }

    function fetch_data(Request $request)
    {
        if(Gate::allows('isStudent') ){
            abort(403);}

        try{

            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $list_by = $request->get('list_by');

                $query = str_replace(" ", "%", $query);

                $threads = DB::table('users')->join('comments','comments.user_id','=','users.user_id')
                    ->join('threads','threads.user_id','=','users.user_id')
                    ->where(function($query4) use ($list_by) {

                        $query4->where('tag_name', 'like', '%' . $list_by . '%');
                    })


                    ->where(function($query2) use ($query){

                        $query2->where('department_name', 'like', '%' . $query . '%')
                           ;
                    })

                    ->orderBy($sort_by, $sort_type)
                    ->paginate(10);

                if (!count($threads)) {
                    return Response('<tr>
                                <td align="center" colspan="9"> No Records Found </td>
                                </tr>');
                }
            }} catch (\Illuminate\Database\QueryException $e) {
            // something went wrong with the transaction, rollback
            DB::rollback();
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
            DB::rollback();
            abort(403);
        }

        return view('threads.tableajax', compact('threads'))->render();
    }
    

    public function create(){
        $tags = Tag::all();
        $departments = Department::all();

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
}
