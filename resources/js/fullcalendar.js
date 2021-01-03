import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new Calendar(calendarEl, {
    allDaySlot: false,
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    firstDay: 1,
  });

  calendar.render();
});

$("#done-btn").click(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    var formData = $("#list-items").serialize();
    console.log(formData);

    $.ajax({
      type: "post",
      url: "/postitems",
      dataType: "json",
      // serializeしたデータを指定
      data: formData,
    })
      //通信が成功したとき
      .then((res) => {
        console.log(res);

        // カレンダーの再描画
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: "prev,next today",
            center: "title",
          },
          locale: "ja",
          editable: true,
          googleCalendarApiKey: "AIzaSyBmTA6PLvASN0Xg-6_6Jqa46kObn_TSWJ8",
          eventSources: [
            {
            //祝日の予定を取得
              googleCalendarId: "japanese__ja@holiday.calendar.google.com",
              rendering: "background",
              color: "#FF6666",
            },
          ],
          events: "/getlist",
          selectable: true,
        });
        calendar.render();
      })
      //通信が失敗したとき
      .fail((error) => {
        console.log(error.statusText);
      });
  });
