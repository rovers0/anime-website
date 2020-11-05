<h1 style="display: none">{{$count = $rdflim->count() }} {{$countcmt = $topcomment->count()}}</h1>
<div class="col-lg-4 sidebar" id="sidebar">
    <div class="right-box top-film">
        <h2 class="right-box-header star-icon"><span>Xem Nhiều </span></h2>
        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active" role="presentation">
              <a class="nav-link active text-warning" id="home-tab" data-toggle="tab" href="#day" role="tab" aria-controls="day" aria-selected="true">TO DAY</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link text-warning" id="profile-tab" data-toggle="tab" href="#week" role="tab" aria-controls="week" aria-selected="false">ALL</a>
            </li>
        </ul> --}}
        <div class="right-box-content tab-content ">
            <div class="tab-pane active" id="day" role="tabpanel" aria-labelledby="day-tab">
                <ul class="list-top-movie">
                    @for ($i = 0; $i < $count; $i++)
                        @if ($i == 0)
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$topviews[$i]->subname}}" href="{{Route('page.inforpage',['id' => $topviews[$i]->id])}}">
                                {{-- <span class="status">10/{{$rdflim[$i]->total_chap}}</span> --}}
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$topviews[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$topviews[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$topviews[$i]->subname}}</span>
                                    <p class="list-top-movie-item-view">{{$topviews[$i]->total_views}}  Lượt xem</p>
                                </div>
                            </a>
                        </li>
                        @else
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$topviews[$i]->subname}}" href="{{Route('page.inforpage',['id' => $topviews[$i]->id])}}">
                                {{-- <span class="status">10/{{$rdflim[$i]->total_chap}}</span> --}}
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$topviews[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$topviews[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$topviews[$i]->subname}}</span>
                                    <span class="list-top-movie-item-view">{{$topviews[$i]->total_views}}  Lượt xem</span>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div>
            {{-- <div class="tab-pane" id="week" role="tabpanel" aria-labelledby="week-tab">
                <ul class="list-top-movie">
                    {{$count = $rdflim->count()}}
                    @for ($i = 0; $i < $count; $i++)
                        @if ($i == 0)
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$rdflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $rdflim[$i]->id])}}">
                                <span class="status">10/{{$rdflim[$i]->total_chap}}</span>
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$rdflim[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$rdflim[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$rdflim[$i]->subname}}</span>
                                    <span class="list-top-movie-item-view">{{$rdflim[$i]->total_views}}  Lượt xem</span>
                                </div>
                            </a>
                        </li>
                        @else
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$rdflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $rdflim[$i]->id])}}">
                                <span class="status">10/{{$rdflim[$i]->total_chap}}</span>
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$rdflim[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$rdflim[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$rdflim[$i]->subname}}</span>
                                    <span class="list-top-movie-item-view">{{$rdflim[$i]->total_views}}  Lượt xem</span>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div> --}}
        </div>
    </div>
    <div class="clear"></div>
    <div class="right-box bl-film">
        <h2 class="right-box-header star-icon"><span>Bình luận nhiều</span></h2>
        <div class="right-box-content">
            <div class="content" data-name="blmn">
                <ul class="list-top-movie">
                    @for ($i = 0; $i < $countcmt; $i++)
                        @if ($i == 0)
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$topcomment[$i]->subname}}" href="{{Route('page.inforpage',['id' => $topcomment[$i]->id])}}">
                                {{-- <span class="status">10/{{$rdflim[$i]->total_chap}}</span> --}}
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$topcomment[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$topcomment[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$topcomment[$i]->subname}}</span>
                                    <span class="list-top-movie-item-view">{{$topcomment[$i]->total_views}}  Lượt xem</span>
                                </div>
                            </a>
                        </li>
                        @else
                        <li class="list-top-movie-item" id="list-top-movie-item">
                            <a class="list-top-movie-link" title="{{$topcomment[$i]->subname}}" href="{{Route('page.inforpage',['id' => $topcomment[$i]->id])}}">
                                {{-- <span class="status">10/{{$rdflim[$i]->total_chap}}</span> --}}
                                <div class="list-top-movie-item-thumb" style="background-image: url('{{$topcomment[$i]->image}}')"></div>
                                <div class="list-top-movie-item-info">
                                    <span class="list-top-movie-item-vn">{{$topcomment[$i]->name}}</span>
                                    <span class="list-top-movie-item-en">{{$topcomment[$i]->subname}}</span>
                                    <span class="list-top-movie-item-view">{{$topcomment[$i]->total_views}}  Lượt xem</span>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="clear"></div>
</div>