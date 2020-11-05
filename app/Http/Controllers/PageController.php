<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inforpage($id)
    {
        $data = DB::table('flim')->where('id',$id)->first();
        $chap = DB::table('chapter')->where('flim_id',$id)->orderBy('updated_at','DESC')->get()->take(5);
        $data2 = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.flim_id',$id)->orderBy('comment.created_at','DESC')->get();
        if (isset($data)) {
            return view('flim.infor',['flim'=>$data,'chap'=>$chap, 'comment'=>$data2    ]);
        } else {
            return view('404');
        }
        
        
    }

    public function show()
    {
        $data = DB::table('flim')->orderBy('updated_at','DESC')->get();
        $title = "Tẩt Cả Phim - Anime SQL";
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }

    public function mostflimviews(){
        $data = DB::table('flim')->orderBy('total_views','DESC')->get();
        $title = "Phim xem nhiều nhất  - Anime SQL";
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }

    public function pagecate($name){
        $data = DB::table('flim')->where('category', 'like', '%'.$name.'%')->get();
        $title = "THỂ LOẠI PHIM :".str_replace('-',' ',$name)." - Anime SQL";
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }

    public function yearpage($year){
        $data = DB::table('flim')->where('year',$year)->orderBy('updated_at','DESC')->get();

        $title = "Năm Sản Xuất :".$year." - Anime SQL";
  
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }

    public function statuspage($status){
        $data = DB::table('flim')->where('status',$status)->orderBy('updated_at','DESC')->get();
        if ($status == 0) {
            $title = "Phim đã Hoàn Thành - Anime SQL";
        } else {
            $title = "Phim chưa hoàn Thành - Anime SQL";
        }
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }
    public function videopage($id){
        $idflim = $id;
        $data = DB::table('chapter')->where('flim_id',$id)->orderBy('updated_at','DESC')->first();
        $listchaprcm = DB::table('chapter')->where('flim_id',$id)->orderBy('updated_at','DESC')->get();
        $title = DB::table('flim')->where('id',$id)->first();
        $data2 = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.flim_id',$id)->orderBy('comment.created_at','DESC')->get();
        if (isset($data)) {
            return view('flim.player',['item'=>$data,'title'=>$title, 'comment'=>$data2, 'id'=>$idflim , 'list'=>$listchaprcm]);
        } else {        
            
            return view('flim.player');
        }
        
        
    }
    public function videobychap($id){
        $idflim = $id;
        $data = DB::table('chapter')->where('flim_id',$id)->orderBy('updated_at','DESC')->first();
        $title = DB::table('flim')->where('id',$id)->first();
        $listchaprcm = DB::table('chapter')->where('flim_id',$data->flim_id)->orderBy('updated_at','DESC')->get();
        $data2 = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.flim_id',$id)->orderBy('comment.created_at','DESC')->get();
        if (isset($data)) {
            return view('flim.player',['item'=>$data,'title'=>$title, 'comment'=>$data2, 'id'=>$idflim , 'list'=>$listchaprcm]);
        } else {
            return view('flim.player');
        }
        
        
    }
    
    public function faq(){
        return view('flim.faq');
    }

    public function sort(Request $request)
    {
        $status = [];
        $year = [];
        $cate = [];
        $sort ;
        $data =($request->except('_token'));
        if (count($data)==0) {
            return redirect()->route('page.show')   ;
        } else {
            // dd($data["status"]);
            if (isset($data["status"])) {
                array_push($status,['status', $data["status"]]);
            } else {
                array_push($status,['status', '<>', 'null']);

            }
            if (isset($data["year"])) {
                array_push($year,['year', $data["year"]]);
            } else {
                array_push($year,['year', '<>', 'null']);
            }
            if (isset($data["sort"])) {
                $sort = $data["sort"];
            } else {
                $sort = 'updated_at';
            }
            if (isset($data["category"])) {
                $categorylist = ($request['category']);
                foreach ($categorylist as $key => $value) {
                    array_push($cate,['category', 'like', '%'.$value.'%']);
                }
            } else {
                array_push($cate,['category', '<>', 'null']);
            }
            
           $dulieu = DB::table('flim')
            ->where($status)
            ->where($year)
            ->where($cate)
           ->orderBy($sort,'DESC')->get();
         //   dd($dulieu);
            $title = "  Bộ Lọc - Anime SQL";
            return view('flim.category',['listflim'=>$dulieu,'title'=>$title]);
        }
        
       
    }
    public function search(Request $request)
    {
        $name = $request->name;
        $data = DB::table('flim')->where('name', 'like', '%'.$name.'%')->orderBy('updated_at','DESC')->get();
        $title = "Tìm phim theo tên - Anime SQL";
        //dd($name);
        return view('flim.category',['listflim'=>$data,'title'=>$title]);
    }
    public function autocomplete(Request $request)
    {
        $data = DB::table('flim')->select('name', 'total_chap')->where('name', 'like','%'.$request->name.'%')->get();
        
        return response()->json($data);
    }
    
}
