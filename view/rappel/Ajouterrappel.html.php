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
                <input type="hidden" name="controller" value="rappelController">
                    <?php if(!isset($rappelEdit) || $rappelEdit['idU'] == null): ?>
                    <input type="hidden" name="action" value="Ajouterrappel">
                <?php endif; ?>
                
                <?php if(isset($rappelEdit) && $rappelEdit['idU'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idU" value="<?= $rappelEdit['idU'] ?>">
                <?php endif; ?>
             <div class="cadre">
             <a href="<?=WEB_ROUTE."?controller=rappelController&view=Listerrappel"?>" class="liste">Liste des rappel</a>
        <div class="card">
            <div class="car">
                Faire un rappel
            </div>
            <label for="mdp">Nom Rappel</label>
            <input type="text" id="nomR" name="nomR" placeholder=" rappel" value="<?=isset($rappelEdit) ? $rappelEdit['nomR'] : ''?>"><br>

                            <div class="mb-3">
                                <label for="produit" class="form-label">Nom Utilisateurs</label>
                                <select class="form" name="idU" id="idU">
                                    <option value="0">Selectionnez Un Utilisateurs</option>
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
                            <div class="mb-3">
                                <label for="produit" class="form-label">Type de Tache</label>
                                <select class="form" name="idT" id="idT">
                                    <option value="0">Selectionnez un Type</option>
                                    <?php foreach ($tache as  $tache): ?>
                                    <option value="<?=$tache["idT"]?>"><?=$tache["nomT"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <br>
            <input type="submit" value="valider" class="vlid" >
        </form>
        </div>
          </div>
        </div>
</body>
</html>