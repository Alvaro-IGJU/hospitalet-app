//https://fullcalendar.io/docs/multimonth-grid

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
        var startDate = new Date(info.date);
        var dayOfWeek = startDate.getDay();
        
        startDate.setDate(startDate.getDate() - dayOfWeek -1);

        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + 7);

        calendar.select(startDate, endDate);
      },
      
    });
  
    calendar.render();
});

window.addEventListener('scroll', function() {
  var element = document.getElementById("calendar");
  var distanceFromTop = element.getBoundingClientRect().top;
  if (distanceFromTop <= 100) {
    element.classList.add('sticky');
} else {
    element.classList.remove('sticky');
}
});