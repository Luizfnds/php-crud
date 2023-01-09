<?php

    $pdo = new PDO("mysql:host=localhost;dbname=crud", "root" ,"0000");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["name"])) {
        $sql = $pdo->prepare("INSERT INTO users VALUES (null, ?, ?)");
        $sql->execute(array($_POST["name"], $_POST["email"]));
        echo "The insertion was successful";
    }

?>

<form method="POST">
    <input type="text" name="name">
    <input type="text", name="email">
    <input type="submit", value="Enviar">
</form>