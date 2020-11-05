@extends('cpadmin.master')
@section('title','Edit chapter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('chapter Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.chapter.update',['id'=>$chapter->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Title') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="title" value="{{$chapter->title}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="flim_id" class="col-md-2 col-form-label text-md-left">{{ __('FLIM') }}</label>
                            <div class="col-md-10">
                                <select name="flim_id" class="form-control">
                                    @foreach ($flim as $item)
                                        @if ($item->id == $chapter->flim_id)
                                            <option  selected="selected" value="{{$item->id}}">{{$item->name}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __(' Chap index') }}</label>
                            <div class="col-md-10">
                                <input type="number" name="chap" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$chapter->chap}}">
                                <p class="text-muted">Only Number</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Old VIdeo ') }}</label>
                            <div class="col-md-10 ">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item active" role="presentation">
                                      <a class="nav-link active text-warning" id="home{{$chapter->id}}-tab" data-toggle="tab" href="#this{{$chapter->id}}" role="tab" aria-controls="this{{$item->id}}" aria-selected="true">Sever1</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <a class="nav-link text-warning" id="profile{{$chapter->id}}-tab" data-toggle="tab" href="#that{{$chapter->id}}" role="tab" aria-controls="this{{$item->id}}" aria-selected="false">sever2</a>
                                    </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane active" id="this{{$chapter->id}}" role="tabpanel" aria-labelledby="day-tab">
                                        <script src="https://cdn.jwplayer.com/players/{{$chapter->content}}-YK2Wxq8L.js"></script>
                                    </div>
                                    <div class="tab-pane " id="that{{$item->id}}" role="tabpanel" aria-labelledby="week-tab">
                                        <div itemscope itemtype="https://schema.org/VideoObject" title="This video can take to 10min for Processing">
                                            <meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/{{$chapter->content}}-1280.jpg"/>
                                            <meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/{{$chapter->content}}-ZUxenC5W.mp4"/>
                                            <div class="embed-responsive embed-responsive-16by9"  > 
                                                <iframe src="https://cdn.jwplayer.com/players/{{$chapter->content}}-eFvNO8QX.html"  frameborder="0" scrolling="auto"  style="position:absolute;" allowfullscreen title="This video can take to 10min for Processing"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Video') }}</label>
                            <div class="col-md-10 ">
                                <input type="file"  name="content" id="exampleInputFile" accept="video/*">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit chapter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection