<header>
    <div class="header">
        <div class="container">
            <!-- header logo -->
            <div class="header-logo" ><a class="" href="/" title="ANIME VIETSUB ONLINE HD" ><img  class=" logotop" src="{{asset('img/123.png')}}"></a></div>
            <div class="widget_search">
                <form method="POST" id="form-search" action="{{ route('page.searchvideo')}}">
                    @csrf
                    <div>
                        
                        <input type="text"  class="typeahead form-control" name="name" placeholder="Tìm: tên anime ... " value="" autocomplete="off">
                        <button class=" btn-sm " type="submit" style="background: transparent" >
                            Tìm
                        </button>
                        
                    </div>
                </form>
                <script type="text/javascript">
                    var path = "{{ route('autocomplete') }}";
                    $('input.typeahead').typeahead({
                        source:  function (name, process) {
                        return $.get(path, { name: name }, function (data) {
                                return process(data);
                            });
                        }
                    });
                </script>
                
            </div>
            <div class="widget_user_header">
                @guest
                
                    <a class="button-login" rel="nofollow" href="{{ route('login') }}"></a>
               
                @if (Route::has('register'))
                    
                        <a class="button-register" rel="nofollow" href="{{ route('register') }}"></a>
                    
                @endif
                @else
                <li class="">
                    <a id="navbarDropdown" class="dropdown-toggle btn btn-outline-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} 
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.view',['id' => Auth::user()->id])}}">{{ __('Trang cá nhân') }}</a>
                        <a class="dropdown-item" href="{{ route('user.boxindex',['id' => Auth::user()->id])}}">{{ __('Tủ Flim') }}</a>
                        <a class="dropdown-item" href="{{ route('user.changepws',['id' => Auth::user()->id])}}">{{ __('Đổi Mật khẩu') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>   
                @endguest
            </div>
        </div>
    </div>
</header>