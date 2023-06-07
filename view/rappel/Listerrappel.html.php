
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="./css/listF.css">
  <link rel="stylesheet" href="./css/pagination.css">
</head>
<body>
<div class="menu">
            <?php 
           require_once(ROUTE_DIR."view/inc/menu.html.php");
                ?>
            </div>
<div class="row">
<div class="col-md-12 col-sm-12">
<a href="<?=WEB_ROUTE."?controller=rappelController&view=Listerrappel"?>" ></a>
        <div class="form-label1">
            <h1></h1>
        </div>
                    <thead>
                    <div class="form-labelF">
            <form action="<?= WEB_ROUTE ?>" method="get">
                <input type="hidden" name="controller" value="rappelController">
                <input type="hidden" name="view" value="filtrer" >
                <label for="" class="form-label">Fillter</label>
                <input type="text" name="recherche" class="butt">
                <br><br>
                <button type="submit" class="bouton1" name="OK">OK</button>
            </form>
        </div>
       
        <table>
        <thead>
          <tr>
          <th>#</th>
          <th>Nom rappel</th>
          <th>Nom Utilisateurs</th> 
          <th>Nom Tache</th> 
          <th>Actions</th>      
            </thead>
        <tbody>
        <?php  foreach ($rappel as $key => $value): ?>
                         <tr>
                         <td><?= $key+1 ?></td>
                         <td><?= $value["nomR"] ?></td>
                         <td><?= $value["idU"] ?></td>
                         <td><?= $value["idT"] ?></td>
        <td>          
        <a href="<?=WEB_ROUTE.'?controller=rappelController&view=edit&idtr='.$value['idR']?>" 
                                class="btn1">Modifier</a>
                                <a href="<?=WEB_ROUTE.'?controller=rappelController&view=delete&idR='.$value['idR']?>" class="btn2">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
                <?php 'endforeach'; ?>
                <nav aria-label="Page navigation example">
            <ul class="pag">
                <?php for ($i=1; $i <=$nbrPage  ; $i++): ?>
                <li class="page"><a class="page-link" href="<?=WEB_ROUTE.'?controller=rappelController&view=Listerrappel&page='.$i?>">
                    <?= $i ?></a></li>
                <?php endfor;?>
            </ul>
        </nav>
            </div>
        </div>
    </div>
    
</div>
</body>
</html>
