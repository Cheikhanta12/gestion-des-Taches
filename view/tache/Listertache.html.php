
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="css/Listrole.css">
</head>
<body>
<div class="menu">
            <?php 
           require_once(ROUTE_DIR."view/inc/menu.html.php");
                ?>
            </div>
<div class="row">
<div class="col-md-12 col-sm-12">
<a href="<?=WEB_ROUTE."?controller=tacheController&view=tache"?>" class="btn btn-primary mb-5 mt-5"></a>
        <div class="card">
            <div class="card-header text-center">
            
            </div>
            <div class="card-body">
                <table class="table table-striped col-12 table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom Tache</th>
                            <th>Description</th>
                            <th>Date Overture</th>
                            <th>Date Fin</th>
                            <th>Image</th>
                            <th>Nom Categorie</th>
                            <th>Archver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($tache)){
                        foreach ($tache as $key => $tache): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $tache["nomT"] ?></td>
                            <td><?= $tache["descriptionT"] ?></td>
                            <td><?= $tache["dateO"] ?></td>
                            <td><?= $tache["dateF"] ?></td>
                            <td><?= $tache["imageT"] ?></td>
                            <td><?= $tache["idc"] ?></td>
                            <td>
                                <a href="<?=WEB_ROUTE.'?controller=tacheController&view=edit&idT='.$tache['idT']?>" 
                                class="btn btn-secondary">Modifier</a>
                                
                                <a href="<?=WEB_ROUTE.'?controller=tacheController&view=delete&idT='.$tache['idT']?>" 
                                class="btn btn-secondary">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>