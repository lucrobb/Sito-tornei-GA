<?php
session_start(); // in case you want to add admin login later
require "db.php"; // PDO connection file

// Get data from POST
$identity = $_POST["identity"];

if ($identity === "prof") {
    $nome = $_POST["prof_nome"];
    $cognome = $_POST["prof_cognome"];
    $classe = $_POST["prof_classe"];
} else {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $classe = $_POST["classe"];
}

$torneo   = $_POST["torneo"];
$genere   = $_POST["genere"];
$telefono = $_POST["telefono"];
$email    = $_POST["email"];


$stmt = $pdo->prepare("
    INSERT INTO iscrizioni (torneo, identity, nome, cognome, genere, classe, telefono)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");
$stmt->execute([$torneo, $identity, $nome, $cognome, $genere, $classe, $telefono]);

// Email di conferma
$subject = "Conferma iscrizione - Tornei GA '26";

if ($identity === "allievo") {
    $message = "Ciao $nome $cognome,\n\n"
             . "La tua iscrizione al torneo di $torneo è stata completata con successo!\n\n"
             . "Dettagli iscrizione:\n- Torneo: $torneo\n- Classe: $classe\n- Genere: $genere\n\n"
             . "Ci vediamo al torneo! Comunicheremo la partecipazione tramite un volantino all'albo.\n\n"
             . "Tornei GA '26";
} else {
    $message = "Buongiorno Prof. $cognome,\n\n"
             . "La sua iscrizione al torneo di $torneo è stata completata con successo!\n\n"
             . "Dettagli iscrizione:\n- Torneo: $torneo\n- Classe: $classe\n- Genere: $genere\n\n"
             . "La ringraziamo per la sua iscrizione.\nCordiali saluti,\nGruppo tornei GA '26";
}


mail($email, $subject, $message, "From: torneiGAlilu2@gmail.com");

// Redirect to success page
header("Location: success.php?email=" . urlencode($email) . "&nome=" . urlencode($nome));
exit;
