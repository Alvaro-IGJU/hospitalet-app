let mes_actual = (new Date()).getMonth();
let operacion = "today";
let canExecute = true;
function generateEvents(info, successCallback, failureCallback) {
  if (canExecute) {
    if (operacion == "next") {
      mes_actual++;
    } else if (operacion == "prev") {
      mes_actual--;
    } else if (operacion == "today") {
      mes_actual = (new Date()).getMonth();
    }

    if (mes_actual > 11) {
      mes_actual = 0;
    } else if (mes_actual < 0) {
      mes_actual = 11;
    }
    var events = [];
    var currentDate = new Date();
    currentDate.setMonth(mes_actual);
    currentDate.setDate(1);

    let month = mes_actual;
    while (currentDate.getMonth() === month) {
      for (var i = 0; i < bookings.length; i++) {
        var bookingStartDate = new Date(bookings[i].check_in);
        var bookingEndDate = new Date(bookings[i].check_out);

        if (currentDate >= bookingStartDate && currentDate <= bookingEndDate) {

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

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: "UTC",
    initialView: "dayGridMonth",
    fixedWeekCount: false,
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

      if (startDate.getDay() != 6) {
        startDate.setDate(startDate.getDate() - dayOfWeek - 1);
      }
      var endDate = new Date(startDate);
      endDate.setDate(endDate.getDate() + 7);
      let canBook = true;
      let nightPrice = 0;
      //------------------------------------------------
      for (var i = 0; i < bookings.length; i++) {
        var bookingStartDate = new Date(bookings[i].check_in);
        var bookingEndDate = new Date(bookings[i].check_out);
        if (startDate >= bookingStartDate && endDate <= bookingEndDate) {
          canBook = false;
          break;
        }

        // }
      }

      //------------------------------------------------

      if (canBook) {
        for (var i = 0; i < freeWeeks.length; i++) {
          var bookingStartDate = new Date(freeWeeks[i].check_in);
          var bookingEndDate = new Date(freeWeeks[i].check_out);
          if (startDate >= bookingStartDate && endDate <= bookingEndDate) {
            nightPrice = freeWeeks[i].price + "€";
            break;
          }
        }

        calendar.select(startDate, endDate);
        document.querySelectorAll('.fc-highlight').forEach(function (el) {
          el.style.backgroundColor = "rgba(210, 255, 150,.3)";
        });
        document.getElementById("firstDay").innerHTML = startDate.getDate() + "-" + startDate.getMonth() + "-" + startDate.getFullYear();
        document.getElementById("finalDay").innerHTML = endDate.getDate() + "-" + endDate.getMonth() + "-" + endDate.getFullYear();
        document.getElementById("weekNightPrice").innerHTML = nightPrice;
      } else {
        calendar.select(startDate, endDate);

        document.querySelectorAll('.fc-highlight').forEach(function (el) {
          el.style.backgroundColor = "rgba(255, 110, 94,.3)";
        });

      }

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


window.addEventListener('scroll', function () {
  var element = document.getElementById("calendar");
  var distanceFromTop = element.getBoundingClientRect().top;
  if (distanceFromTop <= 100) {
    element.classList.add('sticky');
  } else {
    element.classList.remove('sticky');
  }

  var dateSelector = document.getElementById("dateSelector");
  var distanceFromTop = dateSelector.getBoundingClientRect().top;
  if (distanceFromTop <= 650) {
    dateSelector.classList.add('sticky');
  } else {
    dateSelector.classList.remove('sticky');
  }
});


// let dateDiv = document.getElementsByClassName("date")[0];
// let optionsDate = document.getElementById("datesOptions");
// let peopleDiv = document.getElementsByClassName("people")[0]

// console.log(dateDiv)
// dateDiv.addEventListener("mouseover", (e) => {
//   let date = document.createElement("div");
//   date.classList.add("optionDate")
//   optionsDate.appendChild(date)
//   peopleDiv.style.display = "none";
// })
document.addEventListener('DOMContentLoaded', function () {
  var dateElement = document.querySelector('.border-price.date');
  var datesOptions = document.getElementById('datesOptions');
  var canShowOptions = true;

  dateElement.addEventListener('click', function (event) {
    if (canShowOptions) {
      datesOptions.style.display = 'flex';
      datesOptions.innerHTML = ""; // Limpiar el contenido anterior
      for (var i = 0; i < freeWeeks.length; i++) {
        var bookingStartDate = new Date(freeWeeks[i].check_in);
        var bookingEndDate = new Date(freeWeeks[i].check_out);
        let option = document.createElement("div");
        option.classList.add("optionDay");

        let optionFirstDay = document.createElement("div");
        optionFirstDay.innerHTML = bookingStartDate.getDate() + "-" + (bookingStartDate.getMonth() + 1) + "-" + bookingStartDate.getFullYear(); // Corregir el mes

        let optionEndDay = document.createElement("div");
        optionEndDay.innerHTML = bookingEndDate.getDate() + "-" + (bookingEndDate.getMonth() + 1) + "-" + bookingEndDate.getFullYear(); // Corregir el mes

        option.appendChild(optionFirstDay)
        option.appendChild(optionEndDay)
        datesOptions.appendChild(option)
        option.addEventListener("click",()=>{
          document.getElementById("firstDay").innerHTML =  optionFirstDay.innerHTML;
          document.getElementById("finalDay").innerHTML =  optionEndDay.innerHTML;
          datesOptions.style.display = 'none';
          datesOptions.innerHTML = ""; // Limpiar el contenido
          canShowOptions = true;
        })
      }
      canShowOptions = false;
    }
    event.stopPropagation(); // Evitar la propagación del evento de clic para que no se oculte inmediatamente después de mostrarse
  });

  document.addEventListener('click', function (event) {
    // Si se hace clic fuera del desplegable, ocultarlo
    if (!datesOptions.contains(event.target) && event.target !== dateElement) {
      datesOptions.style.display = 'none';
      datesOptions.innerHTML = ""; // Limpiar el contenido
      canShowOptions = true;
    }
  });

  datesOptions.addEventListener('click', function (event) {
    // Detener la propagación del evento de clic para evitar que se oculte cuando se hace clic dentro del desplegable
    event.stopPropagation();
  });
});
