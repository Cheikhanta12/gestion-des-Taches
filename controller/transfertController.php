<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajoutertransfert") {
            $taches =   get_all_tache_db();
            $categories =   get_all_categorie_db();
            require_once(ROUTE_DIR . 'view/transfert/Ajoutertransfert.html.php');
        } elseif ($_GET['view'] == "Listertransfert") {
            //var_dump($_GET);die;
            $transfert =  get_all_transfert_db();
            require_once(ROUTE_DIR . 'view/transfert/Listertransfert.html.php');
        }elseif ($_GET['view'] == "edit") {
            $idt = (int) $_GET["idt"];
            $transfertEdit = get_transfert_by_id_bd($idt);
            require_once(ROUTE_DIR . 'view/transfert/Ajoutertransfert.html.php');
        } elseif ($_GET['view'] == "delete") {
            $idt= (int) $_GET["idt"];
            $transfertDelet = get_transfert_by_idt_bd($idt);
            header("Location:".WEB_ROUTE."?controller=transfertController&view=Listertransfert");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajoutertransfert") {
            ajout_transfert($_POST);
        } elseif ($_POST["action"] == "edit") {
            edit_transfert($_POST);
        }
    }
}

function ajout_transfert($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelletype", $libelletype);

    if (empty($arrayError)) {
        $transfert = [
            "type_tache" => $type_tache,
            "type_categorie" => $type_categorie
        ];
        $result = ajout_transfert_db($transfert);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=transfertController&view=Listertransfert");
}

function edit_transfert($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelletype", $libelletype);

    if (empty($arrayError)) {
        $transfert = [
            "type_tache" => $type_tache,
            "type_categorie" => $type_categorie
        ];
        $result = edit_transfert_db($transfert);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=transfertController&view=Listertransfert");
}
