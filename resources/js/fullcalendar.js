import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    allDaySlot: false,
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    firstDay: 1,
    events: "/doneItems",

    eventDrop: function(info) {
      editEventDate(info);
    },
    dateClick: function(info) {
      addEvent(calendar, info);
    },
  });

  calendar.render();
});

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function addItems(calendar, info) {
  var title = "jewelry";

  $.ajax ({
    url: '/ajax/addItems',
    type: 'POST',
    dataType: 'json',
    data: {
      "title": title,
      "date": info.dateStr
    }
  }) .done(function(result) {
    calendar.addItems({
      id:result['done_id'],
      title:title,
      start: info.dateSter,
    });
  });
}

function editDate(info){
  var done_id = info.event.id;
  var date = formatDate(info.event.start);

  $.ajax({
      url: '/ajax/editDate',
      type: 'POST',
      data:{
          "id":done_id,
          "newDate":date
          //ドロップしたあとの日付をphp側に渡す
      }
  })
}

function formatDate(date) {
  var year = date.getFullYear();
  var month = date.getMonth() + 1;
    var day = date.getDate();
    var newDate = year + '-' + month + '-' + day;
    return newDate;
}
