@extends('welcome')
@section('top-content')
<div class="block-movie-info movie-info-box">
    <div class="block-wrapper page-single">
        <h1 class="header-list-index">
            <span class="title-list-index">Bạn có thể thay đổi Mật khẩu cá nhân bên dưới</span>
        </h1>
        <div class="form-register">
            <form action="{{route('user.change',['id'=>$item->id])}}" method="POST" role="form">
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
                        <label class="col-lg-3 control-label">Mật khẩu:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control"name="curpassword" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">mật khẩu mới:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" name="newpassword" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">xác nhận mật khẩu mới:</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" name="password_confirmation" >
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