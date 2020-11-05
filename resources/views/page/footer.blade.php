<footer>
    <div class="footer">
        <div class="container">
            <div class="bar">
                <div class="bar-wrap">
                    <ul class="links">
                        <li><a href="/">Xem anime</a></li>
                    </ul>
                    <div class="social">
                        <a href="https://www.facebook.com/anime47fanpage/" target="_blank" class="fb">
                            <span data-icon="f" class="icon"></span>
                            <span class="info">
                                <span class="follow">FANPAGE FACEBOOK</span>
                                <span class="num">
                                    <div class="fb-like" data-href="https://www.facebook.com/anime47fanpage/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="60"></div>
                                </span>
                            </span>
                        </a>
                        <a href="#" class="call">
                        <span data-icon="7" class="icon"></span>
                        <span class="info">
                        <span class="follow">Liên hệ quảng cáo:</span>
                        <span class="num">nkatwuang@gmail.com</span>
                        </span>
                        </a>
                    </div>
                    <div class="clear"></div>
                    <div class="copyright">&copy;  2020 All Rights Reserved •</span></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- /Footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="{{asset('/js/main.js')}}"></script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

</body>
</html>