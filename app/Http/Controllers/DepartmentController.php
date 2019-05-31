<?php

namespace App\Http\Controllers;

use App\content;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;

use App\Department;
use Session;
use App\User;
use App\Traits\UploadTrait;
use DB;


class DepartmentController extends Controller
{
    use UploadTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $content = Department::join('contents','contents.department_id','=','departments.department_id')
////            ->where('contents.department_id',$id)
//            ->count();
        $departments = Department::

            where('is_deleted','0')
            ->paginate(10);
        $users = User::
            where('is_deleted','0')
//            ->where('is_admin','0')
            ->paginate(10);
        $admin = User::
        where('is_deleted','0')
            ->where('is_admin','1')
            ->paginate(10);
       return view('admin.admin')->with('departments',$departments)
           ->with('users',$users)->with('admin',$admin);
    }
//    public function post($id){
//
//        $departments = Department::$manyMethods
//        return
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('department.create')->with('success','Department created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

        'department' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required'
        
            ]);
        $department = Department::all();
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $department->image = $filePath;
        }

//        dd($department->image);
        // Persist user record to database


            Department::create([

                'department_name' => $request['department'],
                'image' => $department->image ,
                 'description' => $request['description']
            ]);
            
            Session::flash('success','New department created');

            return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        Department::findOrFail($id);
        return view('department.edit')->with('departments',Department::where('is_deleted','0')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departments = Department::findOrFail($id);

        $departments->department_name = $request->department;
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $departments->image = $filePath;
        }
        $departments->description = $request->description;
        $departments->save();

        Session::flash('success','Updated Department successfully');
        
        return redirect()->route('departments.index')->with('success','Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        $department->is_deleted = 1;

        $department->save();
//        return response()->json([
//            'success' => 'Record deleted successfully!'
//        ]);
        Session::flash('success','Updated Department successfully');
        return redirect()->view('admin.admin')->with('success','Department deleted successfully!');
    }


    public function search(Request $request){

        $search = $request->search;
        $post = DB::table('departments')
            ->join('contents','contents.department_id','=','departments.department_id')
//            ->where(function($query2) use ($search){
//                $query2->

//            ->where('department_name', 'like', '%' .$search.'%')
//            ->where('is_deleted', '0')
//            ->paginate(10)->setpath('');
                ->where('department_name', 'like', '%' .$search.'%')
                    ->orWhere('description', 'like', '%' .$search.'%')
                    ->orWhere('title', 'like', '%' .$search.'%')
                    ->orWhere('body', 'like', '%' .$search.'%')
//            })
->get();
//        if( !count($post)){
//            return Response('<tr>
//                            <td align="center" colspan="3"> NO Records </td>
//                            </tr>');
//        }
//dd($post);
        return view('search')->with('post',$post);
    }


}
