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
                <input type="hidden" name="controller" value="equipeController">
                    <?php if(!isset($equipeEdit) || $equipeEdit['idE'] == null): ?>
                    <input type="hidden" name="action" value="Ajouterequipe">
                <?php endif; ?>
                
                <?php if(isset($equipeEdit) && $equipeEdit['idP'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idE" value="<?= $equipeEdit['idE'] ?>">
                <?php endif; ?>
             <div class="cadre">
             <a href="<?=WEB_ROUTE."?controller=equipeController&view=Listerequipe"?>" class="liste">Liste des Equipe</a>
        <div class="card">
            <div class="car">
                Ajouter un Equipe
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
                            <div class="mb-3">
                                <label for="produit" class="form-label">Nom Projet</label>
                                <select class="form" name="idP" id="idP">
                                    <option value="0">Selectionnez Projet</option>
                                    <?php if(isset($projet)): ?>
                                    <?php foreach ($projet as  $projet): ?>
                                        <?php if(isset($idP) && $idP == $projet["idP"]): ?>
                                            <option selected value="<?=$projet["idP"]?>"><?=$projet["nomP"]?></option>
                                        <?php endif; ?>
                                        <?php if(!isset($idP) || $idP != $projet["idP"]): ?>
                                            <option value="<?=$projet["idP"]?>"><?=$projet["nomP"]?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <br>
            <label for="prenom">Nom du Equipe</label>
            <input type="texte" id="nomE" name="nomE" placeholder="Nom du equipe" value="<?=isset($projetEdit) ? $projetEdit['nomE'] : ''?>"><br>
                        <br>
            <input type="submit" value="valider" class="vlid" >
        </form>
        </div>
          </div>
        </div>
</body>
</html>