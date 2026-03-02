<?php
require "db.php"; // your PDO connection

// Optional: you can add a session/admin check here if needed
// session_start();
// if (!isset($_SESSION['admin'])) { header("Location: index.php"); exit; }

// Delete all entries
$pdo->exec("DELETE FROM iscrizioni");

// Redirect back to the admin page
header("Location: admin.php");
exit;