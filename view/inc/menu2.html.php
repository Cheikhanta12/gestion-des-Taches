
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  </head>
<body>
<ul>
  <div class="parent">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=projetController&view=Ajouterprojet"?>">Projet</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=equipeController&view=Ajouterequipe"?>">Equipe</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=categorieController&view=Ajoutercategorie"?>">Categorie</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=tacheController&view=Ajoutertache"?>">Tache</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=rappelController&view=Ajouterrappel"?>">Rappel</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=transfertController&view=Ajoutertransfert"?>">Transfert</a></li>
  <li><a href="<?=WEB_ROUTE."?controller=securityController&view=deconnexion"?>">Se Déconnecter</a></li>
</div>
</ul>
</body>
</html>

