@extends('layouts.app')

@section('title', '予約の登録')

@section('content')
  <form method="POST" action="/events">
    @csrf
    <div class="mb-3">
      <label for="start_at" class="form-label">利用開始日時</label>
      <input class="form-control" type="text" value="{{ $period['start'] }}" id="start_at" name="start_at" readonly>
    </div>
    <div class="mb-3">
      <label for="end_at" class="form-label">利用終了日時</label>
      <input class="form-control" type="text" value="{{ $period['end'] }}" id="end_at" name="end_at" readonly>
    </div>
    <div class="mb-3">
      <label for="user_id" class="form-label">ユーザー</label>
      <select class="form-select" id="user_id" name="user_id">
        <option selected>ユーザーを選択してください</option>
        @foreach ($users as $user)
          <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">登録する</button>
  </form>
@endsection
