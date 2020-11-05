@extends('cpadmin.master')
@section('title','Create Chapter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chapter Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.chapter.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-row">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Title') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="title" value="{{old('title')}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="flim_id" class="col-md-2 col-form-label text-md-left">{{ __('FLIM') }}</label>
                            <div class="col-md-10">
                                <select name="flim_id" class="form-control">
                                    @foreach ($flim as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __(' Chap index') }}</label>
                            <div class="col-md-10">
                                <input type="number" name="chap" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{old('chap')}}">
                                <p class="text-muted">Only Number</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Source Video') }}</label>
                            <div class="col-md-10">
                                <input type="file" name="content" id="exampleInputFile" accept="video/*" required value="{{old('content')}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Chapter') }}
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