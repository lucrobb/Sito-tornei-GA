function goToIdentity(){
    const selected = document.querySelector('input[name="torneo"]:checked');

    if (!selected) {
        alert("Seleziona un'attività prima di continuare.");
        return;
    }
    document.getElementById("scelta_torneo").classList.remove("active", "forward");
    document.getElementById("identity_selection").classList.add("active", "forward");
}

function goToDati() {
    const identity = document.querySelector('input[name="identity"]:checked');

    if (!identity) {
        alert("Seleziona se sei prof o allievo/a.");
        return;
    }
    
    document.getElementById("identity_selection").classList.remove("active", "forward");
    if(identity.value === "allievo") {
        disableValidation("prof_iscrizione");
        enableValidation("allievi_iscrizione");
        
        document.getElementById("allievi_iscrizione").classList.add("active", "forward");
    } else {
        disableValidation("allievi_iscrizione");
        enableValidation("prof_iscrizione");
        
        document.getElementById("prof_iscrizione").classList.add("active", "forward");
    }
}

function disableValidation(sectionId) {
    const section = document.getElementById(sectionId);
    const inputs = section.querySelectorAll('input:not([type="radio"]):not([type="checkbox"]), select, textarea');
    inputs.forEach(input => {
        input.removeAttribute('required');
        input.disabled = true;
    });
    
    const radioCheckbox = section.querySelectorAll('input[type="radio"], input[type="checkbox"]');
    radioCheckbox.forEach(input => {
        if (!input.checked) {
            input.disabled = true;
        }
    });
}

function enableValidation(sectionId) {
    const section = document.getElementById(sectionId);
    const inputs = section.querySelectorAll('input[data-required], select[data-required], textarea[data-required]');
    inputs.forEach(input => {
        input.setAttribute('required', '');
        input.disabled = false;  
    });
    
    const allInputs = section.querySelectorAll('input, select, textarea');
    allInputs.forEach(input => {
        input.disabled = false;
    });
}
function goBack0() {
    const scelta_torneo = document.getElementById("scelta_torneo")
    scelta_torneo.classList.remove("active",  "back")
    const benvenuto = document.getElementById("benvenuto")
    benvenuto.classList.add("active",  "back")
}   
function goBack1() {
    const identity_selection = document.getElementById("identity_selection")
    const scelta_torneo = document.getElementById("scelta_torneo")
    scelta_torneo.classList.add("active",  "back")
    identity_selection.classList.remove("active",  "back")
}

function goBack2() {
    const allievi_iscrizione = document.getElementById("allievi_iscrizione")
    const identity_selection = document.getElementById("identity_selection")
    allievi_iscrizione.classList.remove("active",  "back")
    identity_selection.classList.add("active",  "back")
}
function goBack3() {
    const prof_iscrizione = document.getElementById("prof_iscrizione")
    const identity_selection = document.getElementById("identity_selection")
    identity_selection.classList.add("active",  "back")
    prof_iscrizione.classList.remove("active",  "back")
}

function startIscrizione() {
    const benvenuto = document.getElementById("benvenuto")
    const scelta_torneo = document.getElementById("scelta_torneo")
    scelta_torneo.classList.add("active", "forward")
    benvenuto.classList.remove("active", "forward")
}




