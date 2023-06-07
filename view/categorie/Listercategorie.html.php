
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
<a href="<?=WEB_ROUTE."?controller=categorieController&view=categorie"?>" class="btn btn-primary mb-5 mt-5"></a>
        <div class="card">
            <div class="card-header text-center">
            <h1> Liste de categorie </h1>
            </div>
            <div class="card-body">
                <table class="table table-striped col-12 table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom categorie</th>
                            <th>Nom Projet</th>
                            <th>Archiver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($categorie)){
                        foreach ($categorie as $key => $categorie): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $categorie["nomc"] ?></td>
                            <td><?= $categorie["nomP"] ?></td>
                            <td>
                            <a href="<?=WEB_ROUTE.'?controller=categorieController&view=edit&idc='.$categorie['idc']?>" 
                                class="">Modifier</a>
                                <a href="<?=WEB_ROUTE.'?controller=categorieController&view=delete&idc='.$categorie['idc']?>" class="">Supprimer</a>
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