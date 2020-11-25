<?php
require_once("inc/mail_fun.php");


function redir_php($url)
{

    header("Location: " . URL_BASE . "$url");
}

function redir_js($url)
{
    echo '<script type="text/javascript">window.location = "' . $url . '";</script>';
}


function alerta_sw($mensaje, $tipo, $titulo)
{
    echo ' <script>swal("' . $titulo . '", "' . $mensaje . '", "' . $tipo . '");</script> ';
}



function alerta_js($mensaje)
{
    echo ' <script>alert("' . $mensaje . '");</script> ';
}


function refresh_php()
{
    header("Refresh:0");
    exit;
}

function refresh_js()
{
    echo '<script type="text/javascript">location.reload();</script>';
    exit;
}

function verificar_sesion()
{
    $con = LoadDb();

    if (isset($_COOKIE["token_remember"]) && !empty($_COOKIE["token_remember"])) {
        list($user_id, $token, $hash) = explode(':', $_COOKIE['token_remember']);
        if ($hash == hash('sha256', $user_id . ':' . $token . COOKIE_SECRET_KEY) && !empty($token)) {
            $sth = mysqli_query($con, "SELECT * FROM `usuarios` WHERE `id` = '$user_id' AND `token_cookie` = '$token'");
            if (mysqli_num_rows($sth) > 0) {
                $_SESSION["id"] = $user_id;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function password_generar_hash($contraseña)
{
    $sha1 = sha1($contraseña);
    $base64 = base64_encode($sha1);
    $md5 = md5($base64);

    return $md5;
}


function getAllDataUser($id)
{
    $db = LoadDb();
    $data_all =  mysqli_query($db, "SELECT * FROM `usuarios` WHERE `id` = '$id'");
    $data_encontrada = mysqli_fetch_array($data_all);
    return $data_encontrada;
}


function AddNewAdress($user_id)
{
    $db = LoadDb();
    $rpc = RpcLoad();
    $time_actual = time();
    $name_cuenta = $time_actual . "_" . $user_id;
    $new_addres_user = $rpc->getaccountaddress($name_cuenta);
    $private_key_new = $rpc->dumpprivkey($new_addres_user);
    mysqli_query($db, "INSERT INTO wallets (user_id,wallet,account,private_key) VALUES ('$user_id','$new_addres_user','$name_cuenta','$private_key_new')");
}

function BuscarWallet($user_id)
{
    $db = LoadDb();

    $data_all =  mysqli_query($db, "SELECT * FROM `wallets` WHERE `user_id` = '$user_id'");
    $data_encontrada = mysqli_fetch_array($data_all);
    return $data_encontrada["wallet"];
}

function ValidateAddress($wallet)
{
    $rpc = RpcLoad();
    $verificado = $rpc->validateaddress($wallet)["isvalid"];
    if ($verificado == "1") {
        return true;
    } else {
        return false;
    }
}

function BalanceDaemon()
{
    $rpc = RpcLoad();
    $BalanceDaemon = $rpc->getbalance();
    return $BalanceDaemon;
}

function ActualizarBalance($balance_nuevo, $user_id)
{
    $db = LoadDb();
    mysqli_query($db, "UPDATE `usuarios` SET `balance` = '$balance_nuevo' WHERE `id` = $user_id");
}
