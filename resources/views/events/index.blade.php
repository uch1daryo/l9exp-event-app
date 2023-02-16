@extends('layouts.app')

@section('title', '予約の一覧')

@section('content')
  @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div id="calendar"></div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let calendarEl = document.getElementById("calendar");
      let calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: "bootstrap5",
        initialView: "timeGridWeek",
        headerToolbar: {
          left: "today",
          center: "title",
          right: "next"
        },
        events: "/api/events",
        selectable: true,
        select: function(info) {
          document.location.href = "/events/create?start=" + info.startStr + "&end=" + info.endStr;
        },
        allDaySlot: false,
        slotMinTime: "06:00:00",
        slotMaxTime: "21:00:00",
        contentHeight: "auto",
        timeZone: "Asia/Tokyo",
        locale: "ja"
      });
      calendar.render();
    });
  </script>
@endsection
