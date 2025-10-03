<?php
require_once 'CampoDaCalcio.php';
$title = "Crea Campo";

if(!empty($_POST)) {
    $nome = $_POST["nome"];
    $spettatori = intval($_POST["spettatori"]);
    $url = $_POST["url"];

    $nuovoCampo = new CampoDaCalcio($nome, $spettatori, $url);

    //connessione al database
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=GOGONEA_calcetto", "root", "");
        echo "La connessione è riuscita";
    }catch(PDOException $e){
        die("Errore di connessione ".$e->getMessage());
    }

    try {
        $sql = 'INSERT INTO campi(nome, spettatori, url) VALUES (:nome, :spettatori, :url)';
        $stmt = $pdo->prepare($sql); //per preparare la nostra query per l inserimento e la mette in sicurezza
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':spettatori', $spettatori);
        $stmt->bindParam(':url', $url);
        $stmt->execute();//esegue la query

        $lastID = $pdo->lastInsertId();
    }catch (PDOException $e){
        if ($e -> getCode() == 23000) {
            echo "Errore nell'inserimento record già presente";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <style>
        .form-row{
            margin-bottom: 5px;
        }
        .label{
            display: inline-block;
            width: 70px;
        }
    </style>
</head>
<body>
<h1><?= $title ?></h1>

<form action="" method="POST">
    <div class="form-row">
        <span class = "label">Nome:</span>
        <input type="text" name="nome">
    </div>
    <div class="form-row">
        <span class = "label">Spettatori:</span>
        <input type="number" name="spettatori">
    </div>
    <div class="form-row">
        <span class = "label">Url:</span>
        <input type="url" name="url">
    </div>
    <div class="form-row">
        <input type="submit" name="Crea">
    </div>
</form>
</body>
</html>