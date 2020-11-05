<style>
    .nonebf::before{
        content: none;
    }
    .nonebf::after{
        content: none;
    }
</style>
<nav>
    <div class="container">
        <ul id="mega-menu-1">
            <li><a href="/">Trang Chủ</a></li>
            <li > 
                <a class="nav-link dropdown-toggle" href="#" id="category" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể loại</a>
                <div class="dropdown-menu" aria-labelledby="category">
                    <div class="row text-center" >
                        @foreach ($listcategory   as $item)
                        <a class="dropdown-item text-danger col-md-2 " href="{{Route('page.pagecate',['name' => $item->name])}}">{{ str_replace('-',' ',$item->name)}}</a>
                        @endforeach
                    </div>
                </div>
                
            </li>
            <li>
                <a class="nav-link dropdown-toggle" href="#" id="status" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Trạng Thái</a>
                <div class="dropdown-menu" aria-labelledby="status">
                    <a class="dropdown-item text-danger" href="{{Route('page.statuspage',['status' => 0])}}">Hoàn thành</a>
                    <a class="dropdown-item text-danger" href="{{Route('page.statuspage',['status' => 1])}}">Đang tiến hành</a>
                </div>
            </li>
            <li>
                
                    <a  href="{{route('page.mostflimviews')}}">Xem Nhiều</a>
                    
            </li>
            <li>
                <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Bộ Lọc</a>                
                
            </li>
            <li>
                <a class="nav-link dropdown-toggle" href="#" id="year" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Năm</a>                
                <div class="dropdown-menu" aria-labelledby="year">
                    <div class="row text-center" >
                        @foreach ($listyear   as $item)
                        <a class="dropdown-item text-danger col-md-4  " href="{{Route('page.yearpage',['year' => $item->year])}}">{{ str_replace('-',' ',$item->year)}}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li><a href="{{route('page.faq')}}">Hỏi-Đáp</a></li>
            <li><a href="mailto:nkatwang@gmail.com">Contact</a></li>
        </ul>
        <div  class="collapse" id="collapseExample" style="max-height: 250px">
            <form class="needs-validation" action="{{Route('page.sortvideo')}}" method="POST">
                @csrf
                <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04" style="font-size: 15px ;color: #DBDBDB;">Tiến Độ</label>
                    <select class="custom-select" id="validationCustom04" name="status" required>
                        <option selected disabled value="9">Tất Cả</option>
                        <option value="0">Hoàn Thành</option>
                        <option value="1">Chưa Hoàn Thành</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04" style="font-size: 15px ;color: #DBDBDB;">Thể Loại</label>
                    <div class="dropdown nonebf" >
                        <button style="width: 100%" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            thể Loại
                        </button>
                        <div class="dropdown-menu"  style="width: 100% ; height: 250px; overflow: auto">
                            @foreach ($listcategory   as $item)
                                <div class="dropdown-item form-check mx-auto">
                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{$item->name}}" >
                                    <label class="form-check-label" >
                                        {{ str_replace('-',' ',$item->name)}}
                                    </label>
                                </div>
                         
                            @endforeach
                            
                            {{-- <a class="dropdown-item active" href="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                      Default checkbox
                                    </label>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                      Default checkbox
                                    </label>
                                </div>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04" style="font-size: 15px ;color: #DBDBDB;">Năm Sản Xuất</label>
                    <select class="custom-select" id="validationCustom04" name="year" required>
                        <option selected disabled value="0">Tất Cả</option>
                        @foreach ($listyear   as $item)
                            <option value="{{$item->year}}">{{ str_replace('-',' ',$item->year)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom05" style="font-size: 15px ;color: #DBDBDB;">Sắp Xếp</label>
                    <select class="custom-select" id="validationCustom05" name="sort" required>
                        <option selected disabled value="updated_at">Tự Động</option>
                        <option value="year">Năm</option>
                        <option value="total_views">Lượt Xem</option>
                    </select>
                </div>
                </div>
            
                <button class="btn btn-danger mb-3" type="submit">Duyệt Phim</button>
            </form>
        </div>
        
          
          {{-- <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script> --}}
    </div>
</nav>