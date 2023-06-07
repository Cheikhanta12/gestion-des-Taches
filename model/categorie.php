<?php
function desactivercategorie($idc){
    try{
        $req = "UPDATE categorie  where idc='$idc'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer categorie " .$idc.''. $error->getMessage());
    }
}
// function get_categories_by_login_password_db(array $categories) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM categories where login=:login AND password=:password";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($categories);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_categorie_by_login_password_db(array $categorie) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM categorie where nomc=:nomc";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($categorie);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_categorie_db(array $categorie) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO categorie (nomc,idP) VALUES(:nomc, :idP)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categorie);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}
function edit_categorie_db(array $categorie) {
    $conn = get_connection();
    try {
        $sql = "UPDATE categorie SET nomc=:nomc WHERE idc=:idc";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categorie);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_categorie_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM categorie c, projet p where c.idP= p.idP";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_categorie_by_id_bd($idc) {
    $conn = get_connection();
    $sql = "select * FROM categorie where idc = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idc' => $idc]);
    $conn = null;
    return $stmt->fetch();
}
function get_categories_by_idU_bd(int $idc) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM categorie WHERE idc=:idc";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idc' => $idc]);
        return get_all_categorie_db();
    } catch (\Throwable $th) {
        return false;
    }
}