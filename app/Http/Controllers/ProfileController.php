<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cate=DB::table('users')->where('id',$id)->first();
        return view('flim.viewprofile',['item'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=DB::table('users')->where('id',$id)->first();
        return view('flim.changepassword',['item'=>$profile]);
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
        $validatedData = $request->validate([
            'name' => 'bail|required|max:255',
            'birthday'=>'bail|required',
            'phone'=>'bail|required',
            'address'=>'bail|required'
        ]);
        $data=($request->Except('_token'));
        $data['updated_at']=new datetime();
        DB::table('users')->where('id',$id)->update($data);
        return redirect()->back()->with('alert','Thông tin của bạn đã được ghi nhận');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'curpassword'=> 'required',
            'newpassword' => 'required|min:8',
            'password_confirmation'=> 'required|same:newpassword'
        ]);
        $user = Auth::user();

        $curPassword = $request->curpassword;
        $newPassword = $request->newpassword;
            
            if (Hash::check($curPassword, $user->password)) {
            
                $user_id = $user->id;
               
                DB::table('users')->where('id',$user_id)->update(['password'=>Hash::make($newPassword)]);
                return redirect()->back()->with('alert','Thông tin của bạn đã được ghi nhận');
            }
            else
            {
                return redirect()->back()->with('alert','Mật khẩu không trùng khớp ');
            }
            
        
    
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
