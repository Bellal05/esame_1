<?php
require 'db_conn.php';

$nome = $_POST['nome'] ?? '';
$materia = $_POST['materia'] ?? '';
$lezione = $_POST['lezione'] ?? '';

$api_key = 'UW0PEl7IP25RIazBNsK1REDjQdz33EnilDgLGIbP';

$prompt = "Scrivi un breve paragrafo (massimo 200 parole) che riassuma in modo chiaro e accessibile una lezione dal titolo \"$lezione\" per uno studente chiamato $nome, che sta studiando la materia $materia.";

$url = "https://api.cohere.com/v2/chat";
$data = [
    "model" => "command-r-plus-08-2024",
    "messages" => [
        ["role" => "user", "content" => $prompt]
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $api_key",
    "Content-Type: application/json",
    "Accept: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);
$riassunto = $response_data['message']['content'][0]['text'] ?? "Errore durante la generazione del riassunto.";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Riassunto Lezione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-info text-white text-center">
      <h3>Riassunto Lezione</h3>
    </div>
    <div class="card-body">
      <h5><strong>Studente:</strong> <?= htmlspecialchars($nome) ?></h5>
      <h5><strong>Materia:</strong> <?= htmlspecialchars($materia) ?></h5>
      <h5><strong>Lezione:</strong> <?= htmlspecialchars($lezione) ?></h5>
      <hr>
      <p><?= nl2br(htmlspecialchars($riassunto)) ?></p>
    </div>

    <div class="card-footer text-center">
      <div class="row justify-content-center g-2">
        <div class="col-auto">
          <a href="area-riservata.php" class="btn btn-warning">🔙 Torna all'area riservata</a>
        </div>

        <div class="col-auto">
          <form method="POST" action="salva_ai.php">
            <input type="hidden" name="riassunto" value="<?= htmlspecialchars($riassunto ?? '') ?>">
            <input type="hidden" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id ?? '') ?>">
            <input type="hidden" name="materia" value="<?= htmlspecialchars($materia ?? '') ?>">
            <button type="submit" class="btn btn-success">⬆️ Salva sul DB</button>
          </form>
        </div>

        <div class="col-auto">
          <form method="POST" action="genera-pdf.php">
            <input type="hidden" name="riassunto" value="<?= htmlspecialchars($riassunto ?? '') ?>">
            <input type="hidden" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>">
            <button type="submit" class="btn btn-danger">📄 Scarica PDF</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>


</body>
</html>
