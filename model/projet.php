<?php
function desactiverprojet($idP){
    try{
        $req = "UPDATE projet  where idP='$idP'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer projet " .$idP.''. $error->getMessage());
    }
}
// function get_projet_by_login_password_db(array $projet) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM projet where loginU=:loginU AND passwordU=:$passwordU";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($projet);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_projet_by_login_password_db(array $projet) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM projet where loginU=:loginU AND passwordU=:passwordU";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($projet);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_projet_db(array $projet) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO projet(nomP,descriptionP,idU) VALUES(:nomP,:descriptionP,:idU)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($projet);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}

function edit_projet_db(array $projet) {
    $conn = get_connection();
    try {
        $sql = "UPDATE projet SET nomP=:nomP,descriptionP=:descriptionP WHERE idP=:idP";
        $stmt = $conn->prepare($sql);
        $stmt->execute($projet);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_projet_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM projet";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_projet_by_id_bd(int $idP) {
    $conn = get_connection();
    $sql = "SELECT * FROM projet WHERE idP =:idP";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idP' => $idP]);
    $conn = null;
    return $stmt->fetch();
}
function get_projet_by_idc_bd(int $idP) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM projet WHERE idP=:idP";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idP' => $idP]);
        return get_all_projet_db();
    } catch (\Throwable $th) {
        return false;
    }
}

function filtre_by_nomU($nomP): array
{
    $conn = get_connection();
    $stmt =$conn->prepare("SELECT * FROM projet WHERE nomP like :nomP");
    $stmt->execute(['nomP' => $nomP]);
    return $stmt->fetchAll();
}

