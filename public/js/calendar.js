document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: 'dayGridMonth',
      editable: true,
      selectable: true,
      locale: 'es',
      firstDay: 1,
      dateClick: function(info) {

        var dayOfWeek = info.date.getDay();
        

        var startDate = new Date(info.date);
        startDate.setDate(startDate.getDate() + (6 - dayOfWeek) + (dayOfWeek === 6 ? 7 : 0));
  
        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + 8);
  
        calendar.select(startDate, endDate);
        alert(startDate + endDate);
      },
    });
  
    calendar.render();
});

