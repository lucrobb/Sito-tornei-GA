document.addEventListener('DOMContentLoaded', () => {
    const conferma = document.getElementById("conferma_successo");

    if (conferma) {
        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get('email');
        
        if (email) {
            conferma.textContent = `La tua iscrizione è stata completata con successo, la conferma ufficiale sarà mandata per email al seguente indirizzo: ${email}. 
            La partecipazione al torneo sarà confermata più tardi, non è decisa in questo momento.`;
        }
    }
    const titolo = document.getElementById("conferma_titolo");

    if (titolo) {
        const urlParams = new URLSearchParams(window.location.search);
        const nome = urlParams.get('nome');
        
        if (nome) {
            titolo.textContent = `Grazie mille, ${nome}!`;
        }
    }
})
    