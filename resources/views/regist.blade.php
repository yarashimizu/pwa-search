@extends('layouts.app')

@section('content')
@include('common.errors')
  <!-- サイト情報登録用フォーム -->
  <form action="{{ route('sites.store') }}" method="POST" class="form-horizontal">
    @csrf
      <!-- PHP側で定義 -->
      @foreach($formInfos as $column => $info)
        <div class="col-sm-6 form-group">
          <label for="{{$column}}" class="col-sm-3 control-label">{{$info['name']}}</label>
          <!-- select形式 -->
          @if($column == 'category')
            <select name="{{$column}}" id="{{$column}}" class="form-control">
              @foreach($category as $num => $categoryName)
                <option value="{{$num}}">{{$categoryName}}</option>
              @endforeach
            </select>
          @else
          <!-- input形式 -->
            <input type="{{$info['type']}}" name="{{$column}}" id="{{$column}}" class="form-control">
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
@endsection