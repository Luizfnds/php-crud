<?php

    $pdo = new PDO("mysql:host=localhost;dbname=crud", "root" ,"0000");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["name"])) {
        $pdo->exec("UPDATE users SET nameUser='".$_POST["name"]."' WHERE idUser=".$_GET['id']);
        echo "The update was successful";
    }

?>

Atualizar
<br>
<form method="POST">
    <input type="text" name="name">
    <input type="submit", value="Enviar">
</form>
