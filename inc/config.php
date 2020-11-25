<?php

require_once("inc/db.php");
require_once("inc/funciones.php");
require_once("inc/rpc.php");

date_default_timezone_set('America/Caracas');

$DURACION_SESION = 31536000;

ini_set("session.cookie_lifetime", $DURACION_SESION);
ini_set("session.gc_maxlifetime", $DURACION_SESION);
/* ini_set("session.save_path", "/tmp"); */
session_cache_expire($DURACION_SESION);
session_set_cookie_params($DURACION_SESION);
session_start();
session_regenerate_id(true);
header("Cache-Control: max-age=" . $DURACION_SESION);

define("COOKIE_RUNTIME", $DURACION_SESION);
define("COOKIE_DOMAIN", $host_url);
define("COOKIE_SECRET_KEY", "HjgvhfhjjsskjFNF");

if ($host_url != "localhost" && $host_url != "127.0.0.1") {
    define("URL_BASE", "https://" . $host_url . "/");
} else {
    define("URL_BASE", "http://" . $host_url . "/");
}


$accesos_login = verificar_sesion();