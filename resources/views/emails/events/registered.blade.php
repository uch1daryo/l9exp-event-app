<p>{{ $event->user->name }} 様</p>
<br>
<p>予約が完了しました。</p>
<br>
<p>利用開始時間 {{ $event->start_at }}</p>
<p>利用終了時間 {{ $event->end_at }}</p>
<br>
<p>予約のキャンセルは <a href="{{ config('app.url') }}/events/cancel/{{ $event->cancel_code }}">こちら</a> から。</p>
