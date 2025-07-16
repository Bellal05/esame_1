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

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
   

    // 2. Salvataggio in JSON
    $lezioneData = [
        'id_alunno' => $id_nome,
        'nome' => $nome,
        'materia' => $materia,
        'riassunto' => $riassunto,
        'data' => date('Y-m-d H:i:s')
    ];

    $file = 'lezioni.json';

    // Controlla se il file esiste e contiene dati validi
    if (file_exists($file)) {
        $contenuto = file_get_contents($file);
        $dati = json_decode($contenuto, true);
        if (!is_array($dati)) $dati = [];
    } else {
        $dati = [];
    }

    // Aggiungi la nuova lezione
    $dati[] = $lezioneData;

    // Salva nel file JSON
    file_put_contents($file, json_encode($dati, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Reindirizza
    header("Location: area-riservata.php?inserimento=ok");
    exit;
} catch (mysqli_sql_exception $e) {
    echo "Errore nell'inserimento: " . $e->getMessage();
}

// tabella json
  <tbody>
                        <?php
                        $jsonFile = 'lezioni.json';
                        if (file_exists($jsonFile)) {
                            $jsonData = file_get_contents($jsonFile);
                            $lezioni = json_decode($jsonData, true);

                            if (!empty($lezioni)) {
                                foreach ($lezioni as $lezione) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($lezione['nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($lezione['materia']) . "</td>";
                                    echo "<td>" . nl2br(htmlspecialchars($lezione['riassunto'])) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Nessuna lezione trovata</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>File JSON non trovato</td></tr>";
                        }
                        ?>
                    </tbody>
