<?php
function est_vide($valeur) {
    return empty($valeur);
}

function est_entier($valeur) {
    return is_numeric($valeur);
}

function valide_libelle(array &$arrayError, string $key, $valeur) {
    if (est_vide(trim($valeur))) {
        $arrayError[$key] = "Champ obligatoire";
    }
}

function valide_champs(array &$arrayError, string $key, $valeur) {
    if (est_vide(trim($valeur))) {
        $arrayError[$key] = "Champ obligatoire";
    } elseif(!est_entier($valeur)) {
        $arrayError[$key] = "Veuillez saisir un nombre";
    }
}

function valide_email_regex(array &$arrayError, string $key, $valeur) {
    $pattern = "/@+\.+";
    if (est_vide(trim($valeur))) {
        $arrayError[$key] = "Champ obligatoire";
    } elseif(preg_match($pattern, $valeur) == 0) {
        $arrayError[$key] = "Veuillez saisir une adresse mail valide";
    }
}
function form_valid($arrayError):bool{
    if (count($arrayError)==0) {
        return true;
    }
    return false;
}
?>
