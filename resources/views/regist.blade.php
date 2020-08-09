@extends('layouts.app')

@section('content')
@include('common.errors')
  <!-- サイト情報登録用フォーム -->
  <form 
    action="{{ route('sites.store') }}"
    method="POST"
    class="form-horizontal"
    enctype="multipart/form-data"
  >
    @csrf
      <!-- PHP側で定義 -->
      <input type="hidden" name="id" value="{{$id}}" />
      @foreach($formInfos as $column => $info)
        <div class="col-sm-6 form-group">
          <label for="{{$column}}" class="col-sm-3 control-label">{{$info['name']}}</label>
          <!-- select形式 -->
          @if($info['type'] == 'select')
            <select name="{{$column}}" id="{{$column}}" class="form-control">
              @foreach($category as $num => $categoryName)
                @if($info['value'] == $num)
                  <option value="{{$num}}" selected>{{$categoryName}}</option>
                @else
                  <option value="{{$num}}" >{{$categoryName}}</option>
                @endif
              @endforeach
            </select>
          @elseif($info['type'] == 'file')
          <!-- ファイルアップロード形式-->
            @if(!empty($info['value']))
              <img src="{{ asset('storage/' . $info['value']) }}" />
            @endif
            <div id="imagepre"></div>
          @else
          <!-- input形式 -->
            <input 
              type="{{$info['type']}}"
              name="{{$column}}"
              id="{{$column}}"
              class="form-control"
              value="{{$info['value']}}">
          @endif
        </div>
      @endforeach
    <!-- 登録ボタン -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
  <!-- プレビュー表示用のReact読み込み -->
  <script src="{{ asset('js/app.js')}}"></script>
@endsection