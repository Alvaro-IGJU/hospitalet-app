let mes_actual = (new Date()).getMonth();
let aparmentId = -1;
let getDay = -1;
var language = navigator.language || navigator.userLanguage;
let language_cal = language;
let reservado = "Reservado";
let semanaYaReservada = "Semana ya reservada";
let semanaNoDisponible = "Semana no disponible";
let noche_palabra = "noche";
if (language == 'en') {
  reservado = "Reserved";
  semanaYaReservada = "Week already reserved"
  semanaNoDisponible = "Week not available"
  noche_palabra = "night";
} else if (language == 'fr') {
  reservado = "Réservé";
  semanaYaReservada = "Semaine déjà réservée";
  semanaNoDisponible = "Semaine non disponible"
  noche_palabra = "nuit";

} else if (language == 'de') {
  reservado = "Reserviert";
  semanaYaReservada = "Woche bereits reserviert";
  semanaNoDisponible = "Woche nicht verfügbar"
  noche_palabra = "abend";

} else {
  language_cal = 'es'
}
if (freeWeeks.length > 0) {
  aparmentId = freeWeeks[0].apartment_id;
} else if (bookings.length > 0) {
  aparmentId = bookings[0].apartment_id;
}


let apartmentId = bookings[0]
let operacion = "today";
let canExecute = true;
let nocheWord = document.createElement("p");
nocheWord.textContent = "   " + noche_palabra
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
            title: reservado,
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
    selectable: false,
    locale: language_cal,
    firstDay: 1,
    selectConstraint: {
      start: "00:00",
      end: "23:59",
      dow: [0, 1, 2, 3, 4, 5, 6],
    },
    validRange: {
      start: '2025-06-01',
      end: '2025-10-01' // Octubre no está incluido
    },
    dateClick: function (info) {
      var startDate = new Date(info.date);
      var dayOfWeek = startDate.getDay();
      scrollToElement('#dateSelector');

      if (aparmentId == 1) {
        if (startDate.getDay() != 6) {
          startDate.setDate(startDate.getDate() - dayOfWeek - 1);
        }
      } else if (aparmentId == 2) {
        if (startDate.getDay() != 7) {
          startDate.setDate(startDate.getDate() - dayOfWeek);
        }
      }

      var endDate = new Date(startDate);
      endDate.setDate(endDate.getDate() + 7);
      let canBook = true;
      let nightPrice = semanaNoDisponible;
      let totalPrice = "";
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
            totalPrice = (freeWeeks[i].price * 7) + "€";

            break;
          }
        }

        calendar.select(startDate, endDate);
        document.querySelectorAll('.fc-highlight').forEach(function (el) {
          el.style.backgroundColor = "rgba(210, 255, 150,.3)";

        });

        document.getElementById("firstDay").innerHTML = startDate.getDate() + "-" + (startDate.getMonth() +1) + "-" + startDate.getFullYear();
        document.getElementById("finalDay").innerHTML = endDate.getDate() + "-" + (endDate.getMonth() +1) + "-" + endDate.getFullYear();
        document.getElementById("weekNightPrice").innerHTML = nightPrice;

        if (nightPrice !== semanaNoDisponible) {
          document.getElementById("priceNight").appendChild(nocheWord);
        } else {
          nocheWord.remove();
          document.querySelectorAll('.fc-highlight').forEach(function (el) {
            el.style.backgroundColor = "rgba(255, 110, 94,.3)";
          });
        }

        document.getElementById("totalPrice").innerHTML = totalPrice;
      } else {
        calendar.select(startDate, endDate);

        document.querySelectorAll('.fc-highlight').forEach(function (el) {
          el.style.backgroundColor = "rgba(255, 110, 94,.3)";
        });

        nocheWord.remove();

        nightPrice = semanaYaReservada;
        document.getElementById("firstDay").innerHTML = startDate.getDate() + "-" + (mes_actual + 1) + "-" + startDate.getFullYear();
        document.getElementById("finalDay").innerHTML = endDate.getDate() + "-" + (mes_actual + 1) + "-" + endDate.getFullYear();
        document.getElementById("weekNightPrice").innerHTML = nightPrice;


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
        var price = freeWeeks[i].price; // Asegúrate de que price esté definido aquí
        let totalPrice = freeWeeks[i].price * 7;

        console.log(freeWeeks[i].price)
        let option = document.createElement("div");
        option.classList.add("optionDay");
        option.price = price;
        let optionFirstDay = document.createElement("div");
        optionFirstDay.innerHTML = bookingStartDate.getDate() + "-" + (bookingStartDate.getMonth() + 1) + "-" + bookingStartDate.getFullYear(); // Corregir el mes

        let optionEndDay = document.createElement("div");
        optionEndDay.innerHTML = bookingEndDate.getDate() + "-" + (bookingEndDate.getMonth() + 1) + "-" + bookingEndDate.getFullYear(); // Corregir el mes

        option.appendChild(optionFirstDay)
        option.appendChild(optionEndDay)
        datesOptions.appendChild(option)

        option.addEventListener("click", () => {
          document.getElementById("weekNightPrice").innerHTML = option.price + "€";
          document.getElementById("priceNight").appendChild(nocheWord);

          nocheWord.textContent = "   " + noche_palabra

          document.getElementById("totalPrice").innerHTML = totalPrice + "€";

          document.getElementById("firstDay").innerHTML = optionFirstDay.innerHTML;
          document.getElementById("finalDay").innerHTML = optionEndDay.innerHTML;
          datesOptions.style.display = 'none';
          datesOptions.innerHTML = ""; // Limpiar el contenido
          canShowOptions = true;
        });
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
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
 }
 
 
 function scrollToElement(selector) {
  const element = document.querySelector(selector);
  if (element) {
      const scrollInterval = setInterval(function() {
          if (!isElementInViewport(element)) {
              element.scrollIntoView({ behavior: 'smooth', block: 'center' });
          } else {
              clearInterval(scrollInterval);
          }
      }, 300);
  }
 }
 