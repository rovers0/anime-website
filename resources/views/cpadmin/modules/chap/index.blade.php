@extends('cpadmin.master')
@section('title','List Chap')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <a href="{{Route('admin.chapter.create')}}" class="btn btn-primary"  title="Create new ">ADD MORE</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                
            </div>
        </div>
        <div class="card-body">
            <h4 class="text-danger">new chapter video can take to 30min for Processing</h4>
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th>ID</th>
                    <th>content</th>
                    <th>Name</th>
                    <th>Flim Name</th>
                    <th>views</th>
                    <th>created_at</th>
                    <th>EDIT</th>
                    <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($chapter as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td title="new chapter video can take to 30min for Processing" width="250px" height="150px">
                            {{-- <div itemscope itemtype="https://schema.org/VideoObject" title="This video can take to 10min for Processing">
                                <meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/{{$item->content}}-1280.jpg"/>
                                <meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/{{$item->content}}-ZUxenC5W.mp4"/>
                                <div class="embed-responsive embed-responsive-16by9"  > 
                                    <iframe src="https://cdn.jwplayer.com/players/{{$item->content}}-eFvNO8QX.html"  frameborder="0" scrolling="auto"  style="position:absolute;" allowfullscreen title="This video can take to 10min for Processing"></iframe>
                                </div>
                            </div> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active" role="presentation">
                                  <a class="nav-link active text-warning" id="home{{$item->id}}-tab" data-toggle="tab" href="#this{{$item->id}}" role="tab" aria-controls="this{{$item->id}}" aria-selected="true">Sever1</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link text-warning" id="profile{{$item->id}}-tab" data-toggle="tab" href="#that{{$item->id}}" role="tab" aria-controls="this{{$item->id}}" aria-selected="false">sever2</a>
                                </li>
                            </ul>
                            <div class="tab-content ">
                                <div class="tab-pane active" id="this{{$item->id}}" role="tabpanel" aria-labelledby="day-tab">
                                    <script src="https://cdn.jwplayer.com/players/{{$item->content}}-YK2Wxq8L.js"></script>
                                </div>
                                <div class="tab-pane " id="that{{$item->id}}" role="tabpanel" aria-labelledby="week-tab">
                                    <div itemscope itemtype="https://schema.org/VideoObject" title="This video can take to 10min for Processing">
                                        <meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/{{$item->content}}-1280.jpg"/>
                                        <meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/{{$item->content}}-ZUxenC5W.mp4"/>
                                        <div class="embed-responsive embed-responsive-16by9"  > 
                                            <iframe src="https://cdn.jwplayer.com/players/{{$item->content}}-eFvNO8QX.html"  frameborder="0" scrolling="auto"  style="position:absolute;" allowfullscreen title="This video can take to 10min for Processing"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <script src="https://cdn.jwplayer.com/players/{{$item->content}}-eFvNO8QX.js"></script> --}}
                            {{-- <script src="https://cdn.jwplayer.com/players/{{$item->content}}-kGWxh33Q.js"></script> --}}

                         </td>
                        <td>{{ str_replace('-',' ',$item->title)}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->views}}</td>
                        <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        <td><a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.chapter.edit',['id'=>$item->id])}}">EDIT</a></td>
                        <td><a class="bg-danger rounded-pill p-2 text-center" href="{{Route('admin.chapter.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this Chapter ?')">DELETE</a></td>
                    </tr>         
                    @endforeach    
               </tbody>
               <tfoot>
                <tr>
                    <th>ID</th>
                     <th>content</th>
                     <th>Name</th>
                     <th>Flim Name</th>
                     <th>views</th>
                     <th>created_at</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                 </tr>
               </tfoot>
            </table>
         </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
@endsection
