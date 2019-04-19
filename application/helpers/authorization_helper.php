<?php
function ensureIsAdmin()
{
    ensureIsLogged();
    $roles = $_SESSION['roles'];
    if (!in_array(1, $roles)) {
        show_error("This resource can only accessed by a admin user", 403, "Forbidden");
    }
}

function ensureIsLogged()
{
    $isLogged = !empty($_SESSION['logged']);
    if (!$isLogged) {
        show_error("The user needs to be logged to see this resource", 403, "Forbidden");
    }
}

function isLogged()
{
    return !empty($_SESSION['logged']);
}

function isAdmin()
{
    return isLogged() && in_array(1, $_SESSION['roles']);
}
