@extends('welcome')


@section('top-content')
<div class=" movie-list-index home-v2">
    <div class="block update">
        <div class="widget-title">
            <h3 class="title">Anime Mới Cập Nhật</h3>
        </div>
        <div class="clear"></div>
        <div class="last-film-box-wrapper">
            <div class="content" data-name="all">
                <ul class="last-film-box" id="movie-last-movie">
                    @foreach ($collectionlastmovie as $item)
                    <li>
                        <a class="movie-item m-block" title="{{$item->subname}}" href="{{Route('page.inforpage',['id' => $item->id])}}">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$item->image}}')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">{{$item->name}}</div>
                                    <span class="fbcom-left">&nbsp;</span><span class="viewed-right">{{$item->total_views}}</span>
                                    {{-- <span class="ribbon">10/{{$item->total_chap}} tập</span> --}}
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="clear"></div>
                <a class="xem-them" href="{{Route('page.show')}}" title="Anime mới cập nhật" >Xem thêm...</a>
            </div>
        </div>
    </div>
    <div class="block update">
        <div class="widget-title">
            <h3 class="title">Kamen Rider</h3>
        </div>
        <div class="last-film-box-wrapper">
            <ul class="last-film-box">
                @foreach ($kamenrider as $items)
                <li>
                    <a class="movie-item m-block" title="{{$items->subname}}" href="{{Route('page.inforpage',['id' => $items->id])}}">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$items->image}}')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">{{$items->name}}</div>
                                <span class="fbcom-left"> &nbsp;</span><span class="viewed-right">{{$items->total_views}}</span>
                                {{-- <span class="ribbon">10/{{$items->total_chap}} tập</span> --}}
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="clear"></div>
            <a class="xem-them" href="{{Route('page.pagecate',['name' => 'Kamen-Rider'])}}" title="PHim nguoi dong" >Xem thêm...</a>
        </div>
    </div>
</div>
@endsection