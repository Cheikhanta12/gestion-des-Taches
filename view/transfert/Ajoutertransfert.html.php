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
        <a href="<?=WEB_ROUTE."?controller=transfertController&view=Listertransfert"?>">Liste Transfert</a>
            <div class="role">
                Faire un transfert
            </div>
            <br><br>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post">
                <input type="hidden" name="controller" value="transfertController">
                <?php if(!isset($transfertEdit) || $transfertEdit['idt'] == null): ?>
                    <input type="hidden" name="action" value="Ajoutertransfert">
                <?php endif; ?>
                <?php if(isset($transfertEdit) && $transfertEdit['idt'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idt" value="<?= $transfertEdit['idt'] ?>">
                <?php endif; ?>
                <?php if(isset($transfertDelet) && $transfertDelet['idt'] != null): ?>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="idt" value="<?= $transfertDelet['idt'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                        <div class="mb-3">
                                <label for="produit" class="form">Type Tache</label>
                                <select class="form-control" name="idT" id="idT">
                                    <option value="0">Selectionnez une tache</option>
                                    <?php foreach ($taches as  $tache): ?>
                                            <option value="<?=$tache["idT"]?>"><?=$tache["nomT"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <div class="mb-3">
                                <label for="produit" class="form">Nom Categorie</label>
                                <select class="form-control" name="idc" id="idc">
                                    <option value="0">Selectionnez un categorie</option>
                                    <?php foreach ($categories as  $categorie): ?>
                                            <option value="<?=$categorie["idc"]?>"><?=$categorie["nomc"]?></option>
                                    <?php endforeach; ?>
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