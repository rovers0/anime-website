<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoxflimController extends Controller
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
        $data =($request->except('_token'));
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        //dd($data);
        DB::table('boxflim')->insert($data);
        //$data = DB::table('flim')->where('id',$data->id)->first();      
        //return view('flim.infor',['flim'=>$data]);
        return redirect()->back() ->with('alert', 'Bạn thêm phim vào tủ thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('flim')->join('boxflim', 'flim.id', '=', 'boxflim.flim_id')
        ->select('flim.*', 'boxflim.id', 'boxflim.flim_id', 'boxflim.user_id')
        ->where('boxflim.user_id',$id)
        ->orderBy('flim.updated_at','DESC')->get();   
        //dd($data);
        return view('flim.index',['boxflim'=>$data]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $getid = DB::table('boxflim')->where('id',$id)->first();
        $user_id = $getid->user_id;
        DB::table('boxflim')->where('id',$id)->delete();
        
        $data = DB::table('flim')->join('boxflim', 'flim.id', '=', 'boxflim.flim_id')->select('flim.*', 'boxflim.id', 'boxflim.flim_id', 'boxflim.user_id')->where('boxflim.user_id',$user_id)->orderBy('flim.updated_at','DESC')->get();   
        //dd($data);
        //return view('boxflim.index',['boxflim'=>$data]);
        return redirect()->route('user.boxindex',['id'=>$user_id]);
    }

    
    
}
