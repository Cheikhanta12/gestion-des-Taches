<?php
function desactivertransfert($idt){
    try{
        $req = "UPDATE transfert  where idt='$idt'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer transfert " .$idt.''. $error->getMessage());
    }
}
// function get_transfert_by_login_password_db(array $transfert) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM transfert where loginU=:loginU AND passwordU=:$passwordU";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($transfert);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_transfert_by_login_password_db(array $transfert) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert where loginU=:loginU AND passwordU=:passwordU";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($transfert);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_transfert_db(array $transfert) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO transfert(type_tache,type_categorie) VALUES(:type_tache, :type_categorie)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($transfert);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}

function edit_transfert_db(array $transfert) {
    $conn = get_connection();
    try {
        $sql = "UPDATE transfert SET type_tache=:type_tache,type_categorie=:type_categorie  WHERE idt=:idt";
        $stmt = $conn->prepare($sql);
        $stmt->execute($transfert);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_transfert_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_transfert_by_id_bd(int $idt) {
    $conn = get_connection();
    $sql = "SELECT * FROM transfert WHERE idt =:idt";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idt' => $idt]);
    $conn = null;
    return $stmt->fetch();
}
function get_transfert_by_idt_bd(int $idt) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM transfert WHERE idt=:idt";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idt' => $idt]);
        return get_all_transfert_db();
    } catch (\Throwable $th) {
        return false;
    }
}


function get_all_nomU_croissant_transfert_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert ORDER BY nomU ASC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_nomU_decroissant_transfert_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert ORDER BY nomU DESC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_prenomU_croissant_transfert_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert ORDER BY prenomU ASC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_prenomU_decroissant_transfert_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM transfert ORDER BY prenomU DESC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

