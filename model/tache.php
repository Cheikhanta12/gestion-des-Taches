<?php
function desactivertache($idT){
    try{
        $req = "UPDATE tache  where idT='$idT'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer tache " .$idT.''. $error->getMessage());
    }
}
// function get_taches_by_login_password_db(array $taches) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM taches where login=:login AND password=:password";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($taches);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_tache_by_login_password_db(array $tache) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM tache where nomT=:nomT,";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($tache);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_tache_db(array $tache) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO tache (nomT,descriptionT,dateO,dateF,imageT,idc) VALUES(:nomT,:descriptionT,:dateO,:dateF,:imageT,:idc)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($tache);
        return true;
    } catch (\Throwable $th) {
    //var_dump($th);die;
        return false;
    }
}

function edit_tache_db(array $tache) {
    $conn = get_connection();
    try {
        $sql = "UPDATE tache SET nomT=:nomT,descriptionT=:descriptionT,dateO=:dateO,dateF=:dateF,imageT=:imageT,idc=:idc WHERE idT=:idT";
        $stmt = $conn->prepare($sql);
        $stmt->execute($tache);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}
function get_all_tache_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM tache";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_client_compte_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM user where idR=3";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_tache_by_id_bd(int $idT) {
    $conn = get_connection();
    $sql = "SELECT * FROM tache WHERE idT =:idT";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idT' => $idT]);
    $conn = null;
    return $stmt->fetch();
}
function get_taches_by_idU_bd(int $idT) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM tache WHERE idT=:idT";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idT' => $idT]);
        return get_all_tache_db();
    } catch (\Throwable $th) {
        return false;
    }
}