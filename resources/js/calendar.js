// jQuery ui
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'jquery-ui/ui/widgets/datepicker.js';


// fullcalendar
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    firstDay: 1,
    headerToolbar: {
      right: 'prevYear,prev,next,nextYear'
    },
    selectable: true,
    eventLimit: true,
    events: '/calendar'
  });
});
