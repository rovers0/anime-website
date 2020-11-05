@extends('welcome')
@section('top-content')

@if (isset($item))
<div class="w-auto">
    <h2 class="m-2"><span class="text-warning">{{$title->name}}-EP:{{$item->chap}}</span></h2>
    <div class="movie-info" id="data" data-id="{{$item->id}}" data-url="{{route('viewscount')}}">
        <div class="block-movie-info movie-info-box">
            <div class="tab-content" id="pills-tabContent" >
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <script src="https://cdn.jwplayer.com/players/{{$item->content}}-YK2Wxq8L.js"></script>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div itemscope itemtype="https://schema.org/VideoObject" title="This video can take to 10min for Processing">
                    <meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/{{$item->content}}-1280.jpg"/>
                    <meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/{{$item->content}}-ZUxenC5W.mp4"/>
                    <div class="embed-responsive embed-responsive-16by9"> 
                        <iframe src="https://cdn.jwplayer.com/players/{{$item->content}}-eFvNO8QX.html"  frameborder="0" scrolling="auto"  style="position:absolute;" allowfullscreen title="This video can take to 10min for Processing" id="if"></iframe>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade text-center text-danger" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">SV1</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SV2</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SV3</a>
                </li>
            </ul>
              
            <div class="clear"></div>
            {{-- <div class="user-action">
                <div class="btn-cs toggle-light" data-on="Bật đèn" data-off="Tắt đèn">
                    <i class="btn-cs-icon icon-light-sm"></i>
                    <div id="light-status">Tắt đèn</div>
                </div>
                <a class="btn-cs add-favorite" rel="nofollow" id="favorite" href="javascript:void(0)" onclick="return favo(1,4742)"><i class="btn-cs-icon icon-add-sm"></i><span class="btn-text">Lưu</span></a>
                <div class="btn-cs toggle-size" data-on="Thu nhỏ" data-off="Phóng to" title="Phóng to/Thu nhỏ">
                    <i class="btn-cs-icon icon-expand-sm"></i>
                    <span>
                        <div id="pttn">Phóng to</div>
                    </span>
                </div>
                <a class="btn-cs autoprev" rel="nofollow" onclick="nextEpisodeHand('');"><i class="btn-cs-icon icon-autoprev-sm"></i><span>Prev</span></a>
                <a class="btn-cs autonext" rel="nofollow" onclick="nextEpisodeHand('#-002/77973#');"><i class="btn-cs-icon icon-autonext-sm"></i><span>Next</span></a>
                <a class="btn-cs error-player" target="_blank" rel="nofollow" href="https://anime47.com/chuyen.php?url="><i class="btn-cs-icon icon-error-sm"></i><span>Link Nguồn</span></a>
                <div class="btn-cs show_hide" href="javascript:void(0)" onclick="TaiAnime(77972);"><i class="btn-cs-icon icon-download-sm"></i><span>Download</span></div>
                <a class="btn-cs add-favorite" rel="nofollow" id="favorite" href="javascript:void(0)" onclick="return danhdau(1,4742,77972)"><i class="btn-cs-icon icon-add-sm"></i><span class="btn-text">Đánh Dấu Ep Đang Xem</span></a>
                <div class="btn-cs show_hide" href="javascript:void(0)" onclick="PhanPhim();"><i class="btn-cs-icon icon-capture-frame"></i><span>Phần##</span></div>
                <div class="btn-cs" id="btn-toggle-capture" title="Chụp ảnh"><i class="btn-cs-icon icon-capture-frame"></i><span>Chụp ảnh</span></div>
                <!-- <div class="btn-cs" href="javascript:void(0)" >{film.server}</div> -->
            </div> --}}
            <div class="box-rating">
                <div class="slidingDiv" style="display:none">
                   
                </div>
                <div id="thongbao">
                    <div style="text-align: center;">
                        <h3 style="color: #5e9ca0;">Hãy lựa chọn Server phù hợp với đường tryền của các bạn .là server tổng hợp nên đôi khi có sự lẫn lộn giữa các fansub</h3>
                    </div>
                </div>
                <p>Các tập ở server Nhiều Nhóm bao gồm của các fansub : Tầm Nhìn Số, Vui Ghê, Naruto Sub</p>
            </div>
            <h2 class="text-warning m-2"><span>Danh Sach Tap</span></h2>
            <div class="block2 servers mt-3 bg-white ">
                <ul class="row m-1">
                    @if ($list->count()==0)
                        <h1 class="text-danger">Follow để nhận thông báo khi có tập mới nhất</h1>
                    @else
                        @foreach ($list as $rcmchap)
                        <a href="{{route('page.chapvideo',['id'=>$rcmchap->id])}}" class="text-white col-md-1 mx-1 btn btn-primary"><li class=" nonemarker text-center  ">{{$rcmchap->chap}}</li></a>
                        @endforeach
                    @endif
                   
                </ul>
               
            </div>
            
        
        
        </div>
    </div>
    
    
</div>
@else
    <div class="w-auto">
        <h2 class="m-2"><span class=" text-center text-warning">Không tìm thấy video phù hợp</span></h2>
    </div>
@endif

@endsection