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
                        }else if(key == "price"){
                            element = element + "€";
                        }
                        attribute.innerHTML = element;
                        row.appendChild(attribute);
                    }

                }
            }
            table.appendChild(row);
        });
    });

})