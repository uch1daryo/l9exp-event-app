@extends('layouts.app')

@section('title', '予約の一覧')

@section('content')
  <div id="calendar"></div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let calendarEl = document.getElementById("calendar");
      let calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: "bootstrap5",
        initialView: "dayGridMonth",
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
        },
        locale: "en"
      });
      calendar.render();
    });
  </script>
@endsection
