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
           require_once(ROUTE_DIR."view/inc/menu2.html.php");
                ?>
            </div>
            </div>
          <div class="contenu">
          <form action="<?=WEB_ROUTE?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="projetController">
                    <?php if(!isset($projetEdit) || $projetEdit['idP'] == null): ?>
                    <input type="hidden" name="action" value="Ajouterprojet">
                <?php endif; ?>
                
                <?php if(isset($projetEdit) && $projetEdit['idP'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idP" value="<?= $projetEdit['idP'] ?>">
                <?php endif; ?>
             <div class="cadre">
             <a href="<?=WEB_ROUTE."?controller=projetController&view=Listerprojet"?>" class="liste">Liste des projets</a>
        <div class="card">
            <div class="car">
                Ajouter un projet
            </div>
             <div class="mb-3">
                                <label for="produit" class="form-label">Nom d'utilisateur</label>
                                <select class="form" name="idU" id="idU">
                                    <option value="0">Selectionnez un Utilisateurs</option>
                                    <?php if(isset($users)): ?>
                                    <?php foreach ($users as  $users): ?>
                                        <?php if(isset($idU) && $idU == $users["idU"]): ?>
                                            <option selected value="<?=$users["idU"]?>"><?=$users["prenomU"]?></option>
                                        <?php endif; ?>
                                        <?php if(!isset($idU) || $idU != $users["idU"]): ?>
                                            <option value="<?=$users["idU"]?>"><?=$users["prenomU"]?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <br>
            <label for="mdp">Description</label>
            <textarea type="text" class="formP" name="descriptionP" id="descriptionP" value="<?= isset($projetEdit) ? $projetEdit['descriptionP'] : '' ?>"> </textarea><br>
             
            <label for="prenom">Nom du Projet</label>
            <input type="texte" id="nomP" name="nomP" placeholder="Nom du Projet" value="<?=isset($projetEdit) ? $projetEdit['nomP'] : ''?>"><br>
                        <br>
            <input type="submit" value="valider" class="vlid" >
        </form>
        </div>
          </div>
        </div>
</body>
</html>