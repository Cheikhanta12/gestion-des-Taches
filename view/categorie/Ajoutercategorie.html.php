<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="css/role.css">
</head>
<body>
<div class="menu">
            <?php 
           require_once(ROUTE_DIR."view/inc/menu2.html.php");
                ?>
            </div>
<div class="row">
<div class="col-md-12 col-sm-12">
        <div class="card">
        <a href="<?=WEB_ROUTE."?controller=categorieController&view=Listercategorie"?>">Liste categorie</a>
            <div class="role">
                Ajouter un categorie
            </div>
            <br><br>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post">
                <input type="hidden" name="controller" value="categorieController">
                <?php if(!isset($categorieEdit) || $categorieEdit['idc'] == null): ?>
                    <input type="hidden" name="action" value="Ajoutercategorie">
                <?php endif; ?>
                <?php if(isset($categorieEdit) && $categorieEdit['idc'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idc" value="<?= $categorieEdit['idc'] ?>">
                <?php endif; ?>
                <?php if(isset($categorieDelet) && $categorieDelet['idc'] != null): ?>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="idc" value="<?= $categorieDelet['idc'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="libelle" class="form">Nom categorie</label>
                                <textarea type="text" class="form-control" name="nomc" id="nomc" value="<?= isset($categorieEdit) ? $categorieEdit['nomc'] : '' ?>"> </textarea>
                            </div>
                            <br>
                                <label for="produit" class="form">Nom Projet</label>
                                <select class="form-controle" name="idP" id="idP">
                                    <option value="0">Selectionnez un nom</option>
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
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button class="btn" type="submit">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>