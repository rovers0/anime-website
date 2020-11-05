<?php
 namespace App\Http\ViewComposers;
 use Illuminate\Support\Facades\DB;
 use Datetime;
 use Illuminate\View\View;

 class MovieComposer
 {
     public $movieList ;
     public $year;
     public $randomflim;
     public $topcmt;
     public $toptotalviews;
     public $topchapviews;
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {  
        
        $this->movieList =  DB::table('category')->orderBy('id','DESC')->get();
        $this->year = DB::table('flim')->select('year')->orderBy('year','DESC')->distinct()->get();
        $this->randomflim = DB::table('flim')->inRandomOrder()->limit(10)->get();
        $this->toptotalviews = DB::table('flim')->orderBy('total_views','DESC')->take(10)->get();
        $countcmt =  DB::table('comment')
            ->select('flim_id', DB::raw('COUNT(*) as total_cmt'))
            ->groupBy('flim_id')
            ;
        $this->topcmt = DB::table('flim')
            ->joinSub($countcmt, 'countcmt', function ($join) {
                $join->on('flim.id', '=', 'countcmt.flim_id');
            })
            ->orderby('total_cmt','DESC')
            ->take(10)
            ->get();
        
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $view->with('listcategory', end($this->movieList));
        $view->with('listyear', end($this->year));
        $view->with(['rdflim'=>$this->randomflim]);
        $view->with(['topviews'=>$this->toptotalviews,'topcomment'=>$this->topcmt]);
     }
 }