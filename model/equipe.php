<?php
function desactiverequipe($idE){
    try{
        $req = "UPDATE equipe  where idE='$idE'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer equipe " .$idE.''. $error->getMessage());
    }
}
// function get_equipe_by_login_password_db(array $equipe) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM equipe where loginU=:loginU AND passwordU=:$passwordU";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($equipe);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_equipe_by_login_password_db(array $equipe) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM equipe where loginU=:loginU AND passwordU=:passwordU";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($equipe);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_equipe_db(array $equipe) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO equipe(nomE,idU,idP) VALUES(:nomE,:idU,:idP)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($equipe);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}

function edit_equipe_db(array $equipe) {
    $conn = get_connection();
    try {
        $sql = "UPDATE equipe SET nomE=:nomE,idU=:idU WHERE idE=:idE";
        $stmt = $conn->prepare($sql);
        $stmt->execute($equipe);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_equipe_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM equipe";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_equipe_by_id_bd(int $idE) {
    $conn = get_connection();
    $sql = "SELECT * FROM equipe WHERE idE =:idE";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idE' => $idE]);
    $conn = null;
    return $stmt->fetch();
}
function get_equipe_by_idc_bd(int $idE) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM equipe WHERE idE=:idE";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idE' => $idE]);
        return get_all_equipe_db();
    } catch (\Throwable $th) {
        return false;
    }
}
function filtre_by_nomE($nomE): array
{
    $conn = get_connection();
    $stmt =$conn->prepare("SELECT * FROM equipe WHERE nomE like :nomE");
    $stmt->execute(['nomE' => $nomE]);
    return $stmt->fetchAll();
}

