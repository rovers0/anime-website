@extends('welcome')
@section('top-content')
<div class="movie-info">
    <div class="block-movie-info movie-info-box">
        <div class="block-wrapper page-single" itemscope="" >
            <!-- Thông tin phim -->
            <div class="movie-info">
                <div class="block-movie-info movie-info-box">
                    <div class="row">
                        <div class="col-md-6  movie-detail">
                            <h1 class="movie-title"><span class="title-1" itemprop="name">{{$flim->name}}</span><span class="title-2" itemprop="name">{{$flim->subname}}</span><span class="title-year"> ({{date("d/m/Y",strtotime($flim->created_at))}})</span></h1>
                            <div class="movie-meta-info" style="min-height: 250px">
                                <dl class="movie-dl">
                                    <dt class="movie-dt">Trạng thái: </dt>
                                    <dd class="movie-dd imdb">
                                        @if ($flim->status == 0)
                                            Hoàn Thành
                                        @else
                                            Chưa Hoàn Thành                                            
                                        @endif    
                                    </dd>
                                    <br>
                                    <dt class="movie-dt">Thể loại: </dt>
                                    <dd class="movie-dd dd-cat">
                                        @foreach( explode(' ', $flim->category) as $sub)
                                            @if (strlen($sub) > 0)
                                            <a  href="{{Route('page.pagecate',['name'=>$sub])}}">{{ str_replace('-',' ',$sub)}}</a> &nbsp;
                                            {{-- <a  href="/page/category/{{$sub}}">{{ str_replace('-',' ',$sub)}}</a>, --}}
                                            @else
                                                
                                            @endif
                                        
                                        @endforeach</dd>
                                    <br>
                                    <dt class="movie-dt">Tập Mới Nhất: </dt>
                                    <dd class="movie-dd">
                                        @if ($chap->count() == 0)
                                        Cant Load Lasted update
                                        @else
                                       
                                        Tập {{$chap[0]->chap}}
                                       
                                        @endif</dd>
                                    <br>		
                                    <dt class="movie-dt">Ngày Đăng: </dt>
                                    <dd class="movie-dd">{{date("d/m/Y",strtotime($flim->created_at))}}</dd>
                                    <br>		
                                    <dt class="movie-dt">Năm SX: </dt>
                                    <dd class="movie-dd"><a href="{{Route('page.yearpage',['year' => $flim->year])}}">{{$flim->year}}</a></dd>
                                    <br>		
                                    <dt class="movie-dt">Lượt Xem: </dt>
                                    <dd class="movie-dd">{{$flim->total_views}} Lượt xem</dd>
                                    <br>		
                                    <!-- <dt class="movie-dt">Score:</dt> <dd class="movie-dd imdb">{film.SCORE}</dd><br /> -->
                                </dl>
                                <div class="clear"></div>
                            </div>
                            <div class="box-rating">
                                <b>
                                    Mới cập nhật: 
                                    <div class="block2 servers">
                                        <div class="server" data-type="watch">
                                            
                                            <div class="episodes col-lg-12 col-md-12 col-sm-12">
                                                <ul>
                                                    @if ($chap->count() == 0)
                                                        <li><a href="" class="text-danger">Cant Load Lasted update</a></li>
                                                    @else
                                                        @foreach ($chap as $item)
                                                        <li><a href="{{route('page.chapvideo',['id'=>$item->id])}}">{{$item->chap}}</a></li>
                                                        @endforeach
                                                    @endif  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </b>
                            </div>
                        </div>
                        <div class="col-md-6  movie-image">
                            <div class="movie-l-img">
                                <img itemprop="image" alt="{{$flim->name}}" src="{{$flim->image}}" style="width:100%;height:100%;">
                                <h2 class="hidden mt-2"></h2>                               
                                <ul class="btn btn-block">
                                    @if(Auth::check()){
                                        <li class="item">
                                            <form action="{{route('user.boxadd')}}" method="POST">                       
                                                @csrf
                                                <input type="hidden" name="flim_id" value="{{$flim->id}}">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <button id="btn-film-watch" class="btn btn-outline-success" type="submit">Thêm  Vào Hộp</button>
                                            </form>                                
                                        </li>
                                    }
                                    @else{
                                        <li class="item"><a id="btn-film-watch" class="btn btn-outline-success" title="{{$flim->name}}" href="{{route('user.boxadd')}}">Thêm vào hộp</a></li>
                                    }
                                    @endif
                                    <li class="item"><a id="btn-film-watch" class="btn btn-outline-danger" title="{{$flim->name}}" href="{{route('page.videopage',$flim->id)}}">Xem Anime</a></li>
                                </ul>
                            </div>
                            <!-- Bookmark-->
                            <div class="tools-box">
                            </div>
                            <!-- // Bookmark-->
                        </div>
                        
                    </div>
                </div>
                <!-- / Thông tin phim -->
                <blockquote class="block-movie-content">
                    <h2 class="movie-detail-h2">Nội dung</h2>
                    <div class="content" id="film-content" itemscope="" itemtype="http://schema.org/Review" itemprop="review">
                        <div class="news-article">
                            <p></p>
                            {!! $flim->description !!}
                            <p></p>
                        </div>
                        <p>Chúc các bạn <a href="/" title="ANIME VIETSUB ONLINE | ANIME MÙA | ANIME HAY | ANIME TOP | XEM ANIME ONLINE ">xem anime vietsub</a> vui vẻ tại ANIMESQL.COM</p>
                        <span itemprop="author" class="hidden">@animeSQL.com</span>  
                        <!-- <p><div class="fb-comments" data-href="http://anime47.com/phim/fruits-basket-2nd-season/m7551.html" data-num-posts="7" data-width="100%" data-colorscheme="dark" data-order-by="reverse_time"></div></p> -->
                        <div class="thaoluanchovui">
                            <p></p>
                            {{-- <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="http://anime47.com/phim/fruits-basket-2nd-season/m7551.html" data-num-posts="7" width="100%" colorscheme="dark" data-order-by="reverse_time" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=907721805949566&amp;color_scheme=dark&amp;container_width=628&amp;height=100&amp;href=http%3A%2F%2Fanime47.com%2Fphim%2Ffruits-basket-2nd-season%2Fm7551.html&amp;locale=vi_VN&amp;order_by=reverse_time&amp;sdk=joey&amp;skin=dark" style="width: 100%;"><span style="vertical-align: bottom; width: 100%; height: 1871px;"><iframe name="f3f5b7a0e35efd8" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/plugins/comments.php?app_id=907721805949566&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df24daefe6792498%26domain%3Danime47.com%26origin%3Dhttps%253A%252F%252Fanime47.com%252Ff29de7b8cbc6e94%26relation%3Dparent.parent&amp;color_scheme=dark&amp;container_width=628&amp;height=100&amp;href=http%3A%2F%2Fanime47.com%2Fphim%2Ffruits-basket-2nd-season%2Fm7551.html&amp;locale=vi_VN&amp;order_by=reverse_time&amp;sdk=joey&amp;skin=dark" style="border: none; visibility: visible; width: 100%; height: 1871px;" class=""></iframe></span></div>
                             --}}
                            <p></p>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-center bg-success">BÌNH LUẬN PHIM</h3>
                            </div>
                            @if (Auth::check())
                            <div class="form-group">
                                <form action="{{route('addcomment')}}" method="POST" id="formaddchat">
                                    @csrf
                                    <textarea class="form-control bg-dark" name="content" id="contenttext" rows="3"></textarea>
                                    <input type="hidden" name="flim_id" value="{{$flim->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <button id="btn-film-watch" class="btn btn-outline-success mt-1" type="submit">Gửi</button>
                                </form>
                            </div>
                            @else
                                <div class="form-group">
                                </div>
                            @endif
                            
                            <div id="box-comment" data="{{$flim->id}}" data-url="{{route('loadchat')}}">
                                @foreach ($comment as $com)
                                @if (Auth::check())
                                    @if (Auth::user()->id == $com->user_id)
                                        <div class="comment-item bg-white p-1" style="margin: 20px;border-radius: 5px;">
                                            <div class="content" style="margin-left:10px; ">
                                                <span class="text-primary" style="font-size: 16px;"><strong>{{ $com->name}}</strong></span>
                                                <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>                                             
                                            </div>
                                            <div class="content" style="margin:5px; color: black;border-radius: 5px; background-color: aquamarine;" >{{ $com->content}}</div>                                          
                                            <button type="submit" id="{{$com->id}}" data="{{$com->flim_id}}" data-url="{{route('xoacomment')}}" name="dbtn" class="dbtn btn btn-danger p-1" style="margin-left: 10px;font-size: 12px;" >Xóa</button>               
                                        </div>
                                    @else
                                        <div class="comment-item bg-white p-1" style="margin: 20px; border-radius: 5px;">
                                            <div class="content" style="margin-left:10px; ">
                                                <span class="text-primary" style="font-size: 16px;"><strong>{{ $com->name}}</strong></span>
                                                <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                                            </div>
                                            <div class="content " style="margin:5px;color: black; border-radius: 5px; background-color: grey;" >{{ $com->content}}</div>                    
                                        </div> 
                                    @endif
                                @else
                                    <div class="comment-item bg-white p-1" style="margin: 20px; border-radius: 5px;">
                                        <div class="content" style="margin-left:10px; ">
                                            <span class="text-primary" style="font-size: 16px;"><strong>{{ $com->name}}</strong></span>
                                                <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                                        </div>
                                        <div class="content " style="margin:5px;color: black; border-radius: 5px; background-color: grey;" >{{ $com->content}}</div>                    
                                    </div>
                                @endif
                                    
                                   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </blockquote>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
@endsection