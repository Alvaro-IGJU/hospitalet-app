// const { bt } = require("@fullcalendar/core/internal-common");

let bookings;
document.addEventListener('DOMContentLoaded', function () {

    $.ajax({
        url: '/admin/bookings',
        method: 'GET',
        success: function (response) {
            bookings = response;

            updateTables();

        },
        error: function (xhr, status, error) {
            // Manejar el error de la manera que prefieras, por ejemplo, mostrar un mensaje de error al usuario
        }
    });
})

function formatDate(dateString) {
    const parts = dateString.split('-');
    return `${parts[0]}-${parts[1]}-${parts[2]}`;
}

function updateTables() {


    apartments.forEach(aparment => {
        let apartmentData = document.getElementById(aparment.id);
        let btn = apartmentData.querySelector('.btn-success');
        let btnAutomatic = apartmentData.querySelector('.btn-warning');
        let btnExcel = apartmentData.querySelector('.btn-excel');

        btn.addEventListener("click", () => {
            Swal.fire({
                title: 'Agregar semana',
                html:
                    `<div style="display: flex; flex-direction: column;">
                        <label for="swal-input1"><b> ${aparment.name}</b></label>
                        <label for="swal-input1">Fecha de entrada:</label>
                        <input id="swal-input1" class="swal2-input" type="date" placeholder="Fecha de entrada" style="margin-bottom: 10px;" >
                        <label for="swal-input2">Fecha de salida:</label>
                        <input id="swal-input2" class="swal2-input" type="date" placeholder="Fecha de salida" style="margin-bottom: 10px;" >
                        <label for="swal-input3">Precio:</label>
                        <input id="swal-input3" class="swal2-input" type="number" placeholder="Precio" style="margin-bottom: 10px;" >
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: center;">
                        <div style="margin-right: 10px;">
                            <input id="swal-input4" class="swal2-radio" type="radio" name="estado" value="1">
                            <label for="swal-input4">Reservado</label>
                        </div>
                        <div>
                            <input id="swal-input5" class="swal2-radio" type="radio" name="estado"  value="0">
                            <label for="swal-input5">Disponible</label>
                        </div>
                    </div>`,
                showCancelButton: true,
                showConfirmButton: true,
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        apartment_id: aparment.id,
                        check_in: formatDate($('#swal-input1').val()),
                        check_out: formatDate($('#swal-input2').val()),
                        price: $('#swal-input3').val(),
                        booked: $('input[name="estado"]:checked').val()
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = result.value;

                    $.ajax({
                        url: '/admin/bookings/',
                        method: 'POST',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },
                        success: function (response) {
                            btnAutomatic.style.display = "none"

                            $.ajax({
                                url: '/admin/bookings/',
                                method: 'GET',
                                success: function (result) {
                                    console.log(result)
                                    bookings = result;
                                    updateTables();

                                },
                                error: function (xhr, status, error) {
                                }
                            });
                            Swal.fire('¡Éxito!', 'La reserva se ha creado correctamente', 'success');
                        },
                        error: function (xhr, status, error) {
                            console.error('Error en la llamada AJAX:', error);
                            Swal.fire('Error', 'Hubo un problema al crear la reserva', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('El usuario ha cancelado la operación.');
                }
            });
        })

        btnAutomatic.addEventListener("click", () => {
            Swal.fire({
                title: '¿Quieres generar las semanas automáticamente?',
                showCancelButton: true,
                showConfirmButton: true,
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        apartment_id: aparment.id,
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = result.value;

                    $.ajax({
                        url: '/admin/bookings/automatic',
                        method: 'POST',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },
                        success: function (response) {
                            btnAutomatic.style.display = "none";
                            btnExcel.style.display = "block";


                            $.ajax({
                                url: '/admin/bookings/',
                                method: 'GET',
                                success: function (result) {
                                    console.log(result)
                                    bookings = result;
                                    updateTables();

                                },
                                error: function (xhr, status, error) {
                                }
                            });
                            Swal.fire('¡Éxito!', 'Se han generado las semanas automáticamente', 'success');
                        },
                        error: function (xhr, status, error) {
                            Swal.fire('Error', 'Hubo un problema al generar las reservas', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('El usuario ha cancelado la operación.');
                }
            });
        })

        btnExcel.addEventListener("click", () => {
            $.ajax({
                url: '/admin/bookings/excel/' + aparment.id,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function (response) {
                    // Decodificar el contenido base64
                    var decodedData = atob(response.base64);
        
                    // Convertir el contenido decodificado en un array de bytes
                    var byteArray = new Uint8Array(decodedData.length);
                    for (var i = 0; i < decodedData.length; i++) {
                        byteArray[i] = decodedData.charCodeAt(i);
                    }
        
                    // Crear un Blob a partir del array de bytes
                    var blob = new Blob([byteArray], { type: 'application/octet-stream' });
        
                    // Crear un enlace <a> para descargar el archivo
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'archivo.xlsx'; // Cambiar el nombre del archivo según sea necesario
        
                    // Simular clic en el enlace para iniciar la descarga
                    link.click();
                },
                error: function (xhr, status, error) {
                    Swal.fire('Error', 'Hubo un problema al generar el excel', 'error');
                }
            });
        });
        let table = apartmentData.querySelector('.apartment-table');
        let rows = table.querySelectorAll(".row");
        rows.forEach((row) => {
            row.parentNode.removeChild(row);
        });
        let header = false;
        console.log(bookings[aparment.id])
        if (bookings[aparment.id].length == 0) {
            btnAutomatic.style.display = "block";
            btnExcel.style.display = "none";

        }
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
                        </div>
                        <div class="delete-div"><i onclick="deleteWeek(${booking.id})" class="fa-solid fa-trash-can" style="color: #fb3c3c;"></i></div>
                        `,
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

                        $.ajax({
                            url: '/admin/bookings/' + booking.id,
                            method: 'PUT',
                            data: data,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                            },
                            success: function (response) {

                                $.ajax({
                                    url: '/admin/bookings/',
                                    method: 'GET',
                                    success: function (result) {
                                        console.log(result)
                                        bookings = result;
                                        updateTables();

                                    },
                                    error: function (xhr, status, error) {
                                    }
                                });
                                Swal.fire('¡Éxito!', 'La reserva se ha actualizado correctamente', 'success');
                            },
                            error: function (xhr, status, error) {
                                console.error('Error en la llamada AJAX:', error);
                                Swal.fire('Error', 'Hubo un problema al actualizar la reserva', 'error');
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        console.log('El usuario ha cancelado la operación.');
                    }
                });







            })
            table.appendChild(row);
        });
    });
}

function deleteWeek(bookingId) {
    Swal.fire({
        title: '¿Seguro que quieres borrar esta semana?',
        showCancelButton: true,
        showConfirmButton: true,
        focusConfirm: false,
        preConfirm: () => {
            return {
                booking_id: bookingId
            };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const data = result.value;

            $.ajax({
                url: '/admin/bookings/' + bookingId,
                method: 'DELETE',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function (response) {

                    $.ajax({
                        url: '/admin/bookings/',
                        method: 'GET',
                        success: function (result) {
                            console.log(result)
                            bookings = result;
                            updateTables();

                        },
                        error: function (xhr, status, error) {
                        }
                    });
                    Swal.fire('¡Éxito!', 'La reserva se ha actualizado correctamente', 'success');
                },
                error: function (xhr, status, error) {
                    console.error('Error en la llamada AJAX:', error);
                    Swal.fire('Error', 'Hubo un problema al actualizar la reserva', 'error');
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            console.log('El usuario ha cancelado la operación.');
        }
    });
}