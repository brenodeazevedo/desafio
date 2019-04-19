<?php
/**
 * Verifica se o usuário é admin. Caso não seja lança um erro de proibido (403).
 */
function ensureIsAdmin()
{
    if (!isAdmin()) {
        show_error("This resource can only accessed by a admin user", 403, "Forbidden");
    }
}

/**
 * Verifica se o usuário está logado. Caso não esteja lança um erro de proibido (403).
 */
function ensureIsLogged()
{
    $isLogged = !empty($_SESSION['logged']);
    if (!$isLogged) {
        show_error("The user needs to be logged to see this resource", 403, "Forbidden");
    }
}

/**
 * Retorna se o usuário está logado.
 */
function isLogged()
{
    return !empty($_SESSION['logged']);
}

/**
 * Retorna se o usuário é admin.
 */
function isAdmin()
{
    return isLogged() && in_array(1, $_SESSION['roles']);
}
