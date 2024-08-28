document.addEventListener('DOMContentLoaded', function() {
    const daysContainer = document.getElementById('days');
    const monthYearDisplay = document.getElementById('monthYear');
    const prevMonthButton = document.getElementById('prevMonth');
    const nextMonthButton = document.getElementById('nextMonth');
    const eventModal = document.getElementById('eventModal');
    const eventForm = document.getElementById('eventForm');
    const eventDateInput = document.getElementById('eventDate');
    const currentDate = new Date();
    let selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

    function renderCalendar() {
        daysContainer.innerHTML = '';
        monthYearDisplay.textContent = selectedDate.toLocaleDateString('es-ES', { month: 'long', year: 'numeric' });

        const firstDayIndex = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 1).getDay() - 1;
        const lastDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth() + 1, 0).getDate();
        
        for (let i = 0; i < firstDayIndex; i++) {
            daysContainer.appendChild(document.createElement('div'));
        }

        for (let day = 1; day <= lastDate; day++) {
            const dayElement = document.createElement('div');
            dayElement.textContent = day;
            dayElement.addEventListener('click', () => openEventModal(day));
            daysContainer.appendChild(dayElement);
        }
    }

    function openEventModal(day) {
        eventModal.classList.add('active');
        eventDateInput.value = `${selectedDate.getFullYear()}-${String(selectedDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    eventForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const eventData = {
            date: eventDateInput.value,
            title: document.getElementById('eventTitle').value,
            description: document.getElementById('eventDescription').value,
            type: document.getElementById('eventType').value
        };
        console.log(eventData); 
        eventModal.classList.remove('active');
        eventForm.reset();
    });

    prevMonthButton.addEventListener('click', () => {
        selectedDate.setMonth(selectedDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthButton.addEventListener('click', () => {
        selectedDate.setMonth(selectedDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
});