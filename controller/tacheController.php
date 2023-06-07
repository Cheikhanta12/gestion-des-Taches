<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajoutertache") {
            $tache =   get_all_tache_db();
            $categorie =   get_all_categorie_db();
            require_once(ROUTE_DIR . 'view/tache/Ajoutertache.html.php');
        } elseif ($_GET['view'] == "Listertache") {
            $tache =  get_all_tache_db();
            require_once(ROUTE_DIR . 'view/tache/Listertache.html.php');
        }elseif ($_GET['view'] == "edit") {
            $idT = (int) $_GET["idT"];
            $tacheEdit = get_tache_by_id_bd($idT);
            require_once(ROUTE_DIR . 'view/tache/Ajoutertache.html.php');
        } elseif ($_GET['view'] == "delete") {
            $idT= (int) $_GET["idT"];
            $tacheDelet = get_taches_by_idU_bd($idT);
            header("Location:".WEB_ROUTE."?controller=tacheController&view=Listertache");

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajoutertache") {
            ajout_tache($_POST,$_FILES);
        } elseif ($_POST["action"] == "edit") {
            edit_tache($_POST,$_FILES);
        }
    }
}

function ajout_tache($data,$files) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nomT", $nomT);

    if (empty($arrayError)) {
        $tache = [
            "nomT" => $nomT,
            "descriptionT" => $descriptionT,
            "dateO" => $dateO,
            "dateF" => $dateF,
            "imageT" => $files['imageT']['name'],
            "idc" => (int)$idc,
        ];
        to_uploads($files, $tache["imageT"]);
        
        $result = ajout_tache_db($tache);
        var_dump($result);die;
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=tacheController&view=Listertache");
}

function edit_tache($data,$files) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nomT", $nomT);

    if (empty($arrayError)) {
        $tache = [
            "nomT" => $nomT,
            "descriptionT" => $descriptionT,
            "dateO" => $dateO,
            "dateF" => $dateF,
            "imageT" => $files['imageT']['name'],
            "idc" => $idc,
        ];
        to_uploads($files,"imageT");
        $result = edit_tache_db($tache);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=tacheController&view=Listertache");
}
