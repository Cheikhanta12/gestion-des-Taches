<?php
function open_session() {
    if (session_status()== PHP_SESSION_NONE) {
        session_start();
    }
}

function destroy_session(){
    session_destroy();
}

function is_users_connect() {
    return isset($_SESSION['usersConnect']);
}

function is_admin() {
    if (is_users_connect()) {
        $role = $_SESSION['usersConnect'];
        return isset($role["libelleR"]) && $role["libelleR"]=="Administrateur";
    }

    return false;
}

function is_operateur() {
    if (is_users_connect()) {
        $role = $_SESSION['usersConnect'];
        return isset($role["libelleR"]) && $role["libelleR"]=="Gestionnaire";
    }

    return false;
}

?>
