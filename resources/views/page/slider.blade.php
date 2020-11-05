<div class="row ad-container banner-top">
    <div class="col-lg-12">
        <div id="ad-center-980-1">
            <h2 class="header-list-index" style="margin-top: 0px;"><span class="title-list-index">Phim đề cử</span></h2>
        </div>
    </div>
</div>
<div class="row nominated-movie">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="list_carousel">
                <ul id="movie-carousel-top">
                    @for ($i = 0; $i < 5; $i++)
                        <li>
                            <a class="movie-item m-block" title="{{$rdflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $rdflim[$i]->id])}}">
                                <div class="block-wrapper">
                                    <div class="movie-thumbnail ratio-box ratio-3_4">
                                        <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$rdflim[$i]->image}}')"></div>
                                    </div>
                                    <div class="movie-meta">
                                        <div class="movie-title-1">{{$rdflim[$i]->name}}</div>
                                        <span class="movie-title-2">{{$rdflim[$i]->subname}}</span><span class="movie-title-chap">204688 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="clear"></div>
               
            </div>
          </div>
          <div class="carousel-item">
            <div class="list_carousel">
                <ul id="movie-carousel-top">
                    @for ($i = 5; $i < 10; $i++)
                        <li>
                            <a class="movie-item m-block" title="{{$rdflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $rdflim[$i]->id])}}">
                                <div class="block-wrapper">
                                    <div class="movie-thumbnail ratio-box ratio-3_4">
                                        <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$rdflim[$i]->image}}')"></div>
                                    </div>
                                    <div class="movie-meta">
                                        <div class="movie-title-1">{{$rdflim[$i]->name}}</div>
                                        <span class="movie-title-2">{{$rdflim[$i]->subname}}</span><span class="movie-title-chap">204688 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="clear"></div>
                
            </div>
          </div>
          <div class="carousel-item">
            <div class="list_carousel">
                <ul id="movie-carousel-top">
                    @for ($i = 0; $i < 5; $i++)
                    <li>
                        <a class="movie-item m-block" title="{{$rdflim[$i]->subname}}" href="{{Route('page.inforpage',['id' => $rdflim[$i]->id])}}">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('{{$rdflim[$i]->image}}')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">{{$rdflim[$i]->name}}</div>
                                    <span class="movie-title-2">{{$rdflim[$i]->subname}}</span><span class="movie-title-chap">204688 </span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endfor
                </ul>
                <div class="clear"></div>
               
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>                
</div>