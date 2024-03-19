$.ajax({
    url: '/admin/bookings', // Ruta para obtener todos los bookings
    method: 'GET',
    success: function(response) {
        // Aquí puedes manejar la respuesta, por ejemplo, mostrar los bookings en una tabla o hacer cualquier otra operación con ellos
    },
    error: function(xhr, status, error) {
        // Manejar el error de la manera que prefieras, por ejemplo, mostrar un mensaje de error al usuario
    }
});


document.addEventListener('DOMContentLoaded', function () {
    apartments.forEach(aparment => {
        let apartmentData = document.getElementById(aparment.id);

        let table = apartmentData.querySelector('.apartment-table');
        let header = false;

        bookings[aparment.id].forEach(booking => {
            if (!header) {
                let row = document.createElement("div");
                row.classList.add("row")
                row.classList.add("head-row")

                for (const key in booking) {
                    if (Object.hasOwnProperty.call(booking, key)) {
                        if (key != "created_at" && key != "updated_at" && key != "apartment_id") {
                            let attribute = document.createElement("div");
                            attribute.classList.add("booking-attribute")
                            let text = "";
                            switch (key) {
                                case "id":
                                    text = "ID";
                                    break;
                                case "check_in":
                                    text = "ENTRADA";
                                    break;
                                case "check_out":
                                    text = "SALIDA";
                                    break;
                                case "price":
                                    text = "PRECIO";
                                    break;
                                case "booked":
                                    text = "ESTADO";
                                    break;
                            }
                            attribute.innerHTML = text;
                            row.appendChild(attribute);

                        }
                    }
                }
                table.appendChild(row);
                header = true;
            }

            let row = document.createElement("div");
            row.classList.add("row")
            row.classList.add("row-hover")

            for (const key in booking) {
                if (Object.hasOwnProperty.call(booking, key)) {

                    if (key != "created_at" && key != "updated_at" && key != "apartment_id") {
                        let element = booking[key];
                        let attribute = document.createElement("div");
                        attribute.classList.add("booking-attribute")
                        if (key == "booked") {
                            element = (booking[key]) ? "Reservado" : "Disponible";
                            if (booking[key]) {
                                attribute.classList.add("booked");
                            } else {
                                attribute.classList.add("available")
                            }
                        } else if (key == "price") {
                            element = element + "€";
                        }
                        attribute.innerHTML = element;
                        row.appendChild(attribute);
                    }

                }
            }
            row.addEventListener("click", (e) => {
                Swal.fire({
                    title: 'Formulario de reserva',
                    html:
                        `<div style="display: flex; flex-direction: column;">
                            <label for="swal-input1"><b>ID: ${booking.id}</b></label>
                            <label for="swal-input1">Fecha de entrada:</label>
                            <input id="swal-input1" class="swal2-input" type="date" placeholder="Fecha de entrada" style="margin-bottom: 10px;" value="${booking.check_in}">
                            <label for="swal-input2">Fecha de salida:</label>
                            <input id="swal-input2" class="swal2-input" type="date" placeholder="Fecha de salida" style="margin-bottom: 10px;" value="${booking.check_out}">
                            <label for="swal-input3">Precio:</label>
                            <input id="swal-input3" class="swal2-input" type="number" placeholder="Precio" style="margin-bottom: 10px;" value="${booking.price}">
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: center;">
                            <div style="margin-right: 10px;">
                                <input id="swal-input4" class="swal2-radio" type="radio" name="estado" ${booking.booked ? "checked" : ""} value="1">
                                <label for="swal-input4">Reservado</label>
                            </div>
                            <div>
                                <input id="swal-input5" class="swal2-radio" type="radio" name="estado" ${!booking.booked ? "checked" : ""} value="0">
                                <label for="swal-input5">Disponible</label>
                            </div>
                        </div>`,
                    showCancelButton: true,
                    showConfirmButton: true,
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            check_in: formatDate($('#swal-input1').val()),
                            check_out: formatDate($('#swal-input2').val()),
                            price: $('#swal-input3').val(),
                            booked: $('input[name="estado"]:checked').val()
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = result.value;
                        // Aquí puedes hacer lo que quieras con los valores ingresados

                        // Realizar la llamada AJAX
                        $.ajax({
                            url: '/admin/bookings/' + booking.id,
                            method: 'PUT',
                            data: data,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                            },
                            success: function (response) {
                                // Mostrar un mensaje de éxito

                                row.innerHTML = "";
                                for (const key in response) {
                                    if (Object.hasOwnProperty.call(response, key)) {
                                        if (key != "created_at" && key != "updated_at" && key != "apartment_id") {
                                            let element = response[key];
                                            let attribute = document.createElement("div");
                                            attribute.classList.add("booking-attribute")
                                            if (key == "booked") {
                                                element = (response[key]) ? "Reservado" : "Disponible";
                                                if (response[key]) {
                                                    console.log("OCUPADO",response[key])
                                                    attribute.classList.add("booked");
                                                } else {
                                                    console.log("LIBRE",response[key])
                                                
                                                        
                                                    attribute.classList.add("available")
                                                }
                                            } else if (key == "price") {
                                                element = element + "€";
                                            }
                                            attribute.innerHTML = element;
                                            row.appendChild(attribute);
                                        }

                                    }
                                }
                                Swal.fire('¡Éxito!', 'La reserva se ha actualizar correctamente', 'success');
                            },
                            error: function (xhr, status, error) {
                                console.error('Error en la llamada AJAX:', error);
                                // Mostrar un mensaje de error
                                Swal.fire('Error', 'Hubo un problema al actualizar la reserva', 'error');
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // El usuario ha cancelado, puedes mostrar un mensaje o realizar alguna acción
                        console.log('El usuario ha cancelado la operación.');
                    }
                });







            })
            table.appendChild(row);
        });
    });

})

function formatDate(dateString) {
    const parts = dateString.split('-');
    return `${parts[0]}-${parts[1]}-${parts[2]}`;
}