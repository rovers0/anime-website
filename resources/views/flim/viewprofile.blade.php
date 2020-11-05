@extends('welcome')
@section('top-content')
<div class="block-movie-info movie-info-box">
    <div class="block-wrapper page-single">
        <div class="form-register">
            <form id="form-info" class="form-horizontal" action="" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Quyền hạn:</label>                   
                        @if($item->lv == 9)
                          <a style="line-height:10px">Bạn là admin</a>
                        
                        @else
                            <a style="line-height:10px;">Bạn là member</a>
                        
                        @endif
                        
                    
                </div>
                {{-- <div class="form-group">
                    <label class="col-lg-3 control-label">#ID</label>
                    <div class="col-lg-3"><span style="line-height:38px;">248488</span></div>
                </div> --}}
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tài khoản:</label>
                    <a style="line-height:38px;">{{$item->name}}</a>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <span style="line-height:38px;">{{$item->email}}</span>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Birthday:</label>
                    <span style="line-height:38px;">{{$item->birthday}}</span>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone:</label>
                    <span style="line-height:38px;">{{$item->phone}}</span>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <span style="line-height:38px;">{{$item->address}}</span>
                </div>
            </form>
        </div>
        <h1 class="header-list-index">
            <span class="title-list-index">Bạn có thể thay đổi thông tin cá nhân bên dưới</span>
        </h1>
        <div class="form-register">
            <form action="{{route('user.update',['id'=>$item->id])}}" method="POST" role="form">
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Tên tài khoản:</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control"name="name" value="{{$item->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Birthday:</label>
                        <div class="col-lg-5">
                            <input type="date" class="form-control" name="birthday" value="{{$item->birthday}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Số điện thoại:</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="phone" value="{{$item->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Địa chỉ:</label>
                        <div class="col-lg-5"> 
                            <input type="text" class="form-control"name="address" value="{{$item->address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-offset-2 col-lg-10">
                            <button type="submit"  value="Thực hiện" class="btn btn-primary">Thay đổi thông tin</button>
                        </div>
                    </div>
                   
            </form>
        </div>   
        
    </div>
</div>
    <!-- /Account Info -->

@endsection