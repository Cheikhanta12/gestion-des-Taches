
<?php

function find_user_by_login_password(string $loginU, string $passwordU):array{
	$pdo=get_connection();
	$sql="select * from users u,role r WHERE u.loginU=? AND u.passwordU=?";
	$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//	$sth->execute(array($loginU,$passwordU));
	$user = $sth->fetch(PDO::FETCH_ASSOC);
	fermer_connection_bd($pdo);
	return $user==false ?[]: $user ;   
    }
?>





