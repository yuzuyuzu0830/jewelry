import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    firstDay: 1,
    selectable: true,
  });

  calendar.render();
});

$('#expire-btn').on('click', function() {
  $('#dialog').dialog ({
    title: '使用期限を追加する',
    width: 600,
    height: 600,
    modal: true,
    show: {effect: 'clip', duration: 350},
    hide: {effect: 'clip', duration: 250}
  })
});
