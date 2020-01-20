<script>
    $(document).ready(function() {
//  Calendar
        let today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();
        let selectYear = document.getElementById("year");
        let selectMonth = document.getElementById("month");

        let months = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];

        let monthAndYear = document.getElementById("monthAndYear");
        showCalendar(currentMonth, currentYear);


        window.next = function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            showCalendar(currentMonth, currentYear);
        }

        window.prev = function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            showCalendar(currentMonth, currentYear);
        }

        window.jump =function jump() {
            currentYear = parseInt(selectYear.value);
            currentMonth = parseInt(selectMonth.value);
            showCalendar(currentMonth, currentYear);
        }

        window.addAud = function addAud(elem, day, month, year) {
            // Gets the selected date and adds it to the input
            $(".bg-info-selected").removeClass("bg-info-selected")
            elem.classList.add("bg-info-selected");

            if (month < 9){
                if (day < 10) {
                    $('#fecha').val("0" + day + "-0" + month + "-" + year);
                } else {
                    $('#fecha').val(day + "-0" + month + "-" + year);
                }
            } else {
                $('#fecha').val(day + "-" + month + "-" + year);
            }

        }

        function showCalendar(month, year) {

            let firstDay = (new Date(year, month)).getDay();
            let daysInMonth = 32 - new Date(year, month, 32).getDate();

            let tbl = document.getElementById("calendar-body"); // body of the calendar

            // clearing all previous cells
            tbl.innerHTML = "";

            // filing data about month and in the page via DOM.
            monthAndYear.innerHTML = months[month] + " " + year;
            selectYear.value = year;
            selectMonth.value = month;

            // creating all cells
            let date = 1;
            for (let i = 0; i < 6; i++) {
                // creates a table row
                let row = document.createElement("tr");
                @if(!empty($fechas))
                    let fechas = [
                        @foreach($fechas as $fecha)
                            "{{ $fecha }}",
                        @endforeach
                    ];
                @endif

                //creating individual cells, filing them up with data.
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        let cell = document.createElement("td");
                        let cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        let cell = document.createElement("td");
                        cell.setAttribute("onclick", "addAud(this,"+ date + "," + (month+1) + "," + year +")");
                        let cellText = document.createTextNode(date);
                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.classList.add("bg-info");
                        } // color today's date
                        cell.appendChild(cellText);
                        @if(!empty($fechas))
                        let mark;
                        for (let k = 0; k < fechas.length; k++) {
                            let dia = fechas[k].substr(0,2);
                            let mes = fechas[k].substr(2,2);
                            let ano = fechas[k].substr(5);
                            if(ano == year){
                                if (mes == month+1){
                                    if (dia == date){
                                        mark = document.createElement("span");
                                        mark.classList.add("dot");
                                        let letters = '0123456789ABCDEF';
                                        let color = '#';
                                        for (let m = 0; m < 6; m++) {
                                            color += letters[Math.floor(Math.random() * 16)];
                                        }
                                        mark.style.backgroundColor = color;
                                        cell.appendChild(mark);
                                    }
                                }
                            }
                        }
                        @endif
                        row.appendChild(cell);
                        date++;
                    }
                }

                tbl.appendChild(row); // appending each row into calendar body.
            }

        }
//  /Calendar
    });
</script>
