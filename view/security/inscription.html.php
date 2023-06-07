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
         
            </div>
          <div class="contenu">
          <form action="<?=WEB_ROUTE?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="securityController">
                    <?php if(!isset($usersEdit) || $usersEdit['idU'] == null): ?>
                    <input type="hidden" name="action" value="inscription">
                <?php endif; ?>
                
                <?php if(isset($usersEdit) && $usersEdit['idU'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idU" value="<?= $usersEdit['idU'] ?>">
                <?php endif; ?>
             <div class="cadre">
        <div class="card">
            <div class="car">
            Inscription à la plateforme 
            </div>
            <label for="mdp">Nom</label>
            <input type="nom" id="nomU" name="nomU" placeholder="Votre nom" value="<?=isset($usersEdit) ? $usersEdit['nomU'] : ''?>"><br>
             
            <label for="prenom">Prenom</label>
            <input type="text" id="prenomU" name="prenomU" placeholder="Votre prenom" value="<?=isset($usersEdit) ? $usersEdit['prenomU'] : ''?>"><br>
            <label for="mdp">Login</label>
            <input type="text" id="loginU" name="loginU" placeholder=" login" value="<?=isset($usersEdit) ? $usersEdit['loginU'] : ''?>"><br>
            <label for="mdp">password</label>
            <input type="password" id="passwordU" name="passwordU" value="<?=isset($usersEdit) ? $usersEdit['passwordU'] : ''?>"><br><br>
            <div class="col-md-4 col-sm-12">
            <input type="submit" value="valider" class="vlid" >
        </form>
        </div>
          </div>
        </div>
</body>
</html>