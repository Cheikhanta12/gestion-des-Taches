
<?php

if (isset($_SESSION['arrayEror'])) {
    $arrayError = $_SESSION['arrayEror'];
    unset($_SESSION['arrayError']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Tache</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="col">
        <section class="login-container">
        <a href="<?=WEB_ROUTE."?controller=securityController&view=inscription"?>" class="liste">Inscription</a>
            <div>
                <header>
                    <h2>Connexion</h2>
                </header>
                <br>
                <div class="card">
                    <form action="" method="post">
                        <input type="hidden" name="controller" value="securityController">
                        <input type="hidden" name="action" value="connexion">

                        <input type="text" placeholder="Nom d'utilisateur" id="username" name="loginU" />
                        <?php echo isset($arrayError['loginU']) ? $arrayError['loginU'] : " "  ?>
                        <br><br>
                        <input type="password" id="password" name="passwordU" placeholder="Mot de passe" />
                        <?php echo isset($arrayError['passwordU']) ? $arrayError['passwordU'] : " "  ?>
                        <br><br>
                        <button type="submit" class="btn">Connexion</button>

                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>



