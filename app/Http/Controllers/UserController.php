<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::where('user_id',Auth::user()->user_id)->findOrFail($id);
        return view('user.user_profile.view_profile')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,[
            'username' => '',
            'email' => 'email|unique:users',
            
        ]);


        $user = User::where('user_id',Auth::user()->user_id)->findOrFail($id);
if($request->username != null){
    $user->user_name = $request->username;
}if($request->email != null){
    $user->email = $request->email;
}if($request->password != null){
    $user->password = bcrypt($request->password);
}
$user->save();
    return back();
        
        
        
        
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->is_deleted = 1;

        $user->save();
//        return response()->json([
//            'success' => 'Record deleted successfully!'
//        ]);
        Session::flash('success','Updated User successfully');
        return redirect()->back()->with('success','User deleted successfully!');
    }

    // SEARCH FUNCTION FOR LIVE SEARCHING
    public function search(Request $request)
    {

        $output = '';
        if($request->ajax()) {
            $query = $request->get('query');

            if($query != '') {
                $data = DB::table('users')
                    ->where('user_name', 'like', '%' .$query.'%')->orWhere('email', 'like', '%' .$query.'%')
                    ->where('is_deleted', '0')
                    ->paginate(10)->setpath('');

                if( !count($data)){
                    return Response('<tr>
                            <td align="center" colspan="3"> NO Records </td>
                            </tr>');
                }

            }

            else {
                $data = DB::table('users')
                    ->where('user_name', 'like', '%' .$query.'%')->orWhere('email', 'like', '%' .$query.'%')
                    ->where('is_deleted', '0')

                    ->orderBy('user_name', 'desc')
                    ->paginate(10)->setpath('');
                if( !count($data)){
                    return Response('<tr>
                            <td align="center" colspan="3"> NO records </td>
                            </tr>');
                }
            }

            if($data) {
                foreach($data as $user) {
                    $output .= '<tr class="table-light clickable-row" data-href="#">
                                        <th scope="row" href="Thread.html">'.$user->user_name.'</th>
                                        <td>'.$user->email.'</td>
                                        <td class="text-center"><button  class="btn btn-danger ml-2 deleteUser" data-id=" '.$user->user_id .'" >Delete</button></td>
                                    </tr>';
                }
            }
            else {
                $output .= '<tr>
                                <td align="center" colspan="3"> NO DATA </td>
                            </tr>
                            ';
            }
        }



        return Response($output);



    }
}
