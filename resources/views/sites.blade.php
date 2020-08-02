@extends('layouts.app')

@section('content')
<div class="panel-body">
  @if (count($sites) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">タスクリスト</div>
      <div class="panel-body">
        <table class="table table-striped site-table">
          <!-- テーブルヘッダ -->
          <thead>
            <th>タスク</th>
            <th>締め切り</th>
            <th>コメント</th>
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
              <td>
                <form action="{{ route('sites.edit',$site->id) }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-primary">更新</button>
                </form>
              </td>
              <!-- 追加ここまで -->
              <td>
                <!-- 削除ボタン -->
                <form action="{{ route('sites.destroy',$site->id) }}" method="POST">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">削除</button>
                </form>
              </td>
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
