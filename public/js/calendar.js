let mes_actual = (new Date()).getMonth();
let operacion = "today";
let canExecute = true;

function generateEvents(info, successCallback, failureCallback) {
  if (canExecute) {
    if (operacion == "next") {
      mes_actual++;
    } else if (operacion == "prev") {
      mes_actual--;
    }else if(operacion == "today"){
      mes_actual = (new Date()).getMonth();
    }

    if (mes_actual > 11) {
      mes_actual = 0;
    } else if (mes_actual < 0) {
      mes_actual = 11;
    }
    console.log(mes_actual);
    var events = [];
    var currentDate = new Date();
    currentDate.setMonth(mes_actual);
    currentDate.setDate(1);

    let month = mes_actual;
    console.log(".........................................");
    while (currentDate.getMonth() === month) {
      for (var i = 0; i < bookings.length; i++) {
        var bookingStartDate = new Date(bookings[i].check_in);
        var bookingEndDate = new Date(bookings[i].check_out);

        if (currentDate >= bookingStartDate && currentDate <= bookingEndDate) {
          console.log(currentDate);
          console.log(bookingEndDate);
          console.log(currentDate >= bookingStartDate);
          console.log(currentDate <= bookingEndDate);
          console.log("---------------------");

          console.log("HA ENTRADO");
          events.push({
            title: "Reservado",
            start: bookingStartDate,
            end: new Date(bookingEndDate),
            backgroundColor: "#FF6666",
          });
          currentDate.setDate(currentDate.getDate() + 6);

          break;
        }
      }
      currentDate.setDate(currentDate.getDate() + 1);
    }
    canExecute = false;
    successCallback(events);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  console.log(bookings);

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: "UTC",
    initialView: "dayGridMonth",
    editable: false,
    selectable: true,
    locale: "es",
    firstDay: 1,
    selectConstraint: {
      start: "00:00",
      end: "23:59",
      dow: [0, 1, 2, 3, 4, 5, 6],
    },
    dateClick: function (info) {
      var startDate = new Date(info.date);
      var dayOfWeek = startDate.getDay();

      startDate.setDate(startDate.getDate() - dayOfWeek - 1);

      var endDate = new Date(startDate);
      endDate.setDate(endDate.getDate() + 7);

      calendar.select(startDate, endDate);
    },
    events: generateEvents,
  });

  calendar.render();

  var nextButton = document.getElementsByClassName("fc-next-button")[0];
  var previousButton = document.getElementsByClassName("fc-prev-button")[0];
  var todayButton = document.getElementsByClassName("fc-today-button")[0];

  nextButton.addEventListener("click", function () {
    canExecute = true;
    operacion = "next";
    calendar.refetchEvents(); // Esto recargará los eventos del calendario
  });

  previousButton.addEventListener("click", function () {
    canExecute = true;
    operacion = "prev";
    calendar.refetchEvents(); // Esto recargará los eventos del calendario
  });

  todayButton.addEventListener("click", function () {
    canExecute = true;
    operacion = "today";
    calendar.refetchEvents(); // Esto recargará los eventos del calendario
  });
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
