<?php
    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    include_once 'DAO.php';

    if(!isset($_SESSION)) {
        session_start();
    }
       

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            switch ($action) {
                case 'logout':
                    if ($_SESSION['korisnik']!="") {
                       session_unset();
                       session_destroy();
                       include 'index.php';
                    }
                    break;
            }
            break;
        
        case 'POST':
            switch ($action) {
                case 'Insert':
                    $id = isset($_POST['id'])?$_POST['id']:"";
                    $ime = isset($_POST['ime'])?$_POST['ime']:"";
                    $prezime = isset($_POST['prezime'])?$_POST['prezime']:"";
                    $brIndexa = isset($_POST['brIndexa'])?$_POST['brIndexa']:"";

                    if (!empty($id) && !empty($ime) && !empty($prezime) && !empty($brIndexa)) {
                        $dao=new DAO();
                        $postoji = $dao->getStudent($id);
                        if ($postoji == false) {
                            $dao->insertStudent($id, $ime, $prezime, $brIndexa);
                            $msgInsert = "Uspesno unet student";
                            include 'index.php';
                        }
                        else {
                            $msgInsert = "Student sa zadatim indexom vec postoji.";
                            include 'index.php';
                        }
                        
                    }else {
                        $msgInsert = "Morate popuniti sva polja.";
                        include 'index.php';
                    }

                    break;
                
                case 'Update':
                    $id = isset($_POST['id']) ? $_POST['id'] : "";
                    $ime = isset($_POST['ime']) ? $_POST['ime'] : "";
                    $prezime = isset($_POST['prezime']) ? $_POST['prezime'] : "";
                    $brIndexa = isset($_POST['brIndexa']) ? $_POST['brIndexa'] : "";


                    if (!empty($id) && !empty($ime) && !empty($prezime) && !empty($brIndexa)) {
                        $dao = new DAO();
                        $postoji = $dao->getStudent($id);
                        if ($postoji==true) {
                            $dao->updateStudent($id,$ime,$prezime,$brIndexa);
                            $_SESSION["korisnik"] = $id;
                            include 'prikaz.php';
                        }else{
                            $msgUpdate = "Student sa zadatim indexom ne postoji";
                            include 'index.php';
                        }
                    }else{
                        $msgUpdate = "Morate popuniti sva polja";
                        include 'index.php';
                    }
                    break;

                case 'Delete':
                    $id = isset($_POST['id'])?$_POST['id']:"";

                    if (!empty($id)){
                        $dao = new DAO();
                        $postoji = $dao->getStudent($id);
                        if ($postoji==true) {
                            $dao->deleteStudent($id);
                            $msgDelete = "Student je uspesno obrisan";
                            include 'index.php';
                        }
                        else{
                            $msgDelete = "Student sa zadatim id-em ne postoji";
                            include 'index.php'; 
                        }
                    }else{
                        $msgDelete = "Morate uneti id";
                        include 'index.php';
                    }              
                    break;
            }
            break;
    }


?>

