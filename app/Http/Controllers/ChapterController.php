<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jwplayer;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
class ChapterController extends Controller
{
    
    private static $client = '';
    private static $serect = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('chapter')->orderBy('id','DESC')->get();
        foreach( $data as $value ){
            $flim = DB::table('flim')->where('id',$value->flim_id)->first();          
            $value->name = $flim->name;
        }
       
        return view('cpadmin.modules.chap.index',['chapter'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('flim')->orderBy('name','ASC')->get();
    
        return view('cpadmin.modules.chap.create',['flim'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'title' => 'bail|required|string',
            'chap' => 'bail|required|not_in:0',
            'flim_id' => 'bail|required',
            'content' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|required|max:100000',
            ]);
        $data =($request->except('_token'));
        $flim = DB::table('flim')->select('name')->where('id',$data['flim_id'])->first();
       
    //    $jwplatform_api = new Jwplayer\JwplatformAPI('7O8Qgq2m', 'uT2IyjXQsc9C3ezF2noBgNEc');
       $jwplatform_api = new Jwplayer\JwplatformAPI(ChapterController::$client, ChapterController::$serect);
        $target_file = $data['content']->getRealPath();
        $params = array();
        $params['title'] =$flim->name."-".$data['chap'];
        $params['description'] = $data['title'];
        
        // Create video metadata
        $create_response = json_encode($jwplatform_api->call('/videos/create', $params));
        $decoded = json_decode(trim($create_response), TRUE);
        $upload_link = $decoded['link'];

        $upload_response = $jwplatform_api->upload($target_file, $upload_link);

       // dd($upload_link);
        $link = $upload_response['media']['key'];
        $data['title']= $flim->name."-".$data['title'];
        $data['content'] = $link;
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
       // dd($data);
        DB::transaction(function () use($data) {
            DB::table('flim')->where('id',$data['flim_id'])->update(['updated_at'=>$data['updated_at']]); 
            DB::table('chapter')->insert($data); 
        });
        $usersubrice = DB::table('users')->join('boxflim', 'users.id', '=', 'boxflim.user_id')->where('boxflim.flim_id',$data['flim_id'])->get(); 
        $link =  route('page.chapvideo',['id'=>$data['flim_id']]);
        $emails = array();
         foreach($usersubrice as $user){
            array_push($emails,$user->email);
         }
         Mail::send('mail', ['link' =>$link ], function ($message) use ($request, $emails)
         {
             $message->from('no-reply@AnimeSQL.com', 'NkatWang');
 //            $message->to( $request->input('email') );
             $message->to( $emails);
             //Add a subject
             $message->subject("AnimeSQL Thông Báo");
         });
        return redirect()->route('admin.chapter.index');
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
       
            $data = DB::table('flim')->orderBy('created_at','DESC')->get();
            $chap = DB::table('chapter')->where('id',$id)->first();
        return view('cpadmin.modules.chap.edit',['flim'=>$data,'chapter'=>$chap]);
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
        $data =($request->except('_token'));
        $flim = DB::table('flim')->select('name')->where('id',$data['flim_id'])->first();
        $content = DB::table('chapter')->select('content')->where('id',$id)->first();
        if (isset($data['content'])) {
            $jwplatform_api = new Jwplayer\JwplatformAPI('7O8Qgq2m', 'uT2IyjXQsc9C3ezF2noBgNEc');

            $target_file = $data['content']->getRealPath();
            $params = array();
            $params['title'] =$flim->name."-".$data['chap'];
            $params['description'] = $data['title'];
            
            // Create video metadata
            $create_response = json_encode($jwplatform_api->call('/videos/create', $params));
            $decoded = json_decode(trim($create_response), TRUE);
            $upload_link = $decoded['link'];

            $upload_response = $jwplatform_api->upload($target_file, $upload_link);
            $link = $upload_response['media']['key'];
            $data['content'] = $link;
        } else {
            $data['content'] = $content->content;
        }
        
        $data['updated_at'] = new DateTime();
       // dd($data);
        DB::transaction(function () use($data,$id) {
           
            DB::table('flim')->where('id',$data['flim_id'])->update(['updated_at'=>$data['updated_at']]); 
            DB::table('chapter')->where('id',$id)->update($data); 
        });
        return redirect()->route('admin.chapter.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('chapter')->where('id',$id)->delete();

        return redirect()->route('admin.chapter.index');
    }
}
