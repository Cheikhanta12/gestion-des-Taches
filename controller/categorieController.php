<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajoutercategorie") {
            $categorie =   get_all_categorie_db();
            $projet =   get_all_projet_db();
            require_once(ROUTE_DIR . 'view/categorie/Ajoutercategorie.html.php');
        } elseif ($_GET['view'] == "Listercategorie") {
            $categorie =  get_all_categorie_db();
           // var_dump($categorie);die;
            require_once(ROUTE_DIR . 'view/categorie/Listercategorie.html.php');
        }elseif ($_GET['view'] == "edit") {
            $idc = (int) $_GET["idc"];
            $categorieEdit = get_categorie_by_id_bd($idc);
            require_once(ROUTE_DIR . 'view/categorie/Ajoutercategorie.html.php');
        }elseif ($_GET['view'] == "delete") {
            $idc= (int) $_GET["idc"];
            $categorieDelet = get_categories_by_idU_bd($idc);
            header("Location:".WEB_ROUTE."?controller=categorieController&view=Listercategorie");

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajoutercategorie") {
            ajout_categorie($_POST);
           // ajout_categorieconfection($_POST);
        } elseif ($_POST["action"] == "edit") {
            //edit_categorieconfection($_POST);
            edit_categorie($_POST);
        }
    }
}
function ajout_categorie($data) {
    //var_dump($_POST);die;
    $arrayError = array();
    extract($data);
    //valide_libelle($arrayError, "idU", $idU);
    
    if (empty($arrayError)) {
        $categorie = [
            "nomc" => $nomc,
            "idP" => $idP,
        ];
        $result=ajout_categorie_db($categorie);
      // var_dump($categorie);die;
       header("Location:".WEB_ROUTE."?controller=categorieController&view=Listercategorie");
    } else {
        header("Location:".WEB_ROUTE."?controller=categorieController&view=Ajoutercategorie");

    }
}

function edit_categorie($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "idP", $idP);

    if (empty($arrayError)) {
        $categorie = [
            "nomc" => $nomc,
            "idP" => $idP,
        ];
       
        $result = edit_categorie_db($categorie);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=categorieController&view=Listercategorie");
}
