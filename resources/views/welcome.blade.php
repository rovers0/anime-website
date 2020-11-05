@include('page.head')

        <!-- header -->
        @include('page.header')
        
        <div class="clear"></div>
        @include('page.nav')
        {{-- <nav></nav> --}}
        <div class="clear"></div>
        <div class="clear"></div>
        <div class="container">
            <!-- Fullbanner -->
            @include('page.slider')
            <div class="row">
                <div class="col-lg-8">
                    
                    @yield('top-content')
                                  
                    <div class="clear"></div>
                </div>
                <!-- Sidebar -->
                @include('page.siderbar')
                <div class="clear"></div>
                <!-- /Sidebar -->
            </div>
            <!-- /Main content -->
        </div>
        <!-- Footer -->
        @include('page.footer')

        
        