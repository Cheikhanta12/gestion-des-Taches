<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajouterprojet") {
            // var_dump($_GET);die;
            $projet =   get_all_projet_db();
            $users =  get_all_users_db();
            // $type_projet =  get_all_type_projet_db();
            require_once(ROUTE_DIR . 'view/projet/Ajouterprojet.html.php');
        } elseif ($_GET['view'] == "Listerprojet") {
            // die('ok');
            $page = 1;
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }$totalList = get_all_projet_db();
            $projet = get_list_per_page($totalList,$page, 3);
            $nbrPage = get_nbrpage($totalList, 3);
            require_once(ROUTE_DIR . 'view/projet/Listerprojet.html.php');
        }elseif ($_GET['view'] == "edit") {
            $idP = (int) $_GET["idP"];
            $projetEdit = get_projet_by_id_bd($idP);
            require_once(ROUTE_DIR . 'view/projet/Ajouterprojet.html.php');
        }elseif ($_GET['view'] == "deleted") {
            $id= (int) $_GET["idP"];
            $projetDelet = get_projet_by_idc_bd($id);
         header("Location:".WEB_ROUTE."?controller=projetController&view=Listerprojet");
            require_once(ROUTE_DIR . 'view/projet/Listerprojet.html.php');
        }elseif ($_GET['view'] == "filtrer") {
            show_all_projet();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajouterprojet") {
            // var_dump($_POST);die;
            ajout_projet($_POST);
           // ajout_categorieconfection($_POST);
        } elseif ($_POST["action"] == "edit") {
            //edit_categorieconfection($_POST);
            edit_projet($_POST);
        }
    }
}

function show_all_projet()
{
    if (isset($_GET['OK'])) {
        $projet = filtre_by_nomU($_GET['recherche']);
        require_once(ROUTE_DIR . 'view/projet/Listerprojet.html.php');
    } else {
        $projet = get_all_projet_db();
        require_once(ROUTE_DIR . 'view/projet/Listerprojet.html.php');
    }
}

function ajout_projet($data) {
    //var_dump($_POST);die;
    $arrayError = array();
    extract($data);
    //valide_libelle($arrayError, "idU", $idU);
    
    if (empty($arrayError)) {
        $projet = [
            "nomP" => $nomP,
            "descriptionP" => $descriptionP,
            "idU" => $idU,
        ];
        $result=ajout_projet_db($projet);
      // var_dump($projet);die;
       header("Location:".WEB_ROUTE."?controller=projetController&view=Listerprojet");
    } else {
        header("Location:".WEB_ROUTE."?controller=projetController&view=Ajouterprojet");

    }
}

function edit_projet($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "idP", $idP);

    if (empty($arrayError)) {
        $projet = [
            "nomP" => $nomP,
            "descriptionP" => $descriptionP,
            "idP" => $idP,
        ];
       
        $result = edit_projet_db($projet);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=projetController&view=Listerprojet");
}