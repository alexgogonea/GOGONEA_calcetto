<?php

    $title = "Calcetto";

    $sql = "SELECT * FROM campi";
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=GOGONEA_calcetto", "root", "");
        echo "La connessione è riuscita";
    }catch(PDOException $e){
        die("Errore di connessione ".$e->getMessage());
    }
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    //fetchall prende tutti i dati dal database e li mette in un array
    $campi = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

</head>
<body>
<h1><?= $title ?></h1>

<a href = "crea_campo.php">Crea Campo</a>

<?php foreach($campi as $campo){?>
<div>
    <?= $campo['nome'] ?>
    <?= $campo['spettatori'] ?>
    <?= $campo['url'] ?>
</div>
}
<?php } ?>
</body>
</html>