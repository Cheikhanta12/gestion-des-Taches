<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "Ajouterequipe") {
            // var_dump($_GET);die;
            $projet =   get_all_projet_db();
            $users =  get_all_users_db();
            // $type_equipe =  get_all_type_equipe_db();
            require_once(ROUTE_DIR . 'view/equipe/Ajouterequipe.html.php');
        } elseif ($_GET['view'] == "Listerequipe") {
            // die('ok');
            $page = 1;
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }$totalList = get_all_equipe_db();
            $equipe = get_list_per_page($totalList,$page, 3);
            $nbrPage = get_nbrpage($totalList, 3);
            require_once(ROUTE_DIR . 'view/equipe/Listerequipe.html.php');
        }elseif ($_GET['view'] == "edit") {
            $idE = (int) $_GET["idE"];
            $equipeEdit = get_equipe_by_idc_bd($idE);
            require_once(ROUTE_DIR . 'view/equipe/Ajouterequipe.html.php');
        }elseif ($_GET['view'] == "deleted") {
            $id= (int) $_GET["idE"];
            $equipeDelet = get_equipe_by_idc_bd($id);
         header("Location:".WEB_ROUTE."?controller=equipeController&view=Listerequipe");
            require_once(ROUTE_DIR . 'view/equipe/Listerequipe.html.php');
        }elseif ($_GET['view'] == "filtrer") {
            show_all_equipe();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "Ajouterequipe") {
            // var_dump($_POST);die;
            ajout_equipe($_POST);
           // ajout_categorieconfection($_POST);
        } elseif ($_POST["action"] == "edit") {
            //edit_categorieconfection($_POST);
            edit_equipe($_POST);
        }
    }
}

function show_all_equipe()
{
    if (isset($_GET['OK'])) {
        $equipe = filtre_by_nomU($_GET['recherche']);
        require_once(ROUTE_DIR . 'view/equipe/Listerequipe.html.php');
    } else {
        $equipe = get_all_equipe_db();
        require_once(ROUTE_DIR . 'view/equipe/Listerequipe.html.php');
    }
}

function ajout_equipe($data) {
    //var_dump($_POST);die;
    $arrayError = array();
    extract($data);
    //valide_libelle($arrayError, "idU", $idU);
    
    if (empty($arrayError)) {
        $equipe = [
            "nomE" => $nomE,
            "idU" => $idU,
            "idP" => $idP,
        ];
        $result=ajout_equipe_db($equipe);
      // var_dump($equipe);die;
       header("Location:".WEB_ROUTE."?controller=equipeController&view=Listerequipe");
    } else {
        header("Location:".WEB_ROUTE."?controller=equipeController&view=Ajouterequipe");

    }
}

function edit_equipe($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "idE", $idE);

    if (empty($arrayError)) {
        $equipe = [
            "nomE" => $nomE,
            "idU" => $idU,
            "idP" => $idP,
        ];
       
        $result = edit_equipe_db($equipe);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=equipeController&view=Listerequipe");
}