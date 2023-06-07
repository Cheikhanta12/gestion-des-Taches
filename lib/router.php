<?php
if (isset($_REQUEST['controller'])) {
    if($_REQUEST['controller'] == "projetController") {
        require_once(ROUTE_DIR.'controller/projetController.php');
    }elseif($_REQUEST['controller'] == "categorieController") {     
        require_once(ROUTE_DIR.'controller/categorieController.php');
    }elseif($_REQUEST['controller'] == "rappelController") {     
        require_once(ROUTE_DIR.'controller/rappelController.php');
    }elseif($_REQUEST['controller'] == "usersController") {     
        require_once(ROUTE_DIR.'controller/usersController.php');
    }
    elseif($_REQUEST['controller'] == "homeController") {     
        require_once(ROUTE_DIR.'controller/homeController.php');
    }elseif($_REQUEST['controller'] == "securityController") {     
        require_once(ROUTE_DIR.'controller/securityController.php');
    }elseif($_REQUEST['controller'] == "tacheController") {     
        require_once(ROUTE_DIR.'controller/tacheController.php');
    }elseif($_REQUEST['controller'] == "menu2Controller") {     
        require_once(ROUTE_DIR.'controller/menu2Controller.php');
    }elseif($_REQUEST['controller'] == "transfertController") {     
        require_once(ROUTE_DIR.'controller/transfertController.php');
    }elseif($_REQUEST['controller'] == "equipeController") {     
        require_once(ROUTE_DIR.'controller/equipeController.php');
    }
}  else {
         require_once(ROUTE_DIR.'view/security/connexion.html.php');
        //require_once(ROUTE_DIR.'view/fournisseur/Ajoute_fournisseur.html.php');
    }
    




