<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
	if (isset($_GET['view'])) {
	   if ($_GET['view']=='connexion') {
	    require(ROUTE_DIR.'view/security/connexion.html.php');
	   }  elseif($_GET['view']=='inscription')  {
	    require(ROUTE_DIR.'view/security/inscription.html.php');
	   }
	   elseif($_GET['view']=='deconnexion')  {
		destroy_session();
	    require(ROUTE_DIR.'view/security/connexion.html.php');
	   }
	}else {
	    // require(ROUTE_DIR.'view/bien/catalogue.html.php');
	    require(ROUTE_DIR.'view/security/connexion.html.php');
	}
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
	if (isset($_POST['action'])) {
		if ($_POST['action']=='connexion') {
			connexion($_POST);
		} elseif ($_POST['action']=='inscription') {
			inscription($_POST);
		}
	} 
}
function connexion($data){
  // die('okkkkkkkkkkkkkkkkkk');
	$arrayError=array();
    extract($data);
	valide_libelle($arrayError,'loginU', $loginU);
	valide_libelle($arrayError,'passwordU',$passwordU);
	
	if (count($arrayError)== 0) {
		
		$user = find_user_by_login_password($loginU, $passwordU);
		
		if (count($user)==0 ){
			$arrayError['erreur']='loginU ou passwordU incorrect';
		    $_SESSION['arrayError']=$arrayError;
			header("Location:".WEB_ROUTE."?controller=projetController&view=Ajouterprojet"); 
		    exit();
		}else {
			$_SESSION['usersConnect']=$user;
			if ($user['libelleR']=='Administrateurs') {
              header("Location:".WEB_ROUTE."?controller=RoleController&view=ListerRole"); 
			}elseif ($user['libelleR']=='gestionnaire') {
				header("Location:" . WEB_ROUTE . "?controller=UserController&view=ListerUser");
			}elseif ($user['libelleR']=='Client') {
				header("Location:" . WEB_ROUTE . "?controller=UserController&view=AjouterUser");
			}else {
                header("location:".WEB_ROUTE.'?controller=securityController&view=Ajouterusers');	
			}
		}
	}else {
		$_SESSION['arrayError']=$arrayError;
        header("location:".WEB_ROUTE.'?controller=securityController&view=Ajouterusers');	
		exit();
}
}

function inscription($data) {
    //var_dump($_POST);die;
    $arrayError = array();
    extract($data);
    //valide_libelle($arrayError, "idU", $idU);
    
    if (empty($arrayError)) {
        $users = [
            "nomU" => $nomU,
            "prenomU" => $prenomU,
            "loginU" => $loginU,
            "passwordU" => $passwordU,
        ];
        $result=ajout_users_db($users);
       
      // var_dump($users);die;
       header("Location:".WEB_ROUTE."?controller=securityController&view=connexion");
    } else {
        header("Location:".WEB_ROUTE."?controller=securityController&view=inscription");
    }
}
function deconnexion(){
	unset($_SESSION['usersConnect']);
 }
?>
