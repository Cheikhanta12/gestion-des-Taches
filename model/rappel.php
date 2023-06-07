<?php
function desactiverrappel($idR){
    try{
        $req = "UPDATE rappel  where idtr='$idR'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer rappel " .$idR.''. $error->getMessage());
    }
}
// function get_rappel_by_login_password_db(array $rappel) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM rappel where loginU=:loginU AND passwordU=:$passwordU";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($rappel);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_rappel_by_login_password_db(array $rappel) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM rappel where loginU=:loginU AND passwordU=:passwordU";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($rappel);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_rappel_db(array $rappel) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO rappel(nomR,idU,idT) VALUES(:nomR,:idU,:idT)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($rappel);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}

function edit_rappel_db(array $rappel) {
    $conn = get_connection();
    try {
        $sql = "UPDATE rappel SET nomR=:nomR,idU=:idU, idT=:idT   WHERE idR=:idR";
        $stmt = $conn->prepare($sql);
        $stmt->execute($rappel);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_rappel_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM rappel";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_rappel_by_id_bd(int $idR) {
    $conn = get_connection();
    $sql = "SELECT * FROM rappel WHERE idR =:idR";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idtr' => $idR]);
    $conn = null;
    return $stmt->fetch();
}
function get_rappel_by_idU_bd(int $idR) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM rappel WHERE idR=:idR";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idtr' => $idR]);
        return get_all_rappel_db();
    } catch (\Throwable $th) {
        return false;
    }
}
