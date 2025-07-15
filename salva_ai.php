<?php
session_start();
require 'db_conn.php';

$riassunto = $_POST['riassunto'] ?? '';
$nome = $_POST['nome'] ?? '';
$materia = $_POST['materia'] ?? '';
$id_nome = $_SESSION['id'] ?? null;

if (!$id_nome || empty($riassunto) || empty($nome) || empty($materia)) {
    die("Dati mancanti. Verifica di aver effettuato il login e compilato tutti i campi.");
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Abilita gli errori

try {
    $stmt = $conn->prepare("INSERT INTO lezioni (id_alunno, nome, materia, lezione) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id_nome, $nome, $materia, $riassunto);
    $stmt->execute();

    // Puoi eventualmente reindirizzare o mostrare un messaggio
    header("Location: area-riservata.php?inserimento=ok");
    exit;
} catch (mysqli_sql_exception $e) {
    echo "Errore nell'inserimento: " . $e->getMessage();
}
?>
