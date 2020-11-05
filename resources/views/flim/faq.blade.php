@extends('welcome')
@section('top-content')
<div class="movie-info">
    <div class="block-movie-info movie-info-box">
        <!-- phia tren + phia duoi ben trai -->
        <div class="block-wrapper page-single">
            <h1>Một số kiến thức và thắc mắc.</h1>
            <h3>1. Tại sao xem phim bị chậm?</h3>
            <div style="color: #90ae1f;font-size: 1.2em;font-weight: 700;">+ Đáp : Có thể do một số vấn đề liên quan đến hạ tầng mạng, gói mạng, đứt cáp quang
                hoặc khi bạn xem ở server  bạn chưa cài <a href="https://chrome.google.com/webstore/detail/anime47com/kgpnclgpcjiginkigoahbojddfkobfde?fbclid=IwAR0UcaWWN7DsvG2-okIELa5AJQArDwAneAORmXNyQEmgein_gFG2QnhcDd4" target="blank_"><strong>Addon Chrome + Cốc cốc</strong></a> hoặc <a href="https://addons.mozilla.org/vi/firefox/addon/myanime-co/" target="blank_"><strong>FireFox</strong></a> như khuyến
                cáo của chúng tôi.<br>
                + Khắc phục : Cài đầy đủ các gói addon (extension) ứng với từng trình duyệt hoặc đơn giản hơn là server phụ (nếu có).
            </div>
            <h3>2. Xem ở server phụ như thế nào?</h3>
            <div style="color: #c9d432;font-size: 1.2em;font-weight: 700;">+ Đáp : Click chuột vào một trong cac server mà bạn nhìn thấy dưới player <img src="{{asset('/img/m2.jpg')}}"> 
            </div>
            <h3>3. Vì sao tôi xem không có tiếng?</h3>
            <div style="color: #c9d432;font-size: 1.2em;font-weight: 700;">+ Đáp : Tại server hoặc do bản quyền nhạc chúng sẽ cố gắng khắc phục hiện này sớm nhất
            </div>
            
            <h3>4. chức năng Thêm phim vào tủ là gì ?</h3>
            <div style="color: #c9d432;font-size: 1.2em;font-weight: 700;">+ Đáp : Click chuột vào nút thêm phim sẽ đưa bộ phim đó vào bộ sưu tập của bạn và bạn sẽ nhận được những thông báo khi có thông tin liên quan đến bộ phim đó (như có tập mới)  <img src="{{asset('/img/bf.jpg')}}"> </div>
            <h3>5. Tôi có thể tìm thấy phần khác của bộ phim ở đâu?</h3>
            <div style="color: #c9d432;font-size: 1.2em;font-weight: 700;">+ Đáp : Ở phần info sẽ có 1 bảng  liệt kê 5 tập gần nhất:<br> <img src="{{asset('/img/m6.jpg')}}"><br> hoặc
                dưới player sẽ có nút bấm liệt kê các phần khác:<br> <img src="{{asset('/img/m62.jpg')}}">, bạn có thể xem phim theo thứ tự mà người quản trị đẵ sắp xếp 
                .
            </div>
            <h3>6. Tôi muốn xem chất lượng HD hoặc cao hơn?</h3>
            <div style="color: #c9d432;font-size: 1.2em;font-weight: 700;">+ Đáp : Nâng cấp đường truyền mạng để có thể xem phim ở chất lượng tốt nhât
            </div>
            <div class="clear"></div>
            <p></p>
            
            <p></p>
        </div>
        
    </div>
</div>
@endsection