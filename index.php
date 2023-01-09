<?php

    $pdo = new PDO("mysql:host=localhost;dbname=crud", "root" ,"0000");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if(isset($_GET["delete"])) {
        $id = (int)$_GET["delete"];
        $pdo->exec("DELETE FROM users WHERE idUser=$id");
        echo "deletado com sucesso!";
    }

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

<?php
    $sql = $pdo->prepare("SELECT * FROM users");
    $sql->execute();

    $fetchUsers = $sql->fetchAll();

    foreach($fetchUsers as $key => $value) {
        echo "<a href='?delete=".$value['idUser']."'>(X)</a>".$value["nameUser"]." | ".$value["emailUser"];
        echo "<hr>";
    }
?>