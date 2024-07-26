import './bootstrap';
import 'preline'

import {
    getMonth,
    getYear,
    getDaysInMonth,
    startOfWeek,
    endOfWeek,
    startOfMonth,
    endOfMonth,
    eachDayOfInterval,
    addMonths,
    subMonths,
    format,
  } from 'date-fns';

  const datePickerElement = document.getElementById("date-picker");
  const dateInput = document.getElementById("date-input");
  let currentDate = new Date(); // Start with today's date

  function renderCalendar(date) {
    // ... (same calendar rendering logic as before)

    // Highlight selected date
    const selectedDate = dateInput.value;
    const selectedDayElement = document.querySelector(`[data-date="${selectedDate}"]`);
    if (selectedDayElement) {
      selectedDayElement.classList.add('bg-blue-500');
    }
  }

  // Initial render
  renderCalendar(currentDate);

  // Event listeners for navigation buttons
  const prevButton = document.querySelector('[aria-label="Previous"]');
  const nextButton = document.querySelector('[aria-label="Next"]');

  prevButton.addEventListener('click', () => {
    currentDate = subMonths(currentDate, 1);
    renderCalendar(currentDate);
  });

  nextButton.addEventListener('click', () => {
    currentDate = addMonths(currentDate, 1);
    renderCalendar(currentDate);
  });

  // Event listener for day click
  document.getElementById('date-picker-days').addEventListener('click', (event) => {
    if (event.target.tagName === 'SPAN') {
      const selectedDate = event.target.dataset.date;
      dateInput.value = selectedDate; // Update the input field
      renderCalendar(currentDate); // Re-render to highlight the selected date
    }
  });

  // Event listeners for show/hide the date picker
  document.addEventListener('click', (event) => {
    if (event.target === dateInput || datePickerElement.contains(event.target)) {
      datePickerElement.style.display = 'block';
    } else {
      datePickerElement.style.display = 'none';
    }
  });

  // Format initial date input value
  dateInput.value = format(currentDate, 'yyyy-MM-dd');
