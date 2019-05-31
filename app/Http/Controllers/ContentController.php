<?php

namespace App\Http\Controllers;

use App\Department;
use App\Thread;
use Illuminate\Http\Request;
use App\Content;
use Auth;

class ContentController extends Controller
{
    public function index($id)
    {
        $department = Department::where('is_deleted','0')->where('department_id',$id)->first();
        $contents = Content::where('department_id',$department->department_id)->paginate(5);
        return view('department.post.post',compact('department','contents'));
    }

    public function create(){
        $departments = Department::where('is_deleted','0')->get();
        return view('department.post.content',compact('departments'));
    }
    public function store(Request $request){

        $contents = new Content;

        $contents->title = $request->title;
        $contents->body = $request->content;

        $contents->user_id = Auth::user()->user_id;
        $contents->department_id = $request->department_id;

        $contents->save();

        return back()->with('success','Content created successfully!');
    }

    public function show($id){

        $content = Content::findOrFail($id);
//            dd($content);

        return view('discussions')->with('content' , $content);
    }
    public function list($id)
    {$department = Department::where('is_deleted','0')->where('department_id',$id)->first();
        $contents = Department::join('contents','contents.department_id','=','departments.department_id')
            ->where('departments.department_id',$id)
            ->get();
//        $contents = Content::where('department_id',)->all();
//        dd($contents);

        return view('post',compact('contents','department'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $content->title = $request->title;

        $content->body = $request->body;
//        dd($request);
        $content->save();



        return redirect()->back()->with('success','Content updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);

        ;

        return redirect()->route('admin')->with('success','Content deleted successfully!');
    }


}
