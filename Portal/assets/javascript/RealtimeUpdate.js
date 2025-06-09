function updateDateTime() {
    const now = new Date();

    // Get day name
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const dayName = days[now.getDay()];

    // Get month name
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const monthName = months[now.getMonth()];

    // Format date and time
    const date = `${dayName}, ${monthName} ${now.getDate()}, ${now.getFullYear()}`;
    const time = now.toLocaleTimeString('en-US', { hour12: true });

    // Update HTML content
    document.getElementById('date').innerText = date;
    document.getElementById('time').innerText = `Time: ${time}`;
}

// Update time every second
setInterval(updateDateTime, 1000);
updateDateTime(); // initial call to display immediately