import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');

  const calendar = new Calendar(calendarEl, {
    allDaySlot: false,
    plugins: [dayGridPlugin, interactionPlugin],
    defaultView: 'dayGridMonth',

    events: []
  });

  calendar.render();
});
