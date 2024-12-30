// Functie om het formulier te valideren
function validateForm(event) {
    event.preventDefault();

    // Verkrijg ingevoerde data
    const startDate  = document.getElementById('startDate').value;
    const endDate    = document.getElementById('endDate').value;
    const cameraId   = document.getElementById('camera').value;
    const messageDiv = document.getElementById('message');

    // Reset het vorige bericht
    messageDiv.innerHTML = '';
    messageDiv.className = 'notification is-hidden';

    // Check startdatum/einddateum en einddatum ingevuld zijn
    if (!startDate || !endDate || !cameraId) {
        showMessage('Vul alstublieft de startdatum, einddatum in en selecteer een camera.');
        return;
    }

    // Check of de einddatum later is dan de startdatum
    if (new Date(endDate) < new Date(startDate)) {
        showMessage('Einddatum moet later zijn dan de startdatum.');
        return;
    }

    // Maak de api call
    fetch('/api/frontend/camera/available', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    })
        .then(response => {
            if (response.status === 200) {
                showMessage('De camera is beschikbaar voor de gekozen periode.', 'is-success');
            } else {
                showMessage('De camera is niet beschikbaar voor de gekozen periode.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Er is een fout opgetreden bij het controleren van de beschikbaarheid.');
        });
}

/**
 * Show message
 * @param message
 * @param type
 */
function showMessage(message, type = 'is-danger')
{
    const messageDiv = document.getElementById('message');

    messageDiv.innerHTML = message;
    messageDiv.className = `notification ${type}`;
    messageDiv.classList.remove('is-hidden');
}

// Event listener voor formulier
document.getElementById('verhuurForm').addEventListener('submit', validateForm);
