@extends('welcome')


@section('top-content')
<div class=" movie-list-index home-v2">
    <div class="block update">
        <div class="widget-title">
            <h3 class="title">Anime Mới Cập Nhật</h3>
        </div>
        <div class="row">
            <p class="col-md-2 col-md-offset-5  mx-auto">
              <button id="btn" class="btn btn-danger btn-block m-2" onclick="javascript:loaddata();">MORE</button>
              <!-- <button id="dbtn" class="btn btn-danger btn-block m-2 disabled">NO MORE</button> -->
            </p>
          </div>
        <div class="last-film-box-wrapper">
            <div class="content" data-name="all">
                <ul class="last-film-box" id="movie-last-movie">
                    @foreach ($collectionlastmovie as $item)
                    <li>
                        <a class="movie-item m-block" title="{{$item->subname}}" href="/phim/shachou-battle-no-jikan-desu/m7575.html">
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
                    <li>
                        <a class="movie-item m-block" title="Shachibato! President, It\'s Time for Battle! | Shachibato The Animation -  Shachou, Battle no Jikan Desu! - 05/04/2020" href="/phim/shachou-battle-no-jikan-desu/m7575.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/7HMZh0l.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Shachou, Battle no Jikan Desu!</div>
                                    <span class="fbcom-left">89</span><span class="viewed-right">160845 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Tamayomi -  Tamayomi - 01/04/2020" href="/phim/tamayomi/m7568.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/H4DlQ8x.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Tamayomi</div>
                                    <span class="fbcom-left">31</span><span class="viewed-right">108180 </span><span class="ribbon">09/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Gegege no Kitarou (2018) -  Gegege no Kitarou (2018) - 2018" href="/phim/gegege-no-kitarou-2018/m6741.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/u40JRpb.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Gegege no Kitarou (2018)</div>
                                    <span class="fbcom-left">297</span><span class="viewed-right">692040 </span><span class="ribbon">94/97</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Fruits Basket (2019) 2nd Season, Furuba, Fruits Basket (Zenpen) -  Fruits Basket 2nd Season - 07/04/2020" href="{{Route('fliminfor')}}">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/dZligE2.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Fruits Basket 2nd Season</div>
                                    <span class="fbcom-left">114</span><span class="viewed-right">180480 </span><span class="ribbon">09+10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Princess Connect! Re:Dive -  Princess Connect! Re:Dive - 07/04/2020" href="/phim/princess-connect-re-dive/m7150.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/iObbi16.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Princess Connect! Re:Dive</div>
                                    <span class="fbcom-left">734</span><span class="viewed-right">1135731 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Listeners -  Listeners - 04/04/2020" href="/phim/listeners/m7563.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/Y5DD3Am.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Listeners</div>
                                    <span class="fbcom-left">51</span><span class="viewed-right">90165 </span><span class="ribbon">09+10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Gleipnir -  Gleipnir - 2020" href="/phim/gleipnir/m7553.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/WSgvXYV.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Gleipnir</div>
                                    <span class="fbcom-left">571</span><span class="viewed-right">399600 </span><span class="ribbon">10/12</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Pocket Monsters -  Pokemon (2019) - 2019" href="/phim/pokemon-2019/m7433.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/x0pSTVc.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Pokemon (2019)</div>
                                    <span class="fbcom-left">736</span><span class="viewed-right">548350 </span><span class="ribbon">23/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Tsugumomo 2nd Season -  Tsugu Tsugumomo - 2020" href="/phim/tsugu-tsugumomo/m7561.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/WfBhJ4s.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Tsugu Tsugumomo</div>
                                    <span class="fbcom-left">287</span><span class="viewed-right">305040 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Hatena☆Illusion -  Hatena☆Illusion - 2020" href="/phim/hatena-illusion/m7482.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://cdn.myanimelist.net/images/anime/1383/105483l.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Hatena☆Illusion</div>
                                    <span class="fbcom-left">79</span><span class="viewed-right">275760 </span><span class="ribbon">12/12</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Kaguya-sama: Love is War Season 2 | Kaguya-sama: Love is War Season 2 | Kaguya Wants to be Confessed To: The Geniuses\' War of Love and Brains 2nd Season, Kaguya-sama wa Kokurasetai: Tensai-tachi no Renai Zunousen 2nd Season, Kaguya-sama: Love is War 2nd Season -  Kaguya-sama wa Kokurasetai?: Tensai-tachi no Renai Zunousen - tháng 4/2020" href="/phim/kaguya-sama-wa-kokurasetai-tensai-tachi-no-renai-zunousen/m7548.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/Cqh26UT.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Kaguya-sama wa Kokurasetai?: Tensai-tachi no Renai Zunousen</div>
                                    <span class="fbcom-left">625</span><span class="viewed-right">399465 </span><span class="ribbon">09/12</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Mermaid Melody: Pichi Pichi Pitch -  Mermaid Melody Pichi Pichi Pitch - 2003" href="/phim/mermaid-melody-pichi-pichi-pitch/m7644.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/8Y9phAX.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Mermaid Melody Pichi Pichi Pitch</div>
                                    <span class="fbcom-left">1</span><span class="viewed-right">6135 </span><span class="ribbon">01+02/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="My Life as a Villainess: All Routes Lead to Doom! | Hamefura, I Reincarnated into an Otome Game as a Villainess With Only Destruction Flags…, Destruction Flag Otome -  Otome Game no Hametsu Flag shika Nai Akuyaku Reijou ni Tensei shiteshimatta.. - 05/04/2020" href="/phim/otome-game-no-hametsu-flag-shika-nai-akuyaku-reijou-ni-tensei-shiteshimatta/m7554.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/U0tysKt.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Otome Game no Hametsu Flag shika Nai Akuyaku Reijou ni Tensei shiteshimatta..</div>
                                    <span class="fbcom-left">635</span><span class="viewed-right">348120 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Ascendance of a Bookworm 2nd Season -  Honzuki no Gekokujou: Shisho ni Naru Tame ni wa Shudan wo Erandeiraremasen 2nd Season - 2020" href="/phim/honzuki-no-gekokujou-shisho-ni-naru-tame-ni-wa-shudan-wo-erandeiraremasen-2nd-season/m7457.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/7lcbQUa.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Honzuki no Gekokujou: Shisho ni Naru Tame ni wa Shudan wo Erandeiraremasen 2nd Season</div>
                                    <span class="fbcom-left">245</span><span class="viewed-right">306675 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Bakugan: Gundalian Invaders -  Bakugan Battle Brawlers: Gundalian Invaders - 2010" href="/phim/bakugan-battle-brawlers-gundalian-invaders/m7624.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/gJCtnmU.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Bakugan Battle Brawlers: Gundalian Invaders</div>
                                    <span class="fbcom-left">66</span><span class="viewed-right">141750 </span><span class="ribbon">14/39</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Sing  -  Yesterday wo Utatte - 05/04/2020" href="/phim/yesterday-wo-utatte/m7555.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/e2G2ZgL.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Yesterday wo Utatte</div>
                                    <span class="fbcom-left">225</span><span class="viewed-right">204015 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Arte -  Arte - 04/04/2020" href="/phim/arte/m7562.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/lu4qx5R.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Arte</div>
                                    <span class="fbcom-left">88</span><span class="viewed-right">163215 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="N/A -  Hayate no Gotoku! Cuties Blu-ray - Đang cập nhật" href="/phim/hayate-no-gotoku-cuties-blu-ray/m7284.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/aRND2ky.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Hayate no Gotoku! Cuties Blu-ray</div>
                                    <span class="fbcom-left">16</span><span class="viewed-right">116661 </span><span class="ribbon">06/12</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="N/A -  Anime Music Video - 2020" href="/phim/anime-music-video/m7160.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://s2.vndb.org/cv/86/30286.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Anime Music Video</div>
                                    <span class="fbcom-left">418</span><span class="viewed-right">1035225 </span><span class="ribbon">Koi yume</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="movie-item m-block" title="Kakushigoto | Hidden Things -  Kakushigoto (TV) - 02/04/2020" href="/phim/kakushigoto-tv/m7556.html">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail ratio-box ratio-3_4">
                                    <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/OhDfyao.jpg')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1">Kakushigoto (TV)</div>
                                    <span class="fbcom-left">344</span><span class="viewed-right">249450 </span><span class="ribbon">10/??</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="clear"></div>
                <a class="xem-them" href="./danh-sach/phim-moi/1.html" title="Anime mới cập nhật" >Xem thêm...</a>
            </div>
        </div>
    </div>
    <div class="block update">
        <div class="widget-title">
            <h3 class="title">Kamen Rider</h3>
        </div>
        <div class="last-film-box-wrapper">
            <ul class="last-film-box">
                <li>
                    <a class="movie-item m-block" title="Mechanical Violator Hakaider -  Jinzo Ningen Hakaider - 1995" href="/phim/jinzo-ningen-hakaider/m7272.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/MMB5qVh.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Jinzo Ningen Hakaider</div>
                                <span class="fbcom-left">23</span><span class="viewed-right">408265 </span><span class="ribbon">01/01</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Dororo Live Action -  Dororo Live Action - 2007" href="/phim/dororo-live-action/m7251.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/KEjAtax.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Dororo Live Action</div>
                                <span class="fbcom-left">32</span><span class="viewed-right">526099 </span><span class="ribbon">01/01</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Kamen Rider Build the Movie: Be the One -  Kamen Rider Build the Movie: Be the One - 2018" href="/phim/kamen-rider-build-the-movie-be-the-one/m7137.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/37dJSuy.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Kamen Rider Build the Movie: Be the One</div>
                                <span class="fbcom-left">113</span><span class="viewed-right">788457 </span><span class="ribbon">01/01</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Kimi No Suizou Wo Tabetai -  Mình Muốn Ăn Tụy Của Cậu - 2017" href="/phim/minh-muon-an-tuy-cua-cau/m7093.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/o9yXo3d.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Mình Muốn Ăn Tụy Của Cậu</div>
                                <span class="fbcom-left">104</span><span class="viewed-right">795028 </span><span class="ribbon">01/01</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Inuyashiki Last Hero | Người Hùng Cuối Cùng | Ông Bác Siêu Nhân -  Lão Hạc Siêu Nhân - 2018" href="/phim/lao-hac-sieu-nhan/m7088.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/DXanldC.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Lão Hạc Siêu Nhân</div>
                                <span class="fbcom-left">172</span><span class="viewed-right">690903 </span><span class="ribbon">01/01</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Có Một Người Tôi Yêu -  Sukina Hito Ga Iru Koto - 2016" href="/phim/sukina-hito-ga-iru-koto/m7086.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/Qh1cv42.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Sukina Hito Ga Iru Koto</div>
                                <span class="fbcom-left">27</span><span class="viewed-right">546706 </span><span class="ribbon">10/10</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Rabu Riran | Love Rerun -  Yêu Lại Từ Đầu - 2018" href="/phim/yeu-lai-tu-dau/m7058.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/neNvweM.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Yêu Lại Từ Đầu</div>
                                <span class="fbcom-left">23</span><span class="viewed-right">437607 </span><span class="ribbon">10/10</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="movie-item m-block" title="Kuzu no Honkai Live-action -  Kuzu no Honkai: Ước nguyện của kẻ cặn bã - 2017" href="/phim/kuzu-no-honkai-uoc-nguyen-cua-ke-can-ba/m6081.html">
                        <div class="block-wrapper">
                            <div class="movie-thumbnail ratio-box ratio-3_4">
                                <div class="public-film-item-thumb ratio-content" style="background-image:url('https://img.anime47.com/imgur/Mx1IyzW.jpg')"></div>
                            </div>
                            <div class="movie-meta">
                                <div class="movie-title-1">Kuzu no Honkai: Ước nguyện của kẻ cặn bã</div>
                                <span class="fbcom-left">123</span><span class="viewed-right">895190 </span><span class="ribbon">12/12</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
            <a class="xem-them" href="./danh-sach/jpdrama/1.html" title="PHim nguoi dong" >Xem thêm...</a>
        </div>
    </div>
</div>
@endsection