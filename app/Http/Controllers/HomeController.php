<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Datetime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('flim')->orderBy('updated_at','DESC')->get()->take(28);
        $kamenmovie = DB::table('flim')->where('category', 'like', '%Kamen-Rider%')->get()->take(8);
        return view('index',['collectionlastmovie'=>$data,'kamenrider'=>$kamenmovie]);  
    }
    public function home(){
        $data = DB::table('flim')->orderBy('created_at','DESC')->take(5)->get();
        $count['flim'] = DB::table('flim')->count();
        $count['chapter'] = DB::table('chapter')->count();
        $count['uers'] = DB::table('users')->where('lv','<',9)->count();
        $count['cmt'] = DB::table('comment')->count();
        $count['date'] = date("d/m/Y");
        $count['time'] =  date("h:i:sa");
        // dd($count);
        return view('cpadmin.modules.Dashboard',['flim'=>$data,'count'=>$count]);
    }
}
