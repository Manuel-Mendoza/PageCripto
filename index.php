<?php
$host_url = $_SERVER['HTTP_HOST'];
$url_base_uri = $_SERVER['REQUEST_URI'];
$parte = explode("/", $url_base_uri);
require("inc/config.php");

if (isset($parte[1]) && !empty($parte[1])) {

    $pagina_actual = $parte[1];
    $identificador_variable = explode("?", $pagina_actual);
    if (isset($identificador_variable[0]) && !empty($identificador_variable[0])) {
        $pagina_actual = $identificador_variable[0];
    } else {
        $pagina_actual = "index";
    }
} else {
    $pagina_actual = "index";
}

if ($pagina_actual == "login") {
    require_once("inc/login_modulo.php");
} else if ($pagina_actual == "404") {
    http_response_code(404);
} elseif ($pagina_actual == "off") {
    setcookie('token_remember', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
    $_SESSION = array();
    session_destroy();
    redir_php("index");
    exit;
}


$full_path = "inc/pages/" . $pagina_actual  . ".php";

if (!file_exists($full_path)) {
    header('Location: ./404');
} else {

    require_once "inc/dist/head.php";
    require_once "inc/dist/header.php";
    require_once $full_path;
    require_once "inc/dist/footer.php";
}
