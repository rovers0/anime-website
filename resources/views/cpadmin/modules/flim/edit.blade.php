@extends('cpadmin.master')
@section('title','Edit flim')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Flim Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.flim.update',['id'=>$flim->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{$flim->name}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('SubName') }}</label>
                            <div class="col-md-10">
                                <input id="subname" type="text" class="form-control" name="subname" value="{{$flim->subname}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Description') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" placeholder="{{$flim->description}}" name="description">{{$flim->description}}</textarea>
                                {{-- <script>
                                    CKEDITOR.replace('description');
                                </script> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Old Image ') }}</label>
                            <div class="col-md-10">
                                <img src="{{$flim->image}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Image') }}</label>
                            <div class="col-md-10">
                                <input type="file" name="image" id="exampleInputFile" accept="image/x-png,image/gif,image/jpeg" value="{{$flim->image}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Category') }}</label>
                            <div class="col-md-10">
                                <div class="row">
                                    @foreach ($listcategory as $item)
                                {{-- <h1>{{$flim->category}}</h1>
                                <h1>{{$item->name}}</h1> --}}
                                    <div class="col-md-3">

                                        @if (strpos("str ".$flim->category,$item->name ) != false)
                                            <input class="ml-md-2" type="checkbox" id="autoSizingCheck" name="category[]" value="{{$item->name}}" checked>
                                        @else
                                            <input class="ml-md-2" type="checkbox" id="autoSizingCheck" name="category[]" value="{{$item->name}}" >
                                        @endif
                                        
                                        <label class="form-check-label ml-md-2" for="autoSizingCheck">{{ str_replace('-',' ',$item->name)}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Total Chap') }}</label>
                            <div class="col-md-10">
                                <input type="number" name="total_chap" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$flim->total_chap}}">
                                <p class="text-muted">Only Number</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Year') }}</label>
                            <div class="col-md-10">
                                <input type="number" name="year" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$flim->year}}" min="2000" max="2040" >
                                <p class="text-muted">Only Number from 2000 to 2040</p>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Flim') }}
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