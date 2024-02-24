const calendar = document.getElementById("calendar")

flatpickr("#calendar", {
    mode: "range", // Modo de selección de rango
    dateFormat: "Y-m-d", // Formato de fecha (ajústalo según tus necesidades)
    onChange: function(selectedDates, dateStr, instance) {
        console.log(dateStr)
        const fechas = dateStr.split(" to ");
        const fechaInicio = new Date(fechas[0]);
        const fechaFin = new Date(fechas[1]);
        
        // Calcular la diferencia en milisegundos entre las dos fechas
        const diferenciaMilisegundos = fechaFin - fechaInicio;
        
        // Calcular el número de milisegundos en una semana
        const unaSemanaEnMilisegundos = 7 * 24 * 60 * 60 * 1000;
        
        // Verificar si la diferencia es menor a una semana
        if (diferenciaMilisegundos < unaSemanaEnMilisegundos) {
            Swal.fire({
                position: "middle",
                icon: "error",
                title: "Debes seleccionar mínimo una semana",
                showConfirmButton: false,
                timer: 1500,
              });
        } else {
            console.log("El rango de fechas es igual o mayor a una semana.");
        }
           
        
    }
});


console.log("HJIUHUIHUHI")
// {
//     disable: ["2025-01-30", "2025-02-21", "2025-03-08", new Date(2025, 4, 9) ],
//     dateFormat: "Y-m-d",
// }

// const days = document.getElementsByClassName("flatpickr-day");

// // Recorrer la lista de elementos y agregar un event listener a cada uno
// for (let i = 0; i < days.length; i++) {
//     days[i].addEventListener("click", (e) => {
//         let day = e.target;
//         let sibling;
//         for (let i = 0; i < 7; i++) {
            
//             if (i == 0) { sibling = day.nextElementSibling; }
//             else if (i == 6) {sibling.nextElementSibling; sibling.classList.add("endRange");  sibling.classList.add("selected");    }
//             else { sibling = sibling.nextElementSibling;
//                 console.log(sibling)
//                 sibling.style.backgroundColor = "red";
//                 sibling.classList.add("inRange");
               
//             }
            
//         }

//     });
// }