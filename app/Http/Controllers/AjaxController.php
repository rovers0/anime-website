<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function loadallflim(Request $req ){
        $data = [];
        
        $data = $req->arr ;
        $startposition = ($req->num * 24) - 24;
        $endposition = $startposition + 24;
        if ($endposition > count($data)) {
           $endposition = count($data);
        } else {
            # code...
        }
        
        $xhmtl = null;
        for ($i = $startposition; $i < $endposition ;$i++ ){
         $xhmtl.=   '<li>
         <a class="movie-item m-block" title="'.$data[$i]['subname'].'" href="'.Route('page.inforpage',['id' =>$data[$i]['id']]).'">
             <div class="block-wrapper">
                 <div class="movie-thumbnail ratio-box ratio-3_4">
                     <div class="public-film-item-thumb ratio-content" style="background-image:url('.$data[$i]['image'].')"></div>
                 </div>
                 <div class="movie-meta">
                     <div class="movie-title-1">'.$data[$i]['name'].'</div>
                     <span class="fbcom-left">&nbsp;</span><span class="viewed-right">'.$data[$i]['total_views'].'</span>
                 </div>
             </div>
         </a>
     </li>';
        }
     
        return $xhmtl;
    }
    public function loadchat(Request $request){
        // $data =($request->except('_token'));
        // dd($data);
        $flim_id = $request->flim_id;
        $comment = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.flim_id',$flim_id)->orderBy('comment.created_at','DESC')->get();
        $xhtml = null;

        foreach ($comment as $com){
            if (Auth::check()) {
                if (Auth::user()->id == $com->user_id){
                    $xhtml.= '<div class="comment-item bg-white p-1" style="margin: 20px;border-radius: 5px;">
                    <div class="content" style="margin-left:10px; ">
                        <span class="text-primary" style="font-size: 16px;"><strong>'.$com->name.'</strong></span>
                        <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                        </div>  
                        <div class="content" style="margin:5px; color: black;border-radius: 5px; background-color: aquamarine;" >'.$com->content.'</div>                    
                        <button type="submit" id="'.$com->id.'" data="'.$com->flim_id.'" data-url="'.route('xoacomment').'" name="dbtn" class="dbtn btn btn-danger p-1" style="margin-left: 10px;font-size: 12px;" >Xóa</button>
                        </div>                        
                    </div>';
                }
                else{
                    $xhtml.= '<div class="comment-item bg-white p-1" style="margin: 20px; border-radius: 5px;">
                    <div class="content" style="margin-left:10px; ">
                        <span class="text-primary" style="font-size: 16px;"><strong>'.$com->name.'</strong></span>
                        <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                        </div>
                        <div class="content " style="margin:5px;color: black; border-radius: 5px; background-color: grey;" >'.$com->content.'</div>                    
                    </div>';
                }
            } else {
                $xhtml.= '<div class="comment-item bg-white p-1" style="margin: 20px; border-radius: 5px;">
                <div class="content" style="margin-left:10px; ">
                    <span class="text-primary" style="font-size: 16px;"><strong>'.$com->name.'</strong></span>
                    <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                    </div>
                    <div class="content " style="margin:5px;color: black; border-radius: 5px; background-color: grey;" >'.$com->content.'</div>                    
                </div>';
            }
            
            
            
    }
        return $xhtml;
    }

    public function addcomment(Request $request){
        $data =($request->except('_token'));
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $idflim = $data['flim_id'];
        $request['id'] =  $data['flim_id'];
       // dd($request);
        DB::table('comment')->insert($data);
        $xhtml = null;
        $xhtml = AjaxController::loadchat($request);
        //dd($xhtml);
        return $xhtml;
    }


    public function xoacomment(Request $request){
        $id = $request->idcm;     
        DB::table('comment')->where('id',$id)->delete();
        $xhtml = null;
        $xhtml = AjaxController::loadchat($request);
        //dd($xhtml);
        return $xhtml;
    }

    public function viewscount(Request $request){  
        $count = DB::table('chapter')->select('views')->where('id',$request->id)->first() ;
        $newviews = $count->views + 1;       
        DB::table('chapter')->where('id',$request->id)->update(['views' => $newviews]);
        return $newviews;
    }
    function searchflim(Request $request)
    {
        if($request->name)
        {
            $name = $request->name;
            $data = DB::table('flim')->where('name', 'like', '%'.$name.'%')->get(10);
            $xhtml = null;
            foreach($data as $d)
            {
               $xhtml .= '<li><a class="dropdown-item">'.$d->name.'</a></li>';
           }
           //dd($xhtml);
           return $xhtml;
       }
    }

}
