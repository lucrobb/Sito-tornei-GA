<?php
require "db.php"; // your PDO connection



// Fetch all registrations
$calcio_allievi = $pdo->query("
    SELECT * FROM iscrizioni
    WHERE identity='allievo' AND torneo='calcio'
    ORDER BY classe
")->fetchAll(PDO::FETCH_ASSOC);

$calcio_prof = $pdo->query("
    SELECT * FROM iscrizioni
    WHERE identity='prof' AND torneo='calcio'
")->fetchAll(PDO::FETCH_ASSOC);

$scacchi = $pdo->query("
    SELECT * FROM iscrizioni
    WHERE torneo='scacchi'
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
</head>
<body class="admin">
    <nav>
        <div>
            <a href="index.php" class="logo">Tornei GA '26</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="calcio" href="calcio.php">Calcio</a></li>
                <li><a class="scacchi" href="scacchi.php">Scacchi</a></li>
            </ul>
            <a href="iscrizione.php" class="iscrizione">Iscriviti</a>
        </div>
    </nav>
    <h1>Admin - database</h1>
    <form action="clear.php" method="post" onsubmit="return confirm('Are you sure you want to delete ALL entries?');">
        <button type="submit">Clear All Entries</button>
    </form>

    <h2>Tabella calcio - allievi</h2>
    <table class="colonne5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Genere</th>
            <th>Classe</th>
            <th>Telefono</th>
        </tr>
        <?php foreach ($calcio_allievi as $i): ?>
        <tr>
            <td><?= htmlspecialchars($i['id']) ?></td>
            <td><?= htmlspecialchars($i['nome']) ?></td>
            <td><?= htmlspecialchars($i['cognome']) ?></td>
            <td><?= htmlspecialchars($i['genere']) ?></td>
            <td><?= htmlspecialchars($i['classe']) ?></td>
            <td><?= htmlspecialchars($i['telefono']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    

    <h2>Tabella calcio - prof</h2>
    <table class="colonne4">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Genere</th>
            <th>Classe</th>
        </tr>
        <?php foreach ($calcio_prof as $i): ?>
        <tr>
            <td><?= htmlspecialchars($i['id']) ?></td>
            <td><?= htmlspecialchars($i['nome']) ?></td>
            <td><?= htmlspecialchars($i['cognome']) ?></td>
            <td><?= htmlspecialchars($i['genere']) ?></td>
            <td><?= htmlspecialchars($i['classe']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>



    <h2>Tabella scacchi</h2>
    <table class="colonne6">
        <tr>
            <th>ID</th>
            <th>Identità</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Genere</th>
            <th>Classe</th>
            <th>Telefono</th>
        </tr>
        <?php foreach ($scacchi as $i): ?>
        <tr>
            <td><?= htmlspecialchars($i['id']) ?></td>
            <td><?= htmlspecialchars($i['identity']) ?></td>
            <td><?= htmlspecialchars($i['nome']) ?></td>
            <td><?= htmlspecialchars($i['cognome']) ?></td>
            <td><?= htmlspecialchars($i['genere']) ?></td>
            <td><?= htmlspecialchars($i['classe']) ?></td>
            <td><?= htmlspecialchars($i['telefono']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>