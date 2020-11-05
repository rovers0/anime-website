@extends('welcome')
@section('top-content')
<div class="movie-list-index home-v2">
    <h1 class="header-list-index">
        <span class="title-list-index">Box phim</span>
    </h1>
    <!-- phia tren + phia duoi ben trai -->
    <ul class="last-film-box" id="movie-last-movie">     
        @if ($boxflim->count() == 0)
            <h1>Không tìm thấy phim</h1>
        @else
            @foreach ($boxflim as $item)
            <li>
                <div class="movie-item m-block" title="{{$item->subname}}" href="{{Route('page.inforpage',['id' => $item->flim_id])}}">
                    <div class="block-wrapper">
                        <div class="movie-thumbnail ratio-box ratio-3_4">
                            <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$item->image}}')"></div>
                        </div>
                        <div class="movie-meta">
                            <div class="movie-title-1">{{$item->name}}</div>
                            
                            <span class="fbcom-left">&nbsp;</span>
                            <span class="viewed-right">{{$item->total_views}}</span>
                            {{-- <span class="ribbon">10/{{$item->total_chap}} tập</span> --}}
                        </div>  
                    </div>                            
                </div>               
                <div class="del-list" style="background-color: transparent">
                    <a href="{{route('user.boxdelete',['id' =>$item->id])}}" style="margin-left: -10px;">
                        <img src="https://img.icons8.com/fluent/28/000000/close-window.png" alt="Xóa phim này khỏi danh sách phim ưa thích">
                    </a>
                </div>    
            </li>
            @endforeach
        @endif                    								
        
    </ul>
    {{-- <ul class="last-film-box" id="movie-last-movie">
        @if ($boxflim->count() == 0)
            <h1 class="text-center text-danger">Không tìm Thấy Phim Phù Hợp</h1>
        @else
        @foreach ($boxflim as $item)
        <li>
            <a class="movie-item m-block" title="{{$item->subname}}" href="{{Route('page.inforpage',['id' => $item->id])}}">
                <div class="block-wrapper">
                    
                    <div class="movie-thumbnail ratio-box ratio-3_4">
                        <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$item->image}}')"></div>
                    </div>
                    <div class="movie-meta">
                        <div class="movie-title-1">{{$item->name}}</div>
                        <span class="fbcom-left">89</span><span class="viewed-right">{{$item->total_views}}</span><span class="ribbon">10/{{$item->total_chap}} tập</span>
                        <form action="{{route('user.boxdelete',['id' =>$item->id])}}" method="POST">                       
                            @csrf
                            <button><img src="https://img.icons8.com/fluent/28/000000/close-window.png" alt="Xóa"></button>
                        </form>
                    </div>
                    <div class="del-list">
                        
                    </div>
                </div>
                
            </a>
        </li>
        @endforeach
 
        @endif
       
    </ul> --}}
</div>
        {{-- @foreach ($boxflim as $item)
                <li>                   
                    <div cclass="movie-item m-block" title="{{$item->subname}}" href="{{Route('page.inforpage',['id' => $item->flim_id])}}">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$item->image}}')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">{{$item->name}}</div>
                                <span class="fbcom-left">89</span>
                                <span class="viewed-right">{{$item->total_views}}</span>
                                <span class="ribbon">10/{{$item->total_chap}} tập</span>
                            </div>                              
                    </div>                       
                    <div class="del-list">
                        <a onclick="return unfavo({{$item->id}})" href="{{route('boxflim.delete',['id' =>$item->id])}}" title="Bỏ phim"><img src="https://img.icons8.com/fluent/28/000000/close-window.png" alt="Xóa"></a>
                    </div>
                    <form action="{{route('user.boxdelete',['id' =>$item->id])}}" method="POST">                       
                        @csrf
                        <button type="submit">Xóa</button>
                    </form>
                    </div>
                </li>
        @endforeach  --}}

     
@endsection