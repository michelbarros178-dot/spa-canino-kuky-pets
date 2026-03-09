document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const appointmentForm = document.getElementById('appointmentForm');
    const fechaInput = document.getElementById('fecha');
    const horaSelect = document.getElementById('hora');
    const messageDisplay = document.getElementById('message');

    // Horas de trabajo disponibles (DEBEN COINCIDIR con get_availability.php)
    // Aquí solo se usa para pre-cargar el select con TODAS las opciones antes de filtrar
    const availableHours = [
        "09:00:00", "10:00:00", "11:00:00", "12:00:00", 
        "14:00:00", "15:00:00", "16:00:00", "17:00:00"
    ];

    // Función para mostrar mensajes
    function showMessage(msg, type = 'success') {
        messageDisplay.textContent = msg;
        messageDisplay.className = ''; 
        messageDisplay.classList.add(type === 'success' ? 'message-success' : 'message-error');
        messageDisplay.classList.remove('hidden');
        setTimeout(() => {
            messageDisplay.classList.add('hidden');
        }, 5000);
    }
    
    /**
     * Carga las horas disponibles para la fecha seleccionada
     * consultando el backend (get_availability.php).
     */
    function loadHours(selectedDate) {
        // Limpiar el select
        horaSelect.innerHTML = '<option value="">-- Selecciona una hora --</option>';
        fechaInput.value = selectedDate;

        fetch(`get_availability.php?date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const occupiedHours = data.data.occupied;
                    const allSlots = data.data.all_slots;

                    if (occupiedHours.length === allSlots.length) {
                         // El día está lleno, informamos al usuario
                        const option = document.createElement('option');
                        option.textContent = "Día Completo AGENDADO";
                        option.disabled = true;
                        horaSelect.appendChild(option);
                        return;
                    }

                    allSlots.forEach(hour => {
                        const option = document.createElement('option');
                        option.value = hour;
                        option.textContent = hour;

                        // Deshabilitar la hora si está ocupada
                        if (occupiedHours.includes(hour)) {
                            option.disabled = true;
                            option.textContent += " (Ocupada)";
                            option.style.backgroundColor = '#f7d6d6'; // Fondo suave para ocupado
                        }
                        horaSelect.appendChild(option);
                    });

                } else {
                    showMessage('Error al obtener la disponibilidad de horas.', 'error');
                }
            })
            .catch(error => {
                console.error('Error de red al cargar horas:', error);
                showMessage('Error de conexión con el servidor al cargar horas.', 'error');
            });
    }

    // Inicialización de FullCalendar
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        // FUNCIÓN CLAVE: Carga dinámica de eventos desde PHP
        events: function(fetchInfo, successCallback, failureCallback) {
            fetch('get_availability.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const formattedEvents = data.data.map(item => ({
                            title: item.title,
                            start: item.date,
                            display: 'background', // Muestra solo el color de fondo
                            color: item.color // Color definido en PHP (#d9534f o #f0ad4e)
                        }));
                        successCallback(formattedEvents);
                    } else {
                        failureCallback(data.message);
                    }
                })
                .catch(error => {
                    failureCallback(error);
                });
        },
        
        // Cuando el usuario hace clic en una fecha
        dateClick: function(info) {
            const clickedDate = info.dateStr; 
            loadHours(clickedDate);
            document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });
        }
    });

    calendar.render();

    // Manejo del envío del formulario (mantener la lógica de save_data.php)
    appointmentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(appointmentForm);
        
        fetch('save_data.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('Cita guardada con éxito.', 'success');
                appointmentForm.reset();
                fechaInput.value = ''; 
                horaSelect.innerHTML = '<option value="">-- Selecciona una hora --</option>';
                
                // IMPORTANTE: Recargar los eventos para actualizar el color del día
                calendar.refetchEvents(); 
            } else {
                showMessage('Error al guardar la cita: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error en la petición:', error);
            showMessage('Error de conexión con el servidor.', 'error');
        });
    });

});