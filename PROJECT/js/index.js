document.addEventListener("DOMContentLoaded", function() {
    // Ottieni tutti i pulsanti
    var buttons = document.querySelectorAll('.button');

    // Funzione per cambiare il testo del pulsante con un ritardo
    function changeButtonText(button, text) {
        setTimeout(function() {
            button.querySelector('.button-text').textContent = text;
        }, 100000); 
    }

    // Aggiungi un gestore per l'evento mouseover a ciascun pulsantes
    buttons.forEach(function(button) {
        button.addEventListener('mouseover', function() {
            var role = button.dataset.role; // Ottieni il ruolo del pulsante
            var buttonText = "Accedi";

            // Cambia il testo in base al ruolo del pulsante
            switch(role) {
                case "coordinatore":
                    buttonText = "ACCEDI";
                    break;
                case "docente":
                    buttonText = "ACCEDI";
                    break;
                case "studente":
                    buttonText = "ACCEDI";
                    break;
            }

            // Chiamata alla funzione per cambiare il testo del pulsante con un ritardo
            changeButtonText(button, buttonText);
        });
    });
});

