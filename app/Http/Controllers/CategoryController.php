<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Datetime;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('category')->orderBy('id','DESC')->get();
        return view('cpadmin.modules.category.index',['category'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpadmin.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data =($request->except('_token'));
        // $data['name'] = trim($data['name']);
        // $data['name'] = str_replace(' ','-',$data['name']);
        $validatedData = $request->validate([
            'name' => 'bail|required|unique:category',
            //'description' => 'bail',
            ]);
         $data =($request->except('_token'));
        $data['name'] = trim($data['name']);
        $data['name'] = str_replace(' ','-',$data['name']);
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        // dd($data);
         DB::table('category')->insert($data); 

         return redirect()->route('admin.category.index');
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
        $cate = DB::table('category')->where('id',$id)->first();
        return view('cpadmin.modules.category.edit',['item'=>$cate]);
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
        $data['updated_at'] = new DateTime();
        $data['name'] = trim($data['name']);
        $data['name'] = str_replace(' ','-',$data['name']);
        CategoryController::changcategory($id,$data['name']);
        DB::table('category')->where('id',$id)->update($data); 

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryController::changcategory($id,' ');
        DB::table('category')->where('id',$id)->delete();

        return redirect()->route('admin.category.index');
    }

    public function changcategory($id,$change){
        $da = DB::table('category')->where('id',$id)->get();
        $name = $da[0]->name;
        $cate = DB::table('flim')->where('category', 'like', '%'.$name.'%')->get();
        if ($cate->count() == 0) {           
        } else {
            foreach($cate as $item){                
                DB::table('flim')->where('id',$item->id)->update(['category'=>str_replace($name,$change,$item->category)]);
            }
        }
    }
}
