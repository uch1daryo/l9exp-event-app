{{ $event->user->name }} 様

予約が完了しました。

利用開始時間 {{ $event->start_at }}
利用終了時間 {{ $event->end_at }}

予約のキャンセルは {{ config('app.url') }}/events/cancel/{{ $event->cancel_code }} から。
