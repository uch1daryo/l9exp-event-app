@extends('layouts.app')

@section('title', '予約のキャンセル')

@section('content')
  <form method="POST" action="/events/{{ $event->id }}">
    @csrf
    @method('DELETE')
    <div class="mb-3">
      <label for="event_id" class="form-label">予約ID</label>
      <input class="form-control" type="text" value="{{ $event->id }}" id="event_id" name="event_id" readonly>
    </div>
    <div class="mb-3">
      <label for="start_at" class="form-label">利用開始日時</label>
      <input class="form-control" type="text" value="{{ $event->start_at }}" id="start_at" name="start_at" readonly>
    </div>
    <div class="mb-3">
      <label for="end_at" class="form-label">利用終了日時</label>
      <input class="form-control" type="text" value="{{ $event->end_at }}" id="end_at" name="end_at" readonly>
    </div>
    <div class="mb-3">
      <label for="user_id" class="form-label">ユーザー</label>
      <input class="form-control" type="text" value="{{ $event->user->name }}" id="end_at" name="end_at" readonly>
    </div>
    <button type="submit" class="btn btn-primary">キャンセルする</button>
  </form>
@endsection
