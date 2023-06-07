<?php
function desactiverusers($idU){
    try{
        $req = "UPDATE users  where idU='$idU'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer users " .$idU.''. $error->getMessage());
    }
}
// function get_users_by_login_password_db(array $users) {
//     // connection a la base de donnees
//     $conn = get_connection();
//     // requete sql
//     $sql = "SELECT * FROM users where loginU=:loginU AND passwordU=:$passwordU";
//     // execution de la requete sql
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($users);
//     // ferme la connection a la base de donnees
//     $conn = null;
//     return $stmt->fetchAll();
// }

function get_users_by_login_password_db(array $users) {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users where loginU=:loginU AND passwordU=:passwordU";
    // execution de la requete sql
    $stmt = $conn->prepare($sql);
    $stmt->execute($users);
    // ferme la connection a la base de donnees
    $conn = null;
    return $stmt->fetchAll();
}
function ajout_users_db(array $users) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO users(nomU,prenomU,loginU,passwordU) VALUES(:nomU, :prenomU,:loginU, :passwordU)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($users);
        return true;
    } catch (\Throwable $th) {
   
        return false;
    }
}

function edit_users_db(array $users) {
    $conn = get_connection();
    try {
        $sql = "UPDATE users SET nomU=:nomU,prenomU=:prenomU,loginU=:loginU ,passwordU=:passwordU  WHERE idU=:idU";
        $stmt = $conn->prepare($sql);
        $stmt->execute($users);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_users_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_users_by_id_bd(int $idU) {
    $conn = get_connection();
    $sql = "SELECT * FROM users WHERE idU =:idU";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idU' => $idU]);
    $conn = null;
    return $stmt->fetch();
}
function get_users_by_idU_bd(int $idU) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM users WHERE idU=:idU";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idU' => $idU]);
        return get_all_users_db();
    } catch (\Throwable $th) {
        return false;
    }
}
function filtre_by_prenom($idU): array
{
    $conn = get_connection();
    $stmt =$conn->prepare("SELECT * FROM users WHERE idU=?");
    $stmt->execute(array($idU));
    return $stmt->fetchAll();
}

function get_all_nomU_croissant_users_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users ORDER BY nomU ASC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_nomU_decroissant_users_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users ORDER BY nomU DESC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_prenomU_croissant_users_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users ORDER BY prenomU ASC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}
function get_all_prenomU_decroissant_users_db()
{
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM users ORDER BY prenomU DESC";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

