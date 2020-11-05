<?php

namespace App\Http\Controllers;
use App\Services\ImgurService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FlimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('flim')->orderBy('id','DESC')->get();
    
        return view('cpadmin.modules.flim.index',['flim'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.flim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        // $data['image']->move(public_path('img'), $imageName);
        // $videoName = time().'.'.$data['video']->getClientOriginalExtension();
        // $data['video']->move(public_path('video'), $videoName);
  
        //     var_dump($imageName);
        //     dd($videoName);
        // return back()

        //     ->with('success','You have successfully upload image.')

        //     ->with('image',$imageName);
        // $image = $data['image'];
        $validatedData = $request->validate([
        'name' => 'bail|required|max:250',
        'subname' => 'bail',
        'total_chap' => 'bail|integer|gt:0',
        'description' => 'bail|required|min:8',
        'category' => 'bail|required',
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000',
        ]);
        $data =($request->except('_token'));
        //dd($data['category']);
        $sub = "";
        $test =$data['category'];
            foreach ($test as $key => $value) {
                $sub = $sub."{$value} " ;
        }
        $data['category'] = $sub;
       
        $image = $data['image'];
       //    dd($image->getRealPath());
        // call service to upload image to imgur.com
        $imageUrl = ImgurService::uploadImage($image->getRealPath());
        $data['image'] = $imageUrl;
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
       
         DB::table('flim')->insert($data); 
         return redirect()->route('admin.flim.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //this funcition show in flie index karmen rider botpage
    public function show()
    {
        $data = DB::table('flim')->orderBy('updated_at','DESC')->get()->take(28);
        $kamenmovie = DB::table('flim')->where('category', 'like', '%Kamen-Rider%')->get()->take(8);
        return view('index',['collectionlastmovie'=>$data,'kamenrider'=>$kamenmovie]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flim = DB::table('flim')->where('id',$id)->first();
        return view('cpadmin.modules.flim.edit',['flim'=>$flim]);
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
        $obj = DB::table('flim')->select('image')->where('id',$id)->first();
        
        $data =($request->except('_token'));
        $sub = "";
        $test =$data['category'];
            foreach ($test as $key => $value) {
                $sub = $sub."{$value} " ;
        }
        $data['category'] = $sub;
        if(isset($data['image'])){
            $image = $data['image'];
            $imageUrl = ImgurService::uploadImage($image->getRealPath());
            $data['image'] = $imageUrl;
        }
        else{
            $data['image'] = $obj->image;
        }
        $data['updated_at'] = new DateTime();
       
         DB::table('flim')->where('id',$id)->update($data); 
         return redirect()->route('admin.flim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use($id) {
        DB::table('boxflim')->where('flim_id',$id)->delete();
        DB::table('chapter')->where('flim_id',$id)->delete();
        DB::table('flim')->where('id',$id)->delete();
        });
        return redirect()->route('admin.flim.index');
    }
}
