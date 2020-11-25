<?php

if ($accesos_login) {
    redir_php("dashboard");
    exit;
}


if (isset($_POST["boton_login"]) && !empty($_POST["boton_login"]) && count($_POST) > 1) {

    if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $buscar_cuenta = mysqli_query($db, "SELECT * FROM `usuarios` WHERE `email` = '$username'");
        if (mysqli_num_rows($buscar_cuenta) > 0) {
            $password = password_generar_hash($_POST["password"]);
            $datos_encontrados = mysqli_fetch_array($buscar_cuenta);
            $hash_password = $datos_encontrados["password"];
            if (password_verify($password, $hash_password)) {
                $id_selepcionado = $datos_encontrados['id'];
                $_SESSION['id'] = $id_selepcionado;
                if ($datos_encontrados["token_cookie"] != "") {
                    $cookie_string_first_part = $datos_encontrados['id'] . ':' . $datos_encontrados["token_cookie"];
                    $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
                    $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
                } else {
                    $random_token_string = hash('sha256', mt_rand());
                    mysqli_query($db, "UPDATE `usuarios` SET `token_cookie` = '$random_token_string' WHERE `id` = '$id_selepcionado'");
                    $cookie_string_first_part = $id_selepcionado . ':' . $random_token_string;
                    $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
                    $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
                }
                setcookie('token_remember', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
                #.
                redir_php("dashboard?status=login_success");
            } else {
                $error_login = "Error al ingresar, intenta de nuevo.";
            }
        } else {
            $error_login = "Datos erroneos";
        }
    } else {
        $error_login = "No se encontraron todos los datos.";
    }
}
