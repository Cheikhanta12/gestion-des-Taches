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
        <a href="<?=WEB_ROUTE."?controller=tacheController&view=Listertache"?>">Liste tache</a>
            <div class="tache">
                Ajouter un tache
            </div>
            <br><br>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="tacheController">
                <?php if(!isset($tacheEdit) || $tacheEdit['idT'] == null): ?>
                    <input type="hidden" name="action" value="Ajoutertache">
                <?php endif; ?>
                <?php if(isset($tacheEdit) && $tacheEdit['idT'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idT" value="<?= $tacheEdit['idT'] ?>">
                <?php endif; ?>
                <?php if(isset($tacheDelet) && $tacheDelet['idT'] != null): ?>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="idT" value="<?= $tacheDelet['idT'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="libelle" class="form">Nom</label>
                                <input type="text" class="form-control" name="nomT" id="nomT" value="<?= isset($tacheEdit) ? $tacheEdit['nomT'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="libelle" class="form">Description</label>
                                <textarea type="text" class="form-control" name="descriptionT" id="descriptionT" value="<?= isset($tacheEdit) ? $tacheEdit['descriptionT'] : '' ?>"> </textarea>
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="libelle" class="form">Date Overture</label>
                                <input type="date" class="form-control" name="dateO" id="dateO" value="<?= isset($tacheEdit) ? $tacheEdit['dateO'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="libelle" class="form">Date Fin</label>
                                <input type="date" class="form-control" name="dateF" id="dateF" value="<?= isset($tacheEdit) ? $tacheEdit['dateF'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">   
                    <label for="form">Choisir une image</label>
                    <input type="file"class="form-control"  name="imageT">
                    <span style=" "><?=isset($arrayError) && isset($arrayError["imageT"]) ? $arrayError["imageT"] : '';?></span>
                    </div>
                    <div class="mb-3">
                                <label for="produit" class="form">Nom Categorie</label>
                                <select class="form-control" name="idc" id="idc">
                                    <option value="0">Selectionnez un categorie</option>
                                    <?php if(isset($categorie)): ?>
                                    <?php foreach ($categorie as  $categorie): ?>
                                        <?php if(isset($idc) && $idc == $categorie["idc"]): ?>
                                            <option selected value="<?=$categorie["idc"]?>"><?=$categorie["nomc"]?></option>
                                        <?php endif; ?>
                                        <?php if(!isset($idc) || $idc != $categorie["idc"]): ?>
                                            <option value="<?=$categorie["idc"]?>"><?=$categorie["nomc"]?></option>
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