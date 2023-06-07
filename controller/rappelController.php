<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajouterrappel") {
            $rappel =  get_all_rappel_db();
            $users =  get_all_users_db();
            $tache =  get_all_tache_db();
           // $type_compte =  get_all_type_compte_db();
            require_once(ROUTE_DIR . 'view/rappel/Ajouterrappel.html.php');
        }elseif ($_GET['view'] == "filtrer") {
            show_all_rappel();
        }
         elseif ($_GET['view'] == "Listerrappel") {
            $page = 1;
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            $totalList = get_all_rappel_db();
            $user = get_list_per_page($totalList,$page, 3);
            $nbrPage = get_nbrpage($totalList, 3);
            $rappel =  get_all_rappel_db();
            require_once(ROUTE_DIR . 'view/rappel/Listerrappel.html.php');
        }elseif ($_GET['view'] == "delete") {
            $idR= (int) $_GET["idR"];
            $rappelDelet = get_rappel_by_idU_bd($idR);
            header("Location:".WEB_ROUTE."?controller=rappelController&view=Listerrappel");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajouterrappel") {
            ajout_rappel($_POST);
           // ajout_categorieconfection($_POST);
        } elseif ($_POST["action"] == "edit") {
            edit_rappel($_POST);
            //edit_categorieconfection($_POST);
        }
    }
}

function show_all_rappel()
{
    if (isset($_GET['OK'])) {
        $rappel = filtre_by_prenom($_GET['recherche']);
        require_once(ROUTE_DIR . 'view/rappel/Listerrappel.html.php');
    } else {
        $rappel = get_all_rappel_db();
        require_once(ROUTE_DIR . 'view/rappel/Listerrappel.html.php');
    }
}

function ajout_rappel($data) {
    //var_dump($_POST);die;
    $arrayError = array();
    extract($data);
    //valide_libelle($arrayError, "idU", $idU);
    
    if (empty($arrayError)) {
        $rappel = [
            "nomR" => $nomR,
            "idU" => $idU,
            "idT" => $idT,
        ];
        $result=ajout_rappel_db($rappel);
       
       //var_dump($result);die;
       header("Location:".WEB_ROUTE."?controller=rappelController&view=Listerrappel");
    } else {
        header("Location:".WEB_ROUTE."?controller=rappelController&view=Ajouterrappel");
    }
}
function edit_rappel($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "idR", $idR);
    if (empty($arrayError)) {
        $rappel = [
            "nomR" => $nomR,
            "idU" => $idU,
            "idT" => $idT,
        ];
        $result = edit_rappel_db($rappel);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=rappelController&view=Listerrappel");
}

