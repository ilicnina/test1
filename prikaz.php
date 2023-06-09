<?php
    include_once 'DAO.php';
    if (!isset($_SESSION)) 
       session_start();

    if (($_SESSION['korisnik']!="")) {
        $dao=new DAO();
        $student = $dao->getStudent($_SESSION['korisnik']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prikaz strana</title>
</head>
<body>
    ID: <?= $student["id"] ?> <br>
    ime: <?= $student["ime"]?> <br>
    prezime: <?= $student["prezime"] ?> <br>
    br indexa: <?= $student["brIndexa"] ?> <br>
    <a href="controller.php?action=logout">Logout</a>
</body>
</html>

<?php
    }else{
        header('Location:index.php');
    }
?>





