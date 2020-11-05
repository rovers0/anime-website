@extends('welcome')
@section('top-content')
<div class="movie-list-index home-v2">
    <h1 class="header-list-index">
        <span class="title-list-index">{{$title}}</span>
    </h1>
    <div style="display: none">
       
        @if ($listflim->count() > 24)
        {{$count = 24}}
        @else
        {{$count = $listflim->count()}}
        @endif
    </div>
    <ul class="last-film-box" id="movie-last-movie" data-lis="{{Hash::make($listflim)}}" data-list="{{$listflim}}">
        @if ($listflim->count() == 0)
            <h1 class="text-center text-danger">Không tìm Thấy Phim Phù Hợp</h1>
        @else   
            
            @for ($i = 0; $i < $count; $i++)
            <li>
                <a class="movie-item m-block" title="{{$listflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $listflim[$i]->id])}}">
                    <div class="block-wrapper">
                        <div class="movie-thumbnail ratio-box ratio-3_4">
                            <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$listflim[$i]->image}}')"></div>
                        </div>
                        <div class="movie-meta">
                            <div class="movie-title-1">{{$listflim[$i]->name}}</div>
                            <span class="fbcom-left">&nbsp;</span><span class="viewed-right">{{$listflim[$i]->total_views}}</span>
                            {{-- <span class="ribbon">10/{{$listflim[$i]->total_chap}} tập</span> --}}
                        </div>
                    </div>
                </a>
            </li>
            @endfor
        {{-- @foreach ($listflim as $item)
        <li>
            <a class="movie-item m-block" title="{{$item->subname}}" href="{{Route('page.inforpage',['id' => $item->id])}}">
                <div class="block-wrapper">
                    <div class="movie-thumbnail ratio-box ratio-3_4">
                        <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$item->image}}')"></div>
                    </div>
                    <div class="movie-meta">
                        <div class="movie-title-1">{{$item->name}}</div>
                        <span class="fbcom-left">89</span><span class="viewed-right">{{$item->total_views}}</span><span class="ribbon">10/{{$item->total_chap}} tập</span>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
  --}}
        @endif
       
    </ul >
    <div class="clear"></div>
    <ul id="pagi" class="pagination pagination-lg mt-3">
        @if ($listflim->count() <= 24 && $listflim->count() > 0)
        <li class="noneactive active"><a class="load-flim" data-url="{{route('pagination')}}" aria-details="1">1</a></li>
        @else
        <p style="display: none"><{{$temp = 1}} </p>
        @for ($i = 0 ;$i < $listflim->count() ; $i++)
            @if ($i%24 ==0)
                <li class="noneactive" ><a class="load-flim"data-url="{{route('pagination')}}" style="cursor: default;" aria-details="{{$temp}}">{{$temp}}</a></li>               
                <p style="display: none"><{{$temp++}} </p>
            @else
                
            @endif
            
        @endfor
 
        @endif
            
    </ul>
</div>

@endsection