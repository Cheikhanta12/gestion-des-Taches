<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
        <div class="tout">
            <div class="menu">
            <?php 
           require_once(ROUTE_DIR."view/inc/menu.html.php");
                ?>
            </div>
          <div class="contenu">
          <form action="<?=WEB_ROUTE?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="usersController">
                    <?php if(!isset($usersEdit) || $usersEdit['idU'] == null): ?>
                    <input type="hidden" name="action" value="Ajouterusers">
                <?php endif; ?>
                
                <?php if(isset($usersEdit) && $usersEdit['idU'] != null): ?>
                    <input type="hidden" name="action" value="editer">
                    <input type="hidden" name="idU" value="<?= $usersEdit['idU'] ?>">
                <?php endif; ?>
             <div class="cadre">
             <a href="<?=WEB_ROUTE."?controller=usersController&view=Listerusers"?>" class="liste">Liste des Clients</a>
        <div class="card">
            <div class="car">
                Ajouter un Client
            </div>
            <label for="mdp">Nom</label>
            <input type="nom" id="nomU" name="nomU" placeholder="Votre nom" value="<?=isset($usersEdit) ? $usersEdit['nomU'] : ''?>"><br>
             
            <label for="prenom">Prenom</label>
            <input type="text" id="prenomU" name="prenomU" placeholder="Votre prenom" value="<?=isset($usersEdit) ? $usersEdit['prenomU'] : ''?>"><br>

            <label for="prenom">Telephone</label>
            <input type="text" id="telephoneU" name="telephoneU" placeholder="telephone" value="<?=isset($usersEdit) ? $usersEdit['telephoneU'] : ''?>"><br>
     
            <label for="prenom">Adresse</label>
            <input type="text" id="adressU" name="adressU" placeholder="Votre Adresse" value="<?=isset($usersEdit) ? $usersEdit['adressU'] : ''?>"><br>

            <label for="mdp">Login</label>
            <input type="text" id="loginU" name="loginU" placeholder=" login" value="<?=isset($usersEdit) ? $usersEdit['loginU'] : ''?>"><br>

            <label for="mdp">password</label>
            <input type="password" id="passwordU" name="passwordU" value="<?=isset($usersEdit) ? $usersEdit['passwordU'] : ''?>"><br><br>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="produit" class="form-label">Role</label>
                                <select class="form" name="idR" id="idR">
                                    <option value="0">Selectionnez un Role</option>
                                    <?php if(isset($role)): ?>
                                    <?php foreach ($role as  $role): ?>
                                        <?php if(isset($idR) && $idR == $role["idR"]): ?>
                                            <option selected value="<?=$role["idR"]?>"><?=$role["libelleR"]?></option>
                                        <?php endif; ?>
                                        <?php if(!isset($idR) || $idR != $role["idR"]): ?>
                                            <option value="<?=$role["idR"]?>"><?=$role["libelleR"]?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <br><br>
            <input type="submit" value="valider" class="vlid" >
        </form>
        </div>
          </div>
        </div>
</body>
</html>