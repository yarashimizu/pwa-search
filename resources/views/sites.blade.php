@extends('layouts.app')

@section('content')
<div class="panel-body ">
  <div class="panel panel-default">
    <div class="panel-heading">検索条件</div>
    <form action="{{ route('index') }}" method="GET">
      <div class="col-sm-6 form-group">
        @csrf
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">検索</button>
    </form>
  </div>
  @if (count($sites) > 0)
  <div class="panel panel-default p-4">
      <div class="card-deck">
        <div class="row">
        @foreach ($sites as $site)
            <div class="col-sm-5">
              <div class="card mt-4 h-100" style="width: 17rem;">
                <a href="{{ $site->url }}" target="_blank" style="color: black">
                  <img src="{{asset('storage/sites/' . $site->top_image)}}"
                    class="bd-placeholder-img card-img-top"
                    width="100%" height="180" xmlns="http://www.w3.org/2000/svg" 
                    preserveAspectRatio="xMidYMid slice" focusable="false"
                    role="img" aria-label="Placeholder: Image cap"
                  />
                </a>
                <div class="card-body">
                <h5 class="card-title">
                  <a href="{{ $site->url }}" target="_blank" style="color: black">{{ $site->name }}</a>
                </h5>
                <p class="card-text">
                  <!-- サイト管理者 -->
                  <p>{{$site->company}}</p>
                  <p>{{$site->comment}}</p>
                  <p>{{$category["$site->category"]}}</p>
                  <!--p>評価 ★★★★★★</p-->
                </p>
              </div>
                
              </div>
            </div>
            <!-- 管理者用 -->
            @if($user['role'] ==  99)
              <form action="{{ route('sites.edit',$site->id) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">更新</button>
              </form>
              <form action="{{ route('sites.destroy',$site->id) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">削除</button>
              </form>
            @endif
        @endforeach
        </div>
    </div>
  </div>
  @endif
  <!-- ここまでタスクリスト -->
</div>
@endsection
