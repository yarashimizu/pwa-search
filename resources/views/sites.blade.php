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
  <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-striped site-table">
          <!-- テーブルヘッダ -->
          <thead>
            <th>サイト名</th>
            <th>URL</th>
            <th>コメント</th>
            <th></th>
            <th></th>
          </thead>
          <!-- テーブル本体 -->
          <tbody>
            @foreach ($sites as $site)
            <tr>
              <td class="table-text">
                <div>{{ $site->name }}</div>
              </td>
              <td class="table-text">
                <div>{{ $site->url }}</div>
              </td>
              <td class="table-text">
                <div>{{ $site->comment }}</div>
              </td>

              @if($user['role'] ==  99)
                <td>
                  <form action="{{ route('sites.edit',$site->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">更新</button>
                  </form>
                </td>
                <td>
                  <!-- 削除ボタン -->
                  <form action="{{ route('sites.destroy',$site->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                  </form>
                </td>
              @endif
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
  @endif
  <!-- ここまでタスクリスト -->
</div>
@endsection
