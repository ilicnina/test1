<?php
    $msgInsert = isset($msgInsert)?$msgInsert:"";
    $msgUpdate = isset($msgUpdate)?$msgUpdate:"";
    $msgDelete = isset($msgDelete)?$msgDelete:"";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index strana</title>
</head>
<body>

    <form action="controller.php" method="post">
        <h3>Unseite podatke o studentu za insert</h3>
        <input type="text" name="id" placeholder="ID"> <br>
        <input type="text" name="ime" placeholder="Ime"> <br>
        <input type="text" name="prezime" placeholder="Prezime"> <br>
        <input type="text" name="brIndexa" placeholder="broj indexa"> <br>
        <input type="submit" name="action" value="Insert">
    </form>

    <?php
        echo "<p>$msgInsert</p>";
    ?>

    <form action="controller.php" method="post">
        <h3>Unesite podatke o studentu za update</h3>
        <input type="text" name="id" placeholder="ID"> <br>
        <input type="text" name="ime" placeholder="Ime"> <br>
        <input type="text" name="prezime" placeholder="Prezime"> <br>
        <input type="text" name="brIndexa" placeholder="broj indexa"> <br>
        <input type="submit" name="action" value="Update">
    </form>

    <?php
        echo "<p>$msgUpdate</p>";
    ?>


    <form action="controller.php" method="post">
        <h3>Unesite podatke o studentu za delete</h3>
        <input type="text" name="id" placeholder="ID"> <br>
        <input type="submit" name="action" value="Delete">
    </form>

    <?php
        echo "<p>$msgDelete</p>";
    ?>

    
</body>
</html>

