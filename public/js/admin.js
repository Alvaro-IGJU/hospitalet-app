console.log(bookings)

document.addEventListener('DOMContentLoaded', function () {
    apartments.forEach(aparment => {
        let apartmentData = document.getElementById(aparment.id);
        console.log(apartmentData)

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
                                <input id="swal-input4" class="swal2-radio" type="radio" name="estado" ${booking.booked ? "checked" : ""} value="reservado">
                                <label for="swal-input4">Reservado</label>
                            </div>
                            <div>
                                <input id="swal-input5" class="swal2-radio" type="radio" name="estado" ${!booking.booked ? "checked" : ""} value="disponible">
                                <label for="swal-input5">Disponible</label>
                            </div>
                        </div>`,
                    focusConfirm: false,
                    preConfirm: () => {
                        return [
                            document.getElementById('swal-input1').value,
                            document.getElementById('swal-input2').value,
                            document.getElementById('swal-input3').value,
                            document.querySelector('input[name="estado"]:checked').value
                        ];
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const [fechaEntrada, fechaSalida, precio, estado] = result.value;
                        // Aquí puedes hacer lo que quieras con los valores ingresados
                        console.log(`Fecha de entrada: ${fechaEntrada}, Fecha de salida: ${fechaSalida}, Precio: ${precio}, Estado: ${estado}`);
                    }
                });




            })
            table.appendChild(row);
        });
    });

})